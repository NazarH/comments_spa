FROM php:8.1-apache

RUN a2enmod rewrite

RUN apt-get update -y && apt-get install -y \
    sudo \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libwebp-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle

RUN apt-get clean && rm -rf /var/lib/apt/lists/*    

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
    gd \
    bcmath \
    pdo_mysql \
    zip

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin
