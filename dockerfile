# Imagen base
FROM php:8.1-fpm AS builder

# Instalar dependencias de PHP
RUN docker-php-ext-install pdo pdo_mysql


# Instalar Node.js
FROM node:latest
WORKDIR /var/www/html/src/app
RUN npm install

# Configurar Nginx
FROM nginx:stable-alpine
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
# Construir la aplicación de React
# Exponer el puerto
EXPOSE 80 3001
