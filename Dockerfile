# Utiliser une image PHP avec FPM et les extensions requises
FROM php:8.2-fpm-alpine

# Installer les extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html

WORKDIR /var/www/html

# Installer les dépendances PHP
RUN composer install --optimize-autoloader --no-dev

# Donner les permissions au dossier public wesh
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 8000 pour Artisan serve
EXPOSE 8000

# Commande de démarrage de l'application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]