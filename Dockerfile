# Stage 1: Build Vite / Frontend assets
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Production PHP runtime
FROM dunglas/frankenphp:1.1-php8.2-alpine AS runner

# Install required PHP extensions (using the pre-installed helper script in FrankenPHP Alpine)
RUN install-php-extensions bcmath gd pdo_mysql zip opcache

# Enable production php.ini settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Set document root for FrankenPHP (serves public/index.php)
ENV FRANKENPHP_DOCUMENT_ROOT=/app/public

# Set server name to listen on port 8080 (Cloud Run's default port) without HTTPS
# Cloud Run handles HTTPS termination automatically at the load balancer level
ENV SERVER_NAME=:8080

# Set environment variables for production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Copy application files
WORKDIR /app
COPY . .

# Copy compiled assets from node-builder
COPY --from=node-builder /app/public/build ./public/build

# Install Composer dependencies (production only, skip dev tools)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create and set permissions for Laravel storage and cache directories
RUN mkdir -p storage/framework/{sessions,views,cache} bootstrap/cache storage/app/public/uploads && \
    rm -rf public/uploads && \
    ln -s /app/storage/app/public/uploads public/uploads && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Expose port 8080
EXPOSE 8080
