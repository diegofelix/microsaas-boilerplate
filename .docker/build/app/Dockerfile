FROM php:8.3-fpm

RUN apt-get update -qq \
  && apt-get install -qq --no-install-recommends \
    git \
    nginx \
    nginx-extras \
    supervisor \
    zip \
    unzip \
    libzip-dev \
    libssl-dev \
    zlib1g-dev \
    libcap2-bin \
    curl \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    openssh-client \
    libmongoc-dev \
 && apt-get clean

RUN apt-get update

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pgsql
RUN docker-php-ext-install pdo_pgsql
RUN rm -rf /tmp/*

RUN apt-get install -y libmagickwand-dev imagemagick
RUN apt-get install -y git
RUN cd /tmp && \
    git clone https://github.com/Imagick/imagick
RUN cd /tmp/imagick && \
  phpize && \
  ./configure && \
  make && \
  make install
RUN rm -r /tmp/imagick
RUN echo "extension=imagick.so" >> /usr/local/etc/php/conf.d/20-imagick.ini
RUN php -m | grep -q 'imagick'

RUN printf "\n" | pecl install -o -f redis mongodb \
    && docker-php-ext-enable redis mongodb \
    && rm -rf /tmp/pear

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer global self-update

RUN sed -ri -e 's!/run/nginx.pid!/var/run/nginx/nginx.pid!g' /etc/nginx/nginx.conf \
  && sed -ri -e 's!user www-data;!daemon off;!g' /etc/nginx/nginx.conf \
  && sed -ri -e 's!# server_tokens off;!more_clear_headers Server;!g' /etc/nginx/nginx.conf

RUN sed -ri -e 's!user = www-data!; user = www-data!g' /usr/local/etc/php-fpm.d/www.conf \
  && sed -ri -e 's!group = www-data!; group = www-data!g' /usr/local/etc/php-fpm.d/www.conf

# forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log

ARG UID=1000
ARG GID=1000

RUN groupmod -g ${GID} www-data \
  && usermod -u ${UID} -g www-data www-data \
  && mkdir -p /var/www/html \
    /var/run/nginx \
    /var/run/supervisor \
    /var/log/supervisor \
  && chown -hR www-data:www-data \
    /var/www \
    /usr/local/ \
    /etc/nginx/ \
    /var/lib/nginx/ \
    /var/log/nginx/ \
    /var/run/nginx \
    /var/run/supervisor \
    /var/log/supervisor \
  && setcap 'cap_net_bind_service=+ep' /usr/sbin/nginx

RUN mkdir -p /var/www/public
RUN echo "<?php phpinfo();" > /var/www/public/index.php

COPY config/supervisord.conf /etc/supervisor/supervisord.conf
COPY config/php.ini /etc/php7/conf.d/zzz_custom.ini
COPY config/nginx.conf /etc/nginx/nginx.conf

RUN docker-php-ext-install gd

USER www-data:www-data
WORKDIR /var/www/
ENV PATH=$PATH:/var/www/.composer/vendor/bin

EXPOSE 80
STOPSIGNAL SIGTERM

CMD ["/usr/bin/supervisord"]
