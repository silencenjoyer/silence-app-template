FROM php:8.3-fpm

# Supported arguments
ARG UID
ARG GID
ARG USERNAME
ARG GROUP

WORKDIR "/app"

RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    libicu-dev

# Composer installing
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mkdir /.composer
RUN chmod -R 0777 /.composer

RUN docker-php-ext-install mysqli pdo pdo_mysql intl

RUN addgroup --gid ${GID} ${GROUP}
RUN adduser --ingroup ${GROUP} --shell /bin/bash -u ${UID} ${USERNAME}

USER ${USERNAME}
