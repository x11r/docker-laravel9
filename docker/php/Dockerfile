FROM php:8.1-fpm-buster

COPY --from=composer:latest /usr/bin/composer /usr/bi/composer

# ENV LANG c.UTF-8 \
#     TZ Asia/Tokyo

RUN apt-get -y update \
    && apt-get -y upgrade \
    && apt-get install -y git unzip vim \
    && docker-php-ext-install mysqli pdo_mysql opcache 

# docker-php-ext-install

# RUN apk update --no-cache && \
#    apk add git unzip && \
#    docker-php-ext-install pdo \
#    pdo_mysql \
#    mysqli \
#    mbstring
