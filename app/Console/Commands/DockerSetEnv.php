<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command as CommandAlias;

class DockerSetEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Docker:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set env variables for the Docker container that simulate production environment';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws Exception
     */
    public function handle()
    {
        $envFile = base_path('.env');

        if (!File::exists($envFile)) {
            throw new Exception('.env file not found');
        }
        $envContent = File::get($envFile);

        $envContent = preg_replace('/^MYSQL_DATABASE=.*$/m', 'MYSQL_DATABASE='.'laravelDocker_db', $envContent);
        $envContent = preg_replace('/^MYSQL_USER=.*$/m', 'MYSQL_USER='.'laravel_user', $envContent);
        $envContent = preg_replace('/^MYSQL_PASSWORD=.*$/m', 'MYSQL_PASSWORD='. Str::random(8), $envContent);

        File::put($envFile, $envContent);

        $this->info('.env file updated successfully.');

        return CommandAlias::SUCCESS;
    }
}
