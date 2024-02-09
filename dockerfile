# Use a imagem oficial do PHP com Apache
FROM php:8.3-apache

# Habilitar o mod_rewrite para o Apache
RUN a2enmod rewrite

# Copie os arquivos do projeto para o diretório de trabalho no contêiner
COPY templates/docker/index.html /var/www/html

# Copie os arquivos do projeto para o diretório de trabalho no contêiner
COPY . /var/www/html/blog

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instalando dependências do PHP
RUN docker-php-ext-install pdo_mysql

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expor a porta 80 para permitir a comunicação com o servidor web
EXPOSE 80:80

# Use o comando padrão do Apache para iniciar o servidor
CMD ["apache2-foreground"]
