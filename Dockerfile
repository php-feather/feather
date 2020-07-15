FROM php:7.4-apache

#libonig-dev  needed for mbstring
RUN apt-get update \
   && apt-get install -y libmemcached-dev \
   curl \
   git \
   unzip \
   libbz2-dev \
   libxml2-dev \
   libzip-dev \
   libonig-dev \
   && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
   && apt-get autoremove -y \
   && apt-get clean \
   && pecl install memcached-3.1.5 \
   && echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

# install php redis extension
RUN pecl install redis \
   && docker-php-ext-enable redis

# Install needed modules
RUN docker-php-ext-install mysqli \
   && docker-php-ext-install pdo pdo_mysql \
   && docker-php-ext-install session \
   && docker-php-ext-install mbstring \
   && docker-php-ext-install zip \
   && docker-php-ext-install bz2 \
   && docker-php-ext-enable memcached \
   && docker-php-ext-install soap

# enable mod rewrite
RUN a2enmod rewrite
#enable header modules
RUN a2enmod headers

# make log directory
RUN mkdir -p /var/log/php && chmod 777 /var/log/php

# expose http
EXPOSE 80