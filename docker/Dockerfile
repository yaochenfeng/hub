FROM php:php-fpm-alpine
MAINTAINER yaochenfeng <282696845@qq.com>


ENV php_conf /usr/local/etc/php-fpm.conf
ENV fpm_conf /usr/local/etc/php-fpm.d/www.conf
ENV php_vars /usr/local/etc/php/conf.d/docker-vars.ini
WORKDIR /app/code

RUN echo http://mirrors.aliyun.com/alpine/v3.6/main > /etc/apk/repositories; \
 apk add --update --no-cache git curl bash nginx \
     # forward request and error logs to docker log collector
     && ln -sf /dev/stdout /var/log/nginx/access.log \
     && ln -sf /dev/stderr /var/log/nginx/error.log
#  libmcrypt-dev&& \
# docker-php-ext-install mbstring && \
# docker-php-ext-install mcrypt && \
# docker-php-ext-install pdo_mysql && \
# curl -sS https://getcomposer.org/installer | php && \
# mv composer.phar /usr/local/bin/composer


COPY nginx.conf /etc/nginx/nginx.conf
COPY nginx.vh.default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /run/nginx
ADD        index.php /app/code/public/

EXPOSE 80
STOPSIGNAL SIGTERM
CMD ["nginx", "-g", "daemon off;"]
