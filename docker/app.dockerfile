FROM php:7.4-fpm

ENV PHP_MEMORY_LIMIT 1024M
ENV MAX_UPLOAD 128M
ENV PHP_MAX_FILE_UPLOAD 128
ENV PHP_MAX_POST 128M

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        vim \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libzip-dev \
        unzip \
        zip \
        nodejs \
    && docker-php-ext-configure gd \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
        gd \
        exif \
        opcache \
        pdo_mysql \
        pdo_pgsql \
        pcntl \
        zip \
    && rm -rf /var/lib/apt/lists/*;

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


