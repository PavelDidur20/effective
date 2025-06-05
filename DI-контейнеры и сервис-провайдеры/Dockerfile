# Dockerfile
FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt update && apt install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Устанавливаем Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Настройки Xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www/html