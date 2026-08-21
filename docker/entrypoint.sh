#!/bin/sh
set -eu

# Keep Filament's public-disk files reachable after every container start.
mkdir -p storage/app/public/sites
ln -sfn /var/www/html/storage/app/public public/storage

# The default settings reference these assets. Seed them only when a custom
# logo/favicon has not been uploaded yet.
if [ ! -f storage/app/public/sites/logo.png ]; then
    cp public/images/logo.png storage/app/public/sites/logo.png
fi

if [ ! -f storage/app/public/sites/logo.ico ]; then
    cp public/images/logo.ico storage/app/public/sites/logo.ico
fi

chown -R www-data:www-data storage/app/public

exec "$@"
