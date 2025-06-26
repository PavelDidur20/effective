FROM php:8.2-apache

COPY src/ /var/www/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite

EXPOSE 80

version: '3.8'
services:
  app:
    build: .
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html
    environment:
      DB_HOST: db
      DB_DATABASE: app_db
      DB_USER: db_user
      DB_PASSWORD: pass1111

  db:
    image: mysql:8.0
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: rootpass
      MYSQL_DATABASE: app_db
      MYSQL_USER: db_user
      MYSQL_PASSWORD: pass1111
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
