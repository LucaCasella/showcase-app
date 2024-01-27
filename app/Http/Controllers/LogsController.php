<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogsController extends Controller
{
    public function showLogs()
    {

        $logContent = File::get(storage_path('logs/laravel.log'));


        return '<pre>' . $logContent . '</pre>';
    }
}
