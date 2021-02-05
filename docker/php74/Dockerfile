FROM php:7.4-fpm


ENV ACCEPT_EULA=Y

RUN apt-get update && apt-get upgrade -y
RUN export DEBIAN_FRONTEND=noninteractive && apt-get install -y --force-yes libssl-dev curl  libcurl4-gnutls-dev libxml2-dev libicu-dev libmcrypt-dev  libmemcached11 libmemcached-dev libpng-dev

RUN apt-get update && \
      apt-get -y install sudo

RUN docker-php-ext-install opcache

RUN docker-php-ext-install bcmath
RUN apt-get install -y libbz2-dev memcached
RUN docker-php-ext-install bz2
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libpq-dev
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install intl
RUN apt-get install -y libz-dev libmemcached-dev
RUN pecl install memcached

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql

RUN echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini
RUN echo "date.timezone=America/Sao_Paulo" > /usr/local/etc/php/conf.d/timezone_sao_paulo.ini
RUN echo "memory_limit = 1024M" > /usr/local/etc/php/conf.d/memory_limit.ini
RUN echo "upload_max_filesize = 80M" > /usr/local/etc/php/conf.d/upload_file.ini
RUN echo "post_max_size = 80M" > /usr/local/etc/php/conf.d/upload_post_file.ini
RUN echo "max_execution_time = 120" > /usr/local/etc/php/conf.d/max_execution.ini

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install soap
RUN docker-php-ext-install gd
RUN pecl install redis
RUN echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
RUN apt-get install -y libxrender1 libfontconfig1
RUN apt-get install -y wget && wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.4/wkhtmltox-0.12.4_linux-generic-amd64.tar.xz && tar xf wkhtmltox-0.12.4_linux-generic-amd64.tar.xz && cd ./wkhtmltox && cp -R ./* /usr/
RUN mkdir -p /tmp/pdf

RUN apt-get install -y libzip-dev zip unzip && \
      # Install the zip extension
      docker-php-ext-install zip && \
      php -m | grep -q 'zip'

RUN docker-php-ext-install dom

RUN apt-get update && apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

RUN apt-get update && apt-get install -y libcurl3-dev

RUN apt-get update && apt-get install -my wget gnupg
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list \
        > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get install -y --no-install-recommends \
        locales \
        apt-transport-https \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
        unixodbc-dev \
        msodbcsql17

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        libxml2-dev \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

RUN rm -rf /var/lib/apt/lists/*

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m
USER dev

EXPOSE 9000
CMD ["php-fpm"]
