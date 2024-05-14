FROM php:8.1-fpm

RUN apt-get update
RUN apt install -y apt-utils

# Install dependencies
RUN apt-get install -qq -y \
      curl \
      cron \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www

