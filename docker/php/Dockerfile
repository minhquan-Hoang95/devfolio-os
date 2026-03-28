FROM php:8.3-fpm-alpine

#Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    icu-dev \
    postgresql-dev \
    oniguruma-dev

# Install PHP extensions \
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pgsql \
    intl \
    zip \
    opcache \
    mbstring

# Install Composer \

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/app

# Create non-root user - security best practice
RUN addgroup -g 1000 symfony && \
    adduser -u 1000 -G symfony -s /bin/bash -D symfony

USER symfony
