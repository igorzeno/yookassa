FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    cron \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www

