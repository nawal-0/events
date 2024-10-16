#!/bin/sh

composer install

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan migrate:fresh --seed

nginx -g 'daemon off;'