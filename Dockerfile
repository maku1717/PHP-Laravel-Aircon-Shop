FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nginx libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy nginx configuration
COPY nginx.conf /etc/nginx/sites-available/default

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data /app

# Create startup script
RUN printf '#!/bin/bash\n\
sed -i "s/listen 10000;/listen ${PORT:-10000};/" /etc/nginx/sites-available/default\n\
cp .env.example .env\n\
php artisan key:generate --force\n\
php artisan migrate --force\n\
php artisan config:cache\n\
php artisan route:cache\n\
service nginx start\n\
php-fpm\n' > /start.sh && chmod +x /start.sh

# Expose port
EXPOSE 10000

# Start the application
CMD ["/start.sh"]
