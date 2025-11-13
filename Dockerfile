# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias para MySQL e outras dependências
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia todos os arquivos do seu site para o diretório padrão do Apache
COPY . /var/www/html/

# Dá permissão de leitura/escrita
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
