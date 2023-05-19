FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip \
        libzip-dev \
        libpq-dev \
        && docker-php-ext-install pdo pdo_pgsql zip

COPY . /var/www/html/

WORKDIR /var/www/html/

EXPOSE 80

CMD ["apache2-foreground"]
