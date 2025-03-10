# Használjuk az Alpine alapú PHP 8.1 FPM verziót
FROM php:8.1-fpm-alpine3.17

# Hozzáadjuk a felhasználót helyesen Alpine rendszeren
RUN adduser -u 1000 -D -s /bin/sh phpdocker

# Munkakönyvtár beállítása
WORKDIR /www

# Composer másolása
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Szükséges csomagok telepítése Alpine rendszeren
RUN apk update && apk add --no-cache \
    libpng-dev \
    libzip-dev \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    oniguruma \
    libxml2-dev \
    vim \
    fish \
    libssl1.1 \
    libcurl \
    pkgconf \
    autoconf \
    g++ \
    make \
    && rm -rf /var/cache/apk/*

# PHP kiterjesztések telepítése
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    exif \
    pcntl \
    gd

# MongoDB PHP kiterjesztés telepítése
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Jogosultságok beállítása és felhasználóváltás
USER phpdocker

# Alapértelmezett parancs: PHP-FPM indítása
CMD ["php-fpm"]
