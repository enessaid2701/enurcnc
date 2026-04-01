FROM php:8.2-apache-bookworm

RUN a2enmod rewrite headers \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
    && docker-php-ext-install mysqli pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --chown=www-data:www-data . /var/www/html

EXPOSE 80

