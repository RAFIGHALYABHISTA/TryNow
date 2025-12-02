# ---- Stage 1: Composer Dependencies ----
FROM composer:2 AS build

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY . .

# ---- Stage 2: PHP 8.3 Application ----
FROM php:8.3-fpm

WORKDIR /app

# Install system libs + PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
    unzip git curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip intl

# Copy build dependencies
COPY --from=build /app /app

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expose port
EXPOSE 8000

# Start server using PHP built-in server
CMD php -S 0.0.0.0:${PORT:-8000} -t public
