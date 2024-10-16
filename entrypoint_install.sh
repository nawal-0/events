#!/bin/sh

# things to do before running the application
# install dependencies
composer install

# set permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# run migrations and seed the database
php artisan migrate:fresh --seed

exec "$@"



