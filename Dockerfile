# Use PHP-FPM as base image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libpq-dev zip unzip git \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install Composer dependencies
RUN composer install

# Start the server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]