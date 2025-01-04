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
After cloning the repository, you must configure the environment variables to suit your system. To simplify this process, use the `App:init` command.
```bash
php artisan App:init
```


## Database Migration

After setting up your environment file and generating an application key, you need to run the database migrations. Laravel’s migration system allows you to build your database schema in a structured way. To migrate your database, navigate to your project's root directory and run the following command:
```bash
php artisan migrate
```

After the installation is complete, you can start the project by running:
```bash
php artisan start:project
```
