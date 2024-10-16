#!/bin/bash

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

nginx -g 'daemon off;'