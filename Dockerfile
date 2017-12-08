FROM php:7.1.12-fpm-alpine
MAINTAINER yaochenfeng <282696845@qq.com>
# Set environment
ENV LARAVEL_HOME /var/www/laravel
VOLUME /var/www/laravel
ENV SRC_URL https://github.com/laravel/laravel.git
#RUN git clone ${TINI_VERSION} /var/www/laravel

RUN echo http://mirrors.aliyun.com/alpine/v3.6/main > /etc/apk/repositories; \
 apk add --no-cache git
RUN git clone ${SRC_URL} /var/www/laravel


#容器已经实现 需要改造
#https://github.com/richarvey/nginx-php-fpm