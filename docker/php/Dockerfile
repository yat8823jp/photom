FROM php:8.0.5-fpm-alpine
ADD php.ini /usr/local/etc/php/php.ini
RUN apk --update add \
     && apk add build-base curl git zip tar unzip vim oniguruma-dev libpng-dev libjpeg-turbo-dev freetype-dev
RUN cd /usr/bin && curl -sS https://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apk add libxml2-dev curl-dev $PHPIZE_DEPS
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-configure gd --with-jpeg=/usr
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install xml
RUN docker-php-ext-install curl
RUN docker-php-ext-install session
RUN docker-php-ext-install tokenizer
RUN docker-php-ext-enable pdo_mysql mbstring xml curl session tokenizer xdebug
WORKDIR /var/www/html
CMD ["php-fpm"]
EXPOSE 9000