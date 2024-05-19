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
extension=zip
```

### 4. Update/Install Composer dependencies

First try to run composer install to install the dependencies, if it failed run update first

```sh
composer install
```

```sh
composer update
```

## Users with credentials

| name       | email             | password | admin |
|------------|-------------------|----------|-------|
| John Doe   | john@example.com  | password | false |
| Jane Doe   | jane@example.com  | password | false |
| Admin User | admin@example.com | password | true  |

## Run project

### Run application with docker-compose

#### 1. Uncomment the service in docker-compose for Laravel application

#### 2. Run install command for frontend and build the frontend


```sh
npm run install
npm run build
```

#### 3. Run migrations + seeders with running container with MySQL

```sh
php artisan migrate
php artisan db:seed

```

#### 4. Run the docker-compose file

Navigate to the root directory and run docker compose file to start MYSQL database

```sh
docker compose up -d
```

### Run application locally with database in Docker container

#### 1. Comment (if not commented) the service for laravel application in docker-compose

#### 2. Run the docker-compose to start the MySQL database

```sh
docker compose up -d
```

### 2. Generate application key for Laravel

Idk if this is needed but i have to done it before running the application

```sh
php artisan key:generate
```

### 3. Run migrations and seeders

```sh
php artisan migrate
php artisan db:seed
```

### 4. Build and run the frontend

```sh
npm run install
```

### 5. Run Laravel application

```sh
php artisan serve
npm run dev
```
