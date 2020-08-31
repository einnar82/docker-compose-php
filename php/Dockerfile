FROM php:7.2-fpm-alpine

WORKDIR /var/www/html

RUN apk update && \
    apk add \
    libxml2-dev \
    bash

RUN docker-php-source extract \
    && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/3.0.0.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mv phpredis-3.0.0 /usr/src/php/ext/redis 

# Clear cache
RUN rm -rf /var/cache/apk/*

# Install extensions
# Make it readable and arrange from A-Z
RUN docker-php-ext-install \
    bcmath \
    exif \
    mbstring \
    pdo \
    pdo_mysql \
    pcntl \
    redis \
    soap 
    
