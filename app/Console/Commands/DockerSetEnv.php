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


        $variables = [
            'MYSQL_DATABASE' => 'laravelDocker_db',
            'MYSQL_USER' => 'laravel_user',
            'MYSQL_PASSWORD' => Str::random(8),
            'MYSQL_ROOT_PASSWORD' => 'root'
        ];


        foreach ($variables as $key => $value) {
            if (!preg_match("/^$key=.*$/m", $envContent)) {
                $envContent .= "\n$key=$value";
            } else {
                $envContent = preg_replace("/^$key=.*$/m", "$key=$value", $envContent);
            }
        }

        File::put($envFile, $envContent);

        $this->info('.env file updated successfully.');

        return CommandAlias::SUCCESS;
    }

}
