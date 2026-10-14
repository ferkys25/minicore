FROM php:8.3-cli

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring zip gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Cache de configuración
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
