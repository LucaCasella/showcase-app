<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLogs(): string
    {

        $logContent = File::get(storage_path('logs/laravel.log'));


        return '<pre>' . $logContent . '</pre>';
    }
}
