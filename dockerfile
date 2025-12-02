# ---- Stage 1: Composer Dependencies ----
FROM composer:2 AS build

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY . .

# ---- Stage 2: PHP 8.3 Application ----
FROM php:8.3-fpm

WORKDIR /app

# Install necessary system packages & PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copy build results
COPY --from=build /app /app

# Permissions for Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Railway will inject $PORT automatically
EXPOSE 8000

# Start Laravel using PHP built-in server
CMD php -S 0.0.0.0:${PORT:-8000} -t public
