FROM php:7.1-cli
COPY ./ /usr/src/myapp
WORKDIR /usr/src/myapp

RUN pecl install channel://pecl.php.net/ev-1.0.4
RUN docker-php-ext-enable ev

CMD [ "php", "./server.php" ]