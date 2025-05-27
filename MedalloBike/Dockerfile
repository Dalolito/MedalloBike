FROM php:8.2-apache

# Install system dependencies
RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html

# Set up Apache configuration
COPY ./public/.htaccess /var/www/html/.htaccess
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Environment setup
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate

# Create SQLite database if it doesn't exist
RUN touch /var/www/html/database/database.sqlite

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/bootstrap/cache
RUN chmod 666 /var/www/html/database/database.sqlite

# Clear and cache configuration
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear

# Expose port
EXPOSE 80

# Start services
CMD bash -c "sleep 10 && php artisan migrate --force && php artisan db:seed --force && php artisan config:cache && php artisan route:cache && apache2-foreground"
