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
## App initialization
"After cloning the repository from GitHub, run the command App::init. This command will generate a new .env file, copy the contents from the .env.example file, and generate the keys for Laravel. Some variables, such as DB_PASSWORD, DB_NAME, etc., in the .env file need to be modified according to your system configuration."
```bash
php artisan App:init
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
