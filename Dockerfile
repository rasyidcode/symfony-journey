# syntax=docker/dockerfile:1

# version
FROM php:8.2-fpm-alpine AS php_upstream
FROM mlocati/php-extension-installer:latest AS php_extension_installer_upstream
FROM composer:latest AS composer_upstream

FROM php_upstream AS php82

COPY --from=php_extension_installer_upstream /usr/bin/install-php-extensions /usr/local/bin

RUN apk add --no-cache \
    git \
    openssh \
    make \
    bash \
    alpine-conf

RUN set -eux; \
    install-php-extensions \
        mysqli \
        pdo_mysql \
        intl \
        zip \
        redis \
        ldap \
        gd \
        opcache

COPY --from=composer_upstream --link /usr/bin/composer /usr/local/bin/composer

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && \
    apk add symfony-cli

RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN setup-user -a appuser && \
    echo 'permit persist :wheel' > /etc/doas.d/doas.conf

USER appuser

WORKDIR /srv