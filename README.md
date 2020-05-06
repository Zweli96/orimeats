# Ori-Meats Content Management Application

Web based content management system. Built for system Ori Meats sytem administrators to manage the content that is utilised by the Ori Meats Mobile application. The applicaton was developed using the **Laravel 6 Framework**

The application provides the user several functionalities:

-   Manage Drivers and Sales Managers
-   Manage Products
-   Update Pricing
-   Manage orders and assign orders to drivers

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

-   **PHP 7.1 or later**, If you are running wamp you can upgrade your php through [this site](http://wampserver.aviatechno.net/ "This Site")

-   **Composer** which can be downloaded [here](https://getcomposer.org/download/ "here")

-   ** Npm** Npm comes bundled with [nodejs](https://nodejs.org/en/download/ "nodejs")

### Installing

1. Clone GitHub repo for this project locally
   _Note: Make sure you have git installed locally on your computer first_
   `git clone https://yourusername@bitbucket.org/appfarmdevs/orimeats.git`

2. Cd into your local project directory

3. Install Composer Dependencies
   `composer install`

4. Install NPM Dependencies
   `npm install`

5. Create a copy of your .env file in project directory
   `cp .env.example .env` see sample [.env file](https://github.com/laravel/laravel/blob/master/.env.example ".env file")

6. Generate an app encryption key
   `php artisan key:generate`

7. Create an empty mysql database for our application
   in a mysql console`create database orimeats`

8. import the orimeats.sql into orimeats database
   `use orimeats; source orimeats.sql`

9. In the .env file, add database information to allow Laravel to connect to the database
    > In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.
10. Migrate the database
    `php artisan migrate`
11. Run the app using the Laravel development server
    `php artisan serve`

---
