FROM php:8.1-fpm

# Copy composer.lock and composer.json
COPY composer*.json /var/www/


# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    wget \
    default-mysql-client \
    firebird-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo_firebird

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . .

# start php-fpm server
CMD ["php-fpm"]