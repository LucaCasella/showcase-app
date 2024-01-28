# Matteo Mambelli: Wedding and Event Photographer

This is the project repository for `Matteo Mambelli: Wedding and Event Photographer`.

## Initial Setup

For the first-time setup, you will need to install the necessary dependencies. Run the following commands:
```bash
composer install
```

```bash
npm install
```
## Environment File Setup

1. Rename the `.env.example` file to `.env`

This will create a new environment file for your application. You may need to adjust some of these settings to match your local development environment.

## Generate an Application Key

2. Run the following command at the root directory of your project to generate a new application key:
```bash
php artisan key:generate
```
## Database Migration

After setting up your environment file and generating an application key, you need to run the database migrations. Laravel’s migration system allows you to build your database schema in a structured way. To migrate your database, navigate to your project's root directory and run the following command:
```bash
php artisan artisan migrate
```

After the installation is complete, you can start the project by running:
```bash
php artisan start:project
```
