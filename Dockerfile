FROM composer:2 AS composer_binary


FROM php:8.2-cli AS vendor

COPY --from=composer_binary /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        default-mysql-client \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
        zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

# Configuração temporária apenas durante o build.
# O aplicativo continuará usando o .env real em produção.
RUN printf '%s\n' \
    'APP_ENV=production' \
    'APP_KEY=base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=' \
    'DB_CONNECTION=mysql' \
    'DB_HOST=db' \
    'DB_PORT=3306' \
    'DB_DATABASE=tallcms' \
    'DB_USERNAME=tallcms' \
    'DB_PASSWORD=temporary-build-password' \
    > .env \
    && composer dump-autoload --optimize \
    && rm -f .env


FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
COPY --from=vendor /app/vendor ./vendor

RUN npm run build


FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        default-mysql-client \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=vendor /app .
COPY --from=frontend /app/public/build ./public/build

RUN sed -ri 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf

RUN chown -R www-data:www-data storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/tallcms-entrypoint

RUN chmod +x /usr/local/bin/tallcms-entrypoint

EXPOSE 80

ENTRYPOINT ["tallcms-entrypoint"]

CMD ["apache2-foreground"]
