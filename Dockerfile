# Use the official PHP image with Apache
FROM php:8.0-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set correct permissions for Apache
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Set Apache ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Enable Apache mod_rewrite (for Laravel or pretty URLs in general)
RUN a2enmod rewrite

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the application files into the container
COPY . /var/www/html

# Install Composer inside the Docker container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Run Composer to install PHP dependencies
RUN composer install

# Expose port 80 for web traffic
EXPOSE 80
