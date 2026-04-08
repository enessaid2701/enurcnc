#!/bin/bash

# Setup script for php-fpm deployment
# Run this from the project root or pass the install destination.

set -e

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(cd "$SCRIPT_DIR/.." && pwd)"
INSTALL_ROOT="${1:-/var/www/enurcnc}"

if [ "$INSTALL_ROOT" = "$PROJECT_ROOT" ]; then
    echo "Using project root as install root: $PROJECT_ROOT"
else
    echo "Installing project from $PROJECT_ROOT to $INSTALL_ROOT"
fi

# 1) Paketleri yükleyin
PHP_FPM_SERVICE=""
PHP_PACKAGES=""

distro=""
if [ -f /etc/os-release ]; then
    . /etc/os-release
    distro="$ID $ID_LIKE"
fi

install_php_ubuntu() {
    sudo apt update
    if apt-cache show php8.3-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php8.3-fpm php8.3-mysql php8.3-xml php8.3-mbstring php8.3-gd php8.3-curl php8.3-zip"
        PHP_FPM_SERVICE="php8.3-fpm"
    elif apt-cache show php8.2-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-gd php8.2-curl php8.2-zip"
        PHP_FPM_SERVICE="php8.2-fpm"
    elif apt-cache show php8.1-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-gd php8.1-curl php8.1-zip"
        PHP_FPM_SERVICE="php8.1-fpm"
    elif apt-cache show php8.0-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php8.0-fpm php8.0-mysql php8.0-xml php8.0-mbstring php8.0-gd php8.0-curl php8.0-zip"
        PHP_FPM_SERVICE="php8.0-fpm"
    elif apt-cache show php7.4-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php7.4-fpm php7.4-mysql php7.4-xml php7.4-mbstring php7.4-gd php7.4-curl php7.4-zip"
        PHP_FPM_SERVICE="php7.4-fpm"
    elif apt-cache show php-fpm >/dev/null 2>&1; then
        PHP_PACKAGES="php-fpm php-mysql php-xml php-mbstring php-gd php-curl php-zip"
        PHP_FPM_SERVICE="php-fpm"
    else
        echo "PHP paketleri bulunamadı. Ondrej PHP PPA ekleniyor..."
        sudo apt install -y software-properties-common ca-certificates apt-transport-https
        sudo add-apt-repository -y ppa:ondrej/php
        sudo apt update
        if apt-cache show php8.3-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php8.3-fpm php8.3-mysql php8.3-xml php8.3-mbstring php8.3-gd php8.3-curl php8.3-zip"
            PHP_FPM_SERVICE="php8.3-fpm"
        elif apt-cache show php8.2-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-gd php8.2-curl php8.2-zip"
            PHP_FPM_SERVICE="php8.2-fpm"
        elif apt-cache show php8.1-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-gd php8.1-curl php8.1-zip"
            PHP_FPM_SERVICE="php8.1-fpm"
        elif apt-cache show php8.0-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php8.0-fpm php8.0-mysql php8.0-xml php8.0-mbstring php8.0-gd php8.0-curl php8.0-zip"
            PHP_FPM_SERVICE="php8.0-fpm"
        elif apt-cache show php7.4-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php7.4-fpm php7.4-mysql php7.4-xml php7.4-mbstring php7.4-gd php7.4-curl php7.4-zip"
            PHP_FPM_SERVICE="php7.4-fpm"
        elif apt-cache show php-fpm >/dev/null 2>&1; then
            PHP_PACKAGES="php-fpm php-mysql php-xml php-mbstring php-gd php-curl php-zip"
            PHP_FPM_SERVICE="php-fpm"
        else
            echo "PHP paketleri hala bulunamadı. Lütfen uygun depoyu kontrol edin."
            exit 1
        fi
    fi
    sudo apt install -y $PHP_PACKAGES
    detect_php_fpm_service || true
}

install_php_rhel() {
    INSTALLER="yum"
    if command -v dnf >/dev/null 2>&1; then
        INSTALLER="dnf"
    fi
    sudo $INSTALLER install -y epel-release yum-utils
    sudo $INSTALLER install -y https://rpms.remirepo.net/enterprise/remi-release-8.rpm
    sudo $INSTALLER module reset -y php || true
    sudo $INSTALLER module enable -y php:8.0 || true
    PHP_PACKAGES="php php-fpm php-mysqlnd php-xml php-mbstring php-gd php-curl php-zip"
    PHP_FPM_SERVICE="php-fpm"
    sudo $INSTALLER install -y $PHP_PACKAGES
    detect_php_fpm_service || true
}

detect_php_fpm_service() {
    for svc in php-fpm php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm php7.4-fpm; do
        if sudo systemctl list-unit-files --type=service | grep -q "^${svc}.service"; then
            PHP_FPM_SERVICE="$svc"
            return 0
        fi
        if sudo systemctl status "$svc" >/dev/null 2>&1; then
            PHP_FPM_SERVICE="$svc"
            return 0
        fi
    done
    return 1
}

if echo "$distro" | grep -Eiq 'debian|ubuntu'; then
    install_php_ubuntu
elif echo "$distro" | grep -Eiq 'rhel|centos|rocky|almalinux|fedora'; then
    install_php_rhel
else
    echo "Desteklenmeyen Linux dağıtımı: $distro"
    echo "Lütfen uygun PHP kurulumunu kendiniz yapın veya /etc/os-release içeriğini kontrol edin."
    exit 1
fi

# 2) Proje dosyalarını hedefe taşıyın
sudo mkdir -p "$INSTALL_ROOT"
if [ "$INSTALL_ROOT" != "$PROJECT_ROOT" ]; then
    sudo rsync -av --chown=www-data:www-data "$PROJECT_ROOT"/ "$INSTALL_ROOT"/
fi

# 3) Nginx konfigürasyonunu yükleyin
sudo cp "$PROJECT_ROOT/deploy/nginx-enurcnc.conf" /etc/nginx/sites-available/enurcnc
sudo ln -sf /etc/nginx/sites-available/enurcnc /etc/nginx/sites-enabled/enurcnc

# 4) PHP-FPM servisini etkinleştir
if [ -z "$PHP_FPM_SERVICE" ]; then
    detect_php_fpm_service || true
fi
if [ -z "$PHP_FPM_SERVICE" ]; then
    echo "PHP-FPM servisi bulunamadı. Lütfen kurulum çıktısını kontrol edin ve doğru servis adını belirleyin."
    exit 1
fi
sudo systemctl enable --now "$PHP_FPM_SERVICE"

# 5) İzinleri ayarlayın
sudo chown -R www-data:www-data "$INSTALL_ROOT"
sudo find "$INSTALL_ROOT" -type d -exec chmod 755 {} \;
sudo find "$INSTALL_ROOT" -type f -exec chmod 644 {} \;

# 6) Nginx konfigürasyonunu test edin ve yeniden yükleyin
sudo nginx -t
sudo systemctl reload nginx

echo "Setup complete. Please verify SSL cert files and domain config."
