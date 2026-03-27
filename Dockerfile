FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 10000

# Start app
CMD php artisan serve --host=0.0.0.0 --port=$PORT
