FROM php:8.1.12-fpm-alpine3.16

RUN apk update && apk add --no-cache \
    libpng \
    libpng-dev \
    freetype \
    freetype-dev \
    libjpeg-turbo-dev \
    bash \
    icu-dev \
    libxml2-dev \
    shadow \
    zip \
    unzip \
    libzip-dev \
    libstdc++ \
    libx11 \
    libxrender \
    libxext \
    libssl1.1 \
    ca-certificates \
    fontconfig \
    ttf-dejavu \
    ttf-droid \
    ttf-freefont \
    ttf-liberation \
    libwebp-dev \
    exiftool \
    tzdata

RUN docker-php-ext-configure exif
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype

RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    soap \
    bcmath \
    sockets \
    intl \
    gd \
    exif

RUN apk del libpng-dev freetype-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apk add bash
RUN touch /crontab
RUN echo "* * * * * cd /app && php artisan schedule:run >> /dev/null 2>&1" > /crontab
RUN crontab /crontab
COPY ../docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www
RUN chmod 777 -R /app/storage

CMD crond && php-fpm