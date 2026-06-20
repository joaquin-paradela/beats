#!/bin/bash

# Permisos de storage
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Correr migraciones
php artisan migrate --force

# Iniciar Apache
apache2-foreground