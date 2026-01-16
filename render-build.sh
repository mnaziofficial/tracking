#!/bin/bash
set -e

echo "Installing dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "Clearing cache..."
php artisan config:clear
php artisan cache:clear

echo "Running migrations..."
php artisan migrate --force

echo "Optimizing..."
php artisan optimize:clear
php artisan optimize

echo "Build complete!"
