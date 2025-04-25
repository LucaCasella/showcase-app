## Utilizza un'immagine base di PHP con Apache
#FROM php:8.2-apache
#
## Installa estensioni e dipendenze necessarie
#RUN apt-get update && apt-get install -y \
#    libpng-dev \
#    libjpeg-dev \
#    libfreetype6-dev \
#    libwebp-dev \
#    zip \
#    git \
#    unzip \
#    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
#    && docker-php-ext-install gd \
#    && docker-php-ext-install pdo pdo_mysql
#
## Installa Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#
## Imposta la cartella di lavoro
#WORKDIR /var/www/html
#
## Copia il file composer.json e installa le dipendenze di Laravel
#COPY composer.json composer.lock ./
#RUN composer install --no-scripts --no-autoloader
#
## Copia tutto il progetto
#COPY . .
#
## Installa le dipendenze JavaScript usando npm
#RUN apt-get install -y npm
#RUN npm install
#RUN npm run build
#
#
## Abilita il modulo di riscrittura Apache e setta i permessi corretti
#RUN a2enmod rewrite
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
#
## Genera autoload di Composer
#RUN composer dump-autoload
#
## Esponi la porta 80 per Apache
#EXPOSE 80
#
## Comando di avvio del container
#CMD ["apache2-foreground"]


# Stage 1: Asset build con Vite
FROM node:20 AS asset-builder

WORKDIR /app

# Copia solo i file necessari per il build Vite
COPY package*.json vite.config.* postcss.config.* tailwind.config.* ./
COPY artisan ./
COPY .env .env
COPY resources/ resources/
COPY routes/ routes/

RUN npm install && npm run build

# Stage 2: PHP + Apache per Laravel
FROM php:8.2-apache

# Installa estensioni PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libwebp-dev \
    zip git unzip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd pdo pdo_mysql

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia tutto il progetto
COPY . .

# Composer install (ora che artisan è disponibile)
RUN composer install --no-dev --optimize-autoloader

# Copia asset generati dallo stage Node
COPY --from=asset-builder /app/public/build public/build

# Abilita mod_rewrite di Apache
RUN a2enmod rewrite

# Permessi su cache e storage
RUN chown -R www-data:www-data storage bootstrap/cache

# Genera APP_KEY se mancante
RUN if ! grep -q "^APP_KEY=" .env || [ -z "$(grep APP_KEY .env | cut -d '=' -f2)" ]; then \
  echo "⚠️  Generating missing APP_KEY..."; \
  php artisan key:generate; \
fi

EXPOSE 80

CMD ["apache2-foreground"]

