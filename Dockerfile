# Utilizza un'immagine base di PHP con Apache
FROM php:8.2-apache

# Installa estensioni e dipendenze necessarie
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    zip \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la cartella di lavoro
WORKDIR /var/www/html

# Copia il file composer.json e installa le dipendenze di Laravel
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# Copia tutto il progetto
COPY . .

# Installa le dipendenze JavaScript usando npm
RUN apt-get install -y npm
RUN npm install
RUN npm run build


# Abilita il modulo di riscrittura Apache e setta i permessi corretti
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Genera autoload di Composer
RUN composer dump-autoload

# Esponi la porta 80 per Apache
EXPOSE 80

# Comando di avvio del container
CMD ["apache2-foreground"]
