# 1. The Base Image (PHP 8.4 + FrankenPHP for high speed)
FROM dunglas/frankenphp:1.3-php8.4-bookworm

# 2. Install dependencies (Zip, PostgreSQL, etc.)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# 3. Copy your code into the container
COPY . /app

# 4. Set the working directory
WORKDIR /app

# 5. Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --optimize-autoloader --no-dev

# 6. Build the UI (Vite)
# (Note: This assumes you have node/npm installed in your local machine to build first,
# OR we add them to the container. Let's keep it simple: build locally first)
RUN apt-get install -y nodejs npm && npm install && npm run build

# 7. Final adjustments
RUN php artisan config:cache && php artisan route:cache

# 8. Start the engine
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
