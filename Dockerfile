FROM php:8.2-apache

COPY . /var/www/html/

## ini file changes
# COPY ./inifile $PHP_INI_DIR/conf.d/
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN apt-get update && apt-get install -y \
    curl \
    vim

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite