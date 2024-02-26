FROM php:8.2.6-fpm

WORKDIR /var/www/html/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    libmcrypt-dev \
    libicu-dev \
    libpq-dev \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    curl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip gd

ARG UNAME=developer
RUN groupadd -g 1000 -o $UNAME && useradd -m -u 1000 -g 1000 -o -s /bin/bash $UNAME
USER $UNAME

RUN echo "alias ll='ls -la'" >> ~/.bashrc && \
    echo "alias pa='php artisan'" >> ~/.bashrc && \
    echo "alias pint='/var/www/html/vendor/bin/pint'" >> ~/.bashrc && \
    echo "alias t='pa test'" >> ~/.bashrc && \
    echo "alias tf='t --filter'" >> ~/.bashrc && \
    echo "alias ms='pa migrate:fresh &&  \
        pa db:seed &&  \
        pa passport:install'" >> ~/.bashrc
