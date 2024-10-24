FROM php:8.1-fpm

# Instala as dependências do sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    gnupg2 \
    libzip-dev

# Instala extensões do PHP necessárias
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Verifica as versões instaladas
RUN node -v
RUN npm -v

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o arquivo de configuração do PHP (opcional)
# COPY php.ini /usr/local/etc/php/

# Dá permissão ao usuário www-data nas pastas de armazenamento
RUN chown -R www-data:www-data /var/www

# Alterna para o usuário www-data
USER www-data

# Comando padrão
CMD ["php-fpm"]
