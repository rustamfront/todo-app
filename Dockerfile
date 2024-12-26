FROM php:8.3-cli

RUN apt-get update && apt-get install -y curl git zip php-pgsql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

