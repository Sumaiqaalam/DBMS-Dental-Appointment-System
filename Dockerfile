# Use an official PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Fix file permissions
RUN chown -R www-data:www-data /var/www

# Expose port 8080 (used by Railway)
EXPOSE 8080

# Start Laravel server
CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080

