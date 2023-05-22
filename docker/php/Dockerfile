FROM php:8.0.27-fpm-buster

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get -y update \
    && apt-get -y upgrade \
    && apt-get install -y git unzip vim supervisor \
    && pecl install apcu xdebug\
    && docker-php-ext-install mysqli pdo_mysql opcache \
    && docker-php-ext-enable apcu xdebug

# docker-php-ext-install

# RUN apk update --no-cache && \
#    apk add git unzip && \
#    docker-php-ext-install pdo \
#    pdo_mysql \
#    mysqli \
#    mbstring
