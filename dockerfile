# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Install Composer
RUN apt-get update && apt-get install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set direktori kerja
WORKDIR /var/www/html

# Salin semua file ke dalam container (pastikan artisan tersedia)
COPY . /var/www/html

# Jalankan Composer install setelah semua file disalin
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Pastikan izin ke storage dan bootstrap (jika Laravel)
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan server PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
