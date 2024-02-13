#!/bin/bash
set -e

if [ "$1" = 'init' ]; then
    echo "Initializing application"
    #if [ -d "/var/www/database" ]; then
    #    echo "  Migrating..."
    #    cd /var/www;
    #    php artisan migrate --force
    #    echo "  Migration complete"
    #fi
    echo "Ready."
    exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
fi

exec "$@"