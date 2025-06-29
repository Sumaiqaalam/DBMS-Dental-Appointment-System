FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip nginx \
    libonig-dev libxml2-dev libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring zip bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app files
COPY . /var/www

# Set permissions
RUN chown -R www-data:www-data /var/www

# Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# NGINX config
COPY ./nginx.conf /etc/nginx/nginx.conf

# Expose default port Railway expects
EXPOSE 8080

# Start both services
CMD service nginx start && php-fpm
