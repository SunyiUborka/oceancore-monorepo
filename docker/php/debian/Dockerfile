# Cseréld le az Alpine képet egy Debian alapú képre a problémák elkerülése érdekében
FROM php:8.1-fpm

# Felhasználó hozzáadása
RUN adduser --uid 1000 --shell /bin/fish --disabled-password --gecos "" phpdocker

# Munkakönyvtár beállítása
WORKDIR /www

# Composer másolása
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Telepítsd a szükséges csomagokat (libssl, libcurl, stb.)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    libzip-dev \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    libonig-dev \
    libxml2-dev \
    vim \
    fish \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Telepítsd a PHP kiterjesztéseket, pl. PDO, ZIP, EXIF, stb.
RUN docker-php-ext-configure pdo && \
    docker-php-ext-configure pdo_mysql && \
    docker-php-ext-configure zip && \
    docker-php-ext-configure exif && \
    docker-php-ext-configure pcntl && \
    docker-php-ext-configure gd && \
    docker-php-ext-install pdo \
                            pdo_mysql \
                            zip \
                            exif \
                            pcntl \
                            gd

# Telepítsd a MongoDB kiterjesztést
RUN pecl install mongodb && \
    docker-php-ext-enable mongodb

# Felhasználó beállítása
USER phpdocker

# Alapértelmezett parancs: PHP FPM indítása
CMD ["php-fpm"]
