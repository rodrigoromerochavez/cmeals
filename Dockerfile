# Dockerfile
FROM php:8.2-apache

# Instalar extensiones de PHP y dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite



# Configure Apache DocumentRoot
RUN sed -i 's!/var/www/html!/var/www/html/web!g' /etc/apache2/sites-available/000-default.conf

# Update Apache configuration to allow .htaccess
RUN echo '<Directory /var/www/html/web>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copy existing application directory


# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
