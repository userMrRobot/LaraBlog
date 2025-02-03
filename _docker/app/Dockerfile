FROM php:8.2-fpm

# Заменяем источники на альтернативные зеркала
RUN sed -i 's|deb.debian.org|mirror.yandex.ru|g' /etc/apt/sources.list && \
    sed -i 's|security.debian.org|mirror.yandex.ru/debian-security|g' /etc/apt/sources.list

# Устанавливаем временную зону
ENV TZ=Europe/Moscow
RUN ln -sf /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

# Устанавливаем необходимые пакеты и зависимости
RUN apt-get update && apt-get install -y --no-install-recommends \
      tzdata \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      && docker-php-ext-install pdo_mysql bcmath gd zip \
      && apt-get clean \
      && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Копируем файл конфигурации PHP
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Устанавливаем Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Устанавливаем права на папки
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache
