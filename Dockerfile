FROM php:8.2-apache
COPY . /var/www/html/
WORKDIR /var/www/html/
# RUN docker-php-ext-install pdo pdo_mysql
RUN chown -R www-data:www-data /var/www/html
# CMD ["php", "-S", "0.0.0.0:8080"]