# Gebruik een officiële PHP-image met Apache
FROM php:7.4-apache

# Installeer de benodigde PHP-extensies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Kopieer de inhoud van de huidige directory naar de Apache web root
COPY . /var/www/html/

# Geef schrijfpermissies aan de Apache web root
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Open poort 80 voor HTTP-verkeer
EXPOSE 80
