#!/bin/bash
set -e

cd /var/www/html

# Ensure SQLite database exists
if [ ! -f database/database.sqlite ]; then
    mkdir -p database
    touch database/database.sqlite
fi

# Set permissions only on directories the application needs to write to.
# This avoids changing ownership of the entire source tree on the host.
chown -R www-data:www-data storage bootstrap/cache database
touch database/database.sqlite
chown www-data:www-data database/database.sqlite
chmod -R 775 storage bootstrap/cache database
chmod 664 database/database.sqlite

# Install dependencies if vendor is missing
if [ ! -d vendor ]; then
    composer install --no-interaction --prefer-dist --optimize-autoloader --no-security-blocking
fi

# Generate app key if missing
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    php artisan key:generate --no-interaction 2>/dev/null || true
fi

# Run migrations
php artisan migrate --force --no-interaction

# Seed default admin user if no users exist
php artisan db:seed --force --no-interaction

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g "daemon off;"
