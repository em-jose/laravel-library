# Laravel Library

## Table of content

- [Table of content](#table-of-content)
- [Overview](#overview)
- [Installation](#installation)
- [Users and credentials](#users-and-credentials)
  * [Admin](#admin)
  * [Librarian](#librarian)
- [Database connection](#database-connection)
- [Running test](#running-test)

## Overview

App built with Laravel to manage a library, allowing CRUD of books, authors, categories and users.

## Installation

- Download the project
- Run the following command in the project directory:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
- Initiate Sail:
```shell
./vendor/bin/sail up
```
- Install Node dependecies
```shell
./vendor/bin/sail npm install
```
- Build assets
```shell
./vendor/bin/sail npm run build
```
- Run migrations and seeders to populate the database
```shell
./vendor/bin/sail php artisan migrate --seed
```
- You can access to the website using this URL in your browser: http://localhost

## Users and credentials

### Admin

This user can create new books, authors, categories and users.

In the default database there is a user with the "admin" role. You can login with this user using the following credentials:

- E-mail: admin@library.com
- Password: password

### Librarian

This user can create new books, authors and categories. This user can not add new users.

In the default database there is a user with the "librarian" role. You can login with this user using the following credentials:

- E-mail: librarian@library.com
- Password: password

## Database connection

- Server host: localhost
- Database name: laravel_library
- User name: sail
- Password: password

## Running test

- Before try running any test use this command:
```shell
./vendor/bin/sail php artisan config:clear
```
- Use this command to run all the test
```shell
./vendor/bin/sail test
```
- Use this command to run a specific test
```shell
./vendor/bin/sail test --filter <testName>
```
- When you have finished executing tests, you must re-run this command to perform the migrations and populate the database:
```shell
./vendor/bin/sail php artisan migrate:fresh --seed
```
