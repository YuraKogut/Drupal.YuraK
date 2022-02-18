FROM php:7.4-apache

RUN a2enmod rewrite

RUN apt-get update \
  && apt-get install -y --no-install-recommends git zlib1g-dev libzip-dev zip unzip

RUN docker-php-ext-install pdo_mysql zip

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
  mv composer.phar /usr/local/bin/composer

RUN rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
