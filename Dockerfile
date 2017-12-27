FROM php:7.1.1-fpm-alpine
MAINTAINER yaochenfeng <282696845@qq.com>

WORKDIR /home/vagrant/Code
RUN echo http://mirrors.aliyun.com/alpine/v3.6/main > /etc/apk/repositories; \
 apk add --update --no-cache git curl bash nginx libmcrypt-dev&& \
 docker-php-ext-install mbstring && \
 docker-php-ext-install mcrypt && \
 docker-php-ext-install pdo_mysql && \
 curl -sS https://getcomposer.org/installer | php && \
 mv composer.phar /usr/local/bin/composer
