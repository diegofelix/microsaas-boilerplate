#!/bin/bash

## Create .env file from .env.example if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

## Create sqlite database file if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

## Execute .env file
source .env

## Get the app domain to install or use the default
read -p "Enter the app domain to install ($APP_DOMAIN): " NEW_APP_DOMAIN
NEW_APP_DOMAIN=${NEW_APP_DOMAIN:-$APP_DOMAIN}

## Update .env file with the app domain
sed -i "s/APP_DOMAIN=$APP_DOMAIN/APP_DOMAIN=$NEW_APP_DOMAIN/g" .env

## Create acme.json file if it doesn't exist
if [ ! -f .docker/config/traefik/acme.json ]; then
    mkdir -p .docker/config/traefik
    touch .docker/config/traefik/acme.json
    chmod 600 .docker/config/traefik/acme.json
fi

## Install dependencies and run migrations
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

## Create symbolic link for storage if it doesn't exist
if [ ! -d storage/app/public ]; then
    docker-compose exec app php artisan storage:link
fi

## Add app domain to /etc/hosts file
source .env
if ! grep -q "${NEW_APP_DOMAIN}" /etc/hosts; then
    echo "127.0.0.1  $NEW_APP_DOMAIN" | sudo tee -a /etc/hosts
fi

## Get the proxy url from docker-compose.yml and add it to /etc/hosts file
PROXY_URL=$(grep -oP '(?<=traefik.http.routers.api_http.rule=Host\(`).*(?=`\))' docker-compose.yml)
if ! grep -q "${PROXY_URL}" /etc/hosts; then
    echo "127.0.0.1  $PROXY_URL" | sudo tee -a /etc/hosts
fi
