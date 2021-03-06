FROM phpdockerio/php71-fpm:latest

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# SOURCE CODE COPY --------------------------------------------------------------------------------------
COPY ./ /var/www/html


# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.1-mysql php7.1-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# SET FILE PERMISSION -----------------------------------------------------------------------------------
RUN chown -R :www-data /var/www/html \
 && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

