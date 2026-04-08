#!/bin/bash

# Setup script for nginx + php-fpm deployment
# Run this on the server after copying repo to /var/www/enurcnc

set -e

# 1) Paketleri yükleyin
sudo apt update
sudo apt install -y php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-gd php8.2-curl php8.2-zip

# 2) Proje dosyalarını webroot altına taşıyın
sudo mkdir -p /var/www/enurcnc
sudo rsync -av --chown=www-data:www-data . /var/www/enurcnc/

# 3) Nginx konfigürasyonunu yükleyin
sudo cp deploy/nginx-enurcnc.conf /etc/nginx/sites-available/enurcnc
sudo ln -sf /etc/nginx/sites-available/enurcnc /etc/nginx/sites-enabled/enurcnc

# 4) PHP-FPM servisini etkinleştirin
sudo systemctl enable --now php8.2-fpm

# 5) İzinleri ayarlayın
sudo chown -R www-data:www-data /var/www/enurcnc
sudo find /var/www/enurcnc -type d -exec chmod 755 {} \;
sudo find /var/www/enurcnc -type f -exec chmod 644 {} \;

# 6) Nginx konfigürasyonunu test edin ve yeniden yükleyin
sudo nginx -t
sudo systemctl reload nginx

echo "Setup complete. Please verify SSL cert files and domain config."
