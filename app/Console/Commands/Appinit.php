<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class Appinit extends Command
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
    protected $description = 'First command to do after cloning a master branch';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $envFile = base_path('.env');
        $envExampleFile = base_path('.env.example');

        
        if (!File::exists($envFile)) {
            File::put;
            return;
        }else if(File::exists('.env')){
            $this->error('.env file already exists!');
            return;
        }

        
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

        return Command::SUCCESS;
    }
        
}
