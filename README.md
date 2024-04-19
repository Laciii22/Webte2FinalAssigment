# Building a Webte2 Final Assignment App

## Introduction

This guide provides a step-by-step approach to building a Webte2 Final Assignment application. Laravel is a popular PHP framework known for its elegant syntax, expressive codebase, and robust features.

## Prerequisites

Before you begin, make sure you have the following prerequisites installed on your system:

- PHP
- Composer
- Node.js
- NPM
- Docker

## Steps

### 1. Install PHP

Start by installing PHP, Composer, follow steps:

- PHP - <https://www.geeksforgeeks.org/how-to-install-php-in-windows-10/>'
- Node, npm - <https://nodejs.org/en/download>

### 2. Install Composer

Follow steps:

- <https://getcomposer.org/download/>

After installation rerun terminal and run, you should see output about version of Composer

```sh
composer -v
```

### 3. Update php.ini file

Click on windows search icon and type ```php.ini```. Open the file and uncomment these extensions

```sh
extension=fileinfo
extension=gd
extension=pdo_mysql
extension=pdo_odbc
extension=pdo_pgsql
extension=pdo_sqlite
extension=pgsql
```

### 4. Update/Install Composer dependencies

First try to run composer install to install the dependencies, if it failed run update first

```sh
composer install
```

```sh
composer update
```

## Run project

### 1. Run docker-composer file

Navigate to the root directory and run docker compose file to start MYSQL database

```sh
docker compose up -d
```

### 2. Generate application key for Laravel

Idk if this is needed but i have to done it before running the application

```sh
php artisan key:generate
```

### 3. Run migrations and install npm packages

```sh
php artisan migrate
npm install
```

### 4. Run Laravel application

```sh
php artisan serve
npm run dev
```
