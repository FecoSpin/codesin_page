FROM php:7.4-fpm

# ── Node.js 14 ──────────────────────────────────────────────────────────────
RUN curl -fsSLO https://nodejs.org/dist/v14.21.3/node-v14.21.3-linux-x64.tar.xz && \
    tar -xJf node-v14.21.3-linux-x64.tar.xz -C /usr/local --strip-components=1 && \
    rm node-v14.21.3-linux-x64.tar.xz

# ── System dependencies ──────────────────────────────────────────────────────
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev \
    zip unzip libzip-dev nginx supervisor && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# ── PHP extensions ───────────────────────────────────────────────────────────
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# ── Composer ─────────────────────────────────────────────────────────────────
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ── App ──────────────────────────────────────────────────────────────────────
WORKDIR /var/www
COPY . .

# PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Front-end assets
RUN npm install && npm run prod && rm -rf node_modules

# Storage & cache permissions
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# ── Service configs ───────────────────────────────────────────────────────────
COPY docker/nginx/conf.d/caprover.conf /etc/nginx/conf.d/default.conf
RUN rm -f /etc/nginx/sites-enabled/default
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# ── Entrypoint ────────────────────────────────────────────────────────────────
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/entrypoint.sh"]
