FROM php:7.4-fpm-alpine

WORKDIR /var/www

RUN apk add bash mysql-client \
    && docker-php-ext-install pdo pdo_mysql\
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && rm -rf /var/www/html \
    && ln -s public html \
    && apk add npm \
    && npm install

ENTRYPOINT ["php-fpm"]