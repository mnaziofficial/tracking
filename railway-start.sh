#!/bin/bash
set -e

echo "Installing dependencies..."
composer install --no-interaction --optimize-autoloader

echo "Building assets..."
npm install
npm run build

echo "Optimizing application..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Starting server..."
php -S 0.0.0.0:${PORT:-8000} -t public
