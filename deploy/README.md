# Nginx + PHP-FPM Kurulumu için Notlar

Bu proje artık Docker yerine `nginx + php-fpm` ile çalışacak şekilde yapılandırılabilir.

## Dosya Konumu

- Proje kökü: `/var/www/enurcnc`
- Nginx site dosyası: `/etc/nginx/sites-available/enurcnc`
- SSL sertifikaları: `/etc/letsencrypt/live/enurcnc.com/`

## Gereken Paketler (Ubuntu/Debian)

Bu proje için PHP-FPM ve gerekli eklentiler gereklidir. Mevcut dağıtıma bağlı olarak paket isimleri değişebilir.

```bash
sudo apt update
sudo apt install nginx php-fpm php-mysql php-xml php-mbstring php-gd php-curl php-zip
```

Eğer sistemde `php-fpm` paketi bulunmazsa, uygun PHP sürümünü içeren depoyu ekleyin.

## Projeyi Kopyalama

```bash
sudo mkdir -p /var/www/enurcnc
sudo rsync -av --chown=www-data:www-data /path/to/enurcnc/ /var/www/enurcnc/
```

## Nginx Site Yapılandırması

Aşağıdaki dosyayı `/etc/nginx/sites-available/enurcnc` olarak oluşturun veya bu repodaki `deploy/nginx-enurcnc.conf` dosyasını kullanın.

## Siteyi Etkinleştirme

```bash
sudo ln -sf /etc/nginx/sites-available/enurcnc /etc/nginx/sites-enabled/enurcnc
sudo nginx -t
sudo systemctl reload nginx
```

## PHP-FPM Servisi

```bash
sudo systemctl enable --now php8.3-fpm
```

## Dosya İzinleri

```bash
sudo chown -R www-data:www-data /var/www/enurcnc
sudo find /var/www/enurcnc -type d -exec chmod 755 {} \;
sudo find /var/www/enurcnc -type f -exec chmod 644 {} \;
```

## Hata Kontrolü

- Nginx yapılandırmasını test etmek için: `sudo nginx -t`
- Nginx günlükleri: `/var/log/nginx/error.log`
- PHP-FPM günlükleri: `/var/log/php8.3-fpm.log`

## Önemli

Eğer `www.enurcnc.com` yerine farklı bir domain kullanacaksanız `server_name` ve SSL yollarını güncelleyin.
