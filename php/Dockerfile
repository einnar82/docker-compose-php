FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk update && \
    apk add --no-cache --virtual  \
    .deps \
    $PHPIZE_DEPS \
    libxml2-dev \
    icu-dev \
    bash

RUN echo "104.236.228.160 pecl.php.net" >> /etc/hosts \
    && pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Clear cache
RUN rm -rf /var/cache/apk/*

# Install extensions
# Make it readable and arrange from A-Z except if there are prerequisites
RUN docker-php-ext-install \
    bcmath \
    intl \
    exif \
    opcache \
    pdo \
    pdo_mysql \
    tokenizer \
    xml \
    pcntl

COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini
