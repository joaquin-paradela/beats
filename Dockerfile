FROM php:8.4-apache

# Instalar dependencias y extensiones
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libpng-dev \
    libzip-dev \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Apuntar Apache a la carpeta public de Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]