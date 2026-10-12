# Base PHP-FPM image
FROM php:8.4-fpm AS base

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Install PHP extensions
RUN install-php-extensions \
    intl \
    opcache \
    pdo_pgsql \
    zip

WORKDIR /var/www/html
EXPOSE 9000

# Development container
FROM base AS devcontainer

# Install development tools
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    openssh-client \
    sudo \
    unzip \
    vim \
    && rm -rf /var/lib/apt/lists/*

RUN install-php-extensions xdebug

# Install Composer
COPY --from=composer/composer:2-bin /composer /usr/bin/composer

# Create non-root user
ARG USERNAME=app
ARG USER_UID=1000
ARG USER_GID=1000

RUN groupadd --gid ${USER_GID} ${USERNAME} \
    && useradd --uid ${USER_UID} --gid ${USER_GID} -m ${USERNAME} -s /bin/bash \
    && echo "${USERNAME} ALL = (ALL) NOPASSWD: ALL" > /etc/sudoers.d/${USERNAME} \
    && chmod 0440 /etc/sudoers.d/${USERNAME}

# Configure PHP-FPM to run as non-root
RUN sed -i "s/user = www-data/user = ${USERNAME}/g" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s/group = www-data/group = ${USERNAME}/g" /usr/local/etc/php-fpm.d/www.conf

USER ${USERNAME}
