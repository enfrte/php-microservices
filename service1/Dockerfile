FROM php:8.3-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Expose Apache on port 8001
EXPOSE 8001

# Change Apache's default port from 80 to 8001 in config files
RUN sed -i 's/80/8001/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mod_rewrite for URL rewriting (optional, but common)
RUN a2enmod rewrite

# Install Xdebug for PHP debugging
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Optional: Configure Xdebug (adjust settings as needed)
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Set up a non-root user for better security
ARG UID=1000
ARG GID=1000
RUN addgroup --gid $GID appgroup \
    && adduser --disabled-password --gecos '' --uid $UID --gid $GID appuser \
    && chown -R appuser:appgroup /var/www/html

# Switch to the non-root user
USER appuser