# Use the PHP 8.2 image for CLI applications
FROM php:8.2-cli

# Update package lists and install necessary dependencies
RUN apt-get update -y && apt-get install -y libmcrypt-dev unzip git nodejs npm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PDO extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set environment variable to allow Composer to run as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_KEY=base64:O8vPd4T6U8+53G601yo1UzaYGLyv3oAqQccY85OaTtg=

# Set working directory
WORKDIR /app

# Copy application files
COPY . /app

# Install PHP dependencies using Composer
RUN composer install

# Install JavaScript dependencies using npm
RUN npm install

#RUN npm run build

# Expose port 8000
EXPOSE 8000

# Command to run the PHP server and compile front-end assets
CMD sh -c "php artisan serve --host=0.0.0.0 --port=8000"
