# ServiceSphere - Service Marketplace API

This document outlines the requirements for the ServiceSphere API, a service marketplace platform connecting freelancers and clients. The API will be the backbone for managing user interactions, services, transactions, and notifications.

# TODO:

-   [x] Setup development environment.
-   [x] Setup database.
-   [x] Setup tests.
-   [x] Setup pre-commit hooks.
    -   [x] Formatting.
    -   [x] Linting.
    -   [x] Tests.
-   [x] Setup CI/CD pipeline in GitHub Actions.
-   [x] Setup Postman collection. (Optional)
-   [ ] Implement User Management.
    -   [ ] Setup Models and Migrations.
        -   [ ] User
            -   [ ] Client User (sub-class)
            -   [ ] Service Provider User (sub-class)
            -   See: [Single Table Inheritance](https://laravel.com/docs/8.x/eloquent#single-table-inheritance)
        -   [ ] Role Enum
            -   See [Enums](https://laravel.com/docs/8.x/eloquent#enum-casting)
        -   [ ] Profile
        -   [ ] Reset Password
    -   [ ] User Registration
        -   [ ] `POST /api/register`
    -   [ ] User Login
        -   [ ] `POST /api/login`
    -   [ ] Forgot Password
        -   [ ] `POST /api/forgot-password`
    -   [ ] Reset Password
        -   [ ] `POST /api/reset-password`
    -   [ ] User Logout
        -   [ ] `POST /api/logout`
    -   [ ] Profile Management
        -   [ ] `GET /api/profile`
        -   [ ] `PUT /api/profile`
    -   [ ] Get Current User
        -   [ ] `GET /api/me`

# Pre-requisites

-   Install PHP 8.4 or higher
-   Install Composer 2.1.9 or higher
-   Install Laravel 11.31 or higher
-   Install Docker 20.10.7 or higher
-   Install Docker Compose 1.29.2 or higher

# Installation

-   Clone the repository
-   Run `cp .env.example.dev .env`
-   Run `docker-compose up -d`
-   Run `composer install`
-   Run `php artisan migrate`
-   Run `php artisan db:seed`

# Development

-   Run `php artisan serve` to start the development server.
-   Run `php artisan serve --host 0.0.0.0` to start the development server on all interfaces.
