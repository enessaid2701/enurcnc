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
sudo apt update
sudo apt install -y php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-gd php8.2-curl php8.2-zip

# 2) Proje dosyalarını hedefe taşıyın
sudo mkdir -p "$INSTALL_ROOT"
if [ "$INSTALL_ROOT" != "$PROJECT_ROOT" ]; then
    sudo rsync -av --chown=www-data:www-data "$PROJECT_ROOT"/ "$INSTALL_ROOT"/
fi

# 3) Nginx konfigürasyonunu yükleyin
sudo cp "$PROJECT_ROOT/deploy/nginx-enurcnc.conf" /etc/nginx/sites-available/enurcnc
sudo ln -sf /etc/nginx/sites-available/enurcnc /etc/nginx/sites-enabled/enurcnc

# 4) PHP-FPM servisini etkinleştir
sudo systemctl enable --now php8.2-fpm

# 5) İzinleri ayarlayın
sudo chown -R www-data:www-data "$INSTALL_ROOT"
sudo find "$INSTALL_ROOT" -type d -exec chmod 755 {} \;
sudo find "$INSTALL_ROOT" -type f -exec chmod 644 {} \;

# 6) Nginx konfigürasyonunu test edin ve yeniden yükleyin
sudo nginx -t
sudo systemctl reload nginx

echo "Setup complete. Please verify SSL cert files and domain config."
