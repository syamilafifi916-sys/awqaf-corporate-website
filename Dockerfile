FROM node:22-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci --ignore-scripts
COPY . .
RUN npm run build

FROM php:8.4-cli-alpine
WORKDIR /var/www/html

RUN apk add --no-cache postgresql-dev libzip-dev icu-dev oniguruma-dev libpng-dev libjpeg-turbo-dev freetype-dev $PHPIZE_DEPS \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_pgsql intl zip mbstring bcmath gd opcache \
    && apk del $PHPIZE_DEPS

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction \
    && rm -rf public/build \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache
COPY --from=frontend /app/public/build ./public/build

EXPOSE 10000
CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
