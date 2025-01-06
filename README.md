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
# Test application in an environment that simulate production 

Once you've finished building your new features and want to see how they'll work in a real-world setting, you can spin up a Docker container to mimic your production environment. Here's how:

This command build vite and its manifest json

step 1 run command:
```bash
  npm run build
```

This command allow you to set up properly docker variable 

step 2 run command:
```bash
  php artisan Docker:set
```
This command build a docker container that simulate production environment, before verify that your docker app desktop is running

step 3 run command:
```bash
  docker-compose up -d
```

After the container starts, go to the Docker's address in your browser. Once the first page loads, navigate to the "/migrations" route. This will initialize the database with some data. You can also log in.
