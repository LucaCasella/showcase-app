<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Creazione dell'utente amministratore con password crittografata
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'infoKabakova@yahoo.com',
            'password' => Hash::make(env('DB_PASSWORD'))
        ]);
    }
}
