# Use the official PHP 8.3 Apache image as the base
FROM php:8.3-apache

# Install the PDO MySQL extension and other necessary dependencies
RUN docker-php-ext-install pdo pdo_mysql