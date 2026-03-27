FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nginx \
    && docker-php-ext-install pdo pdo_mysql

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
RUN echo '#!/bin/bash\n\
sed -i "s/listen 10000;/listen $PORT;/" /etc/nginx/sites-available/default\n\
service nginx start\n\
php-fpm' > /start.sh && chmod +x /start.sh

# Expose port (Render will set PORT env var)
EXPOSE $PORT

# Start the application
CMD ["/start.sh"]
