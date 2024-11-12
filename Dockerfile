FROM php:8.3-apache
RUN docker-php-ext-install pdo pdo_mysql

# Set the DocumentRoot in Apache to /var/www/html/src/web/public
RUN sed -i 's|/var/www/html|/var/www/html/src/web/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|/var/www/html|/var/www/html/src/web/public|g' /etc/apache2/apache2.conf