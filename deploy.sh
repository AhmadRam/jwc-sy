#!/bin/bash
cd domains/jwc-sy.com/public_html/ || exit
tar -xf deploy.tar
rm deploy.tar
cp .env.example .env

# Configure .env
sed -i 's#^DB_DATABASE=.*#DB_DATABASE=u300968903_jwc_sy#' .env
sed -i 's#^DB_USERNAME=.*#DB_USERNAME=u300968903_jwc_sy#' .env
sed -i 's#^DB_PASSWORD=.*#DB_PASSWORD="|IWD/Z~S75w"#' .env

# Install dependencies and setup
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
chmod -R 775 storage bootstrap/cache
