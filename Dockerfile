FROM pretzlaw/php:7.1-apache

RUN a2enmod rewrite
RUN docker-php-ext-enable zip
