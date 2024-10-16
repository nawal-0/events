#!/bin/sh

# Install Composer dependencies
composer install

# Set permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Run migrations and seed the database
php artisan migrate:fresh --seed


