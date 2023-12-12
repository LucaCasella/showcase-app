<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class startApp extends Command

{
    protected $signature = 'start:project';
    protected $description = '';

    public function handle(): void
    {
        $this->info('npm run dev...');
        $descriptorspec = [
            0 => ["pipe", "r"],
            1 => ["pipe", "w"],
            2 => ["pipe", "w"],
        ];

        $process = proc_open('npm run dev', $descriptorspec, $pipes);

        sleep(5);

        $this->call('serve');

        proc_terminate($process);

    }
}
