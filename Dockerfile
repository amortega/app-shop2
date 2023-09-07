FROM composer:1.10 AS composer

FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# copy the Composer PHAR from the Composer image into the PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# RUN php /var/www/html/artisan key:generate

# RUN php /var/www/html/artisan migrate

# RUN php /var/www/html/artisan db:seed