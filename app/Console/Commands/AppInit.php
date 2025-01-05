<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AppInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'App:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run this command once after cloning the repository';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        $envFile = base_path('.env');
        $envExampleFile = base_path('.env.example');


        if (!File::exists($envFile)) {
            File::put($envFile, '');
        } else {
            $this->error('.env file already exists!');
        }

        // Copia il contenuto di .env.example in .env
        if (File::exists($envExampleFile)) {
            File::copy($envExampleFile, $envFile);
            $this->info('.env file created from .env.example');
        } else {
            $this->error('.env.example file not found!');
            return;
        }

        // Genera la chiave dell'app
        $this->call('key:generate');
        $this->info('Application key generated successfully!');


        $this->updateAppEnvAndUrl();

    }

    /**
     * @throws Exception
     */
    function updateAppEnvAndUrl(): void
    {
        $envFilePath = base_path('.env');


        if (!File::exists($envFilePath)) {
            throw new Exception('.env file not found');
        }

        $envContent = File::get($envFilePath);

        $envContent = preg_replace('/^APP_ENV=.*$/m', 'APP_ENV=', $envContent);
        $envContent = preg_replace('/^APP_URL=.*$/m', 'APP_URL=http://127.0.0.1:8000/', $envContent);


        File::put($envFilePath, $envContent);

    }

}

