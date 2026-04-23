FROM dunglas/frankenphp:php8.4

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install && npm run build || true

RUN php artisan key:generate || true
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

EXPOSE 8080

CMD ["frankenphp", "php-server", "-r", "public/"]
