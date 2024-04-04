FROM php:7.4-apache

ENV IPE_GD_WITHOUTAVIF=1

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd exif gettext gmp igbinary pdo_mysql mysqli redis shmop xsl && \
    a2enmod rewrite