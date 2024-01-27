<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Public Routes

Route::get('/', function () {
    return view('app');
});

Route::get('/weddings', function () {
    return view('weddings');
});

Route::get('/sessions', function () {
    return view('sessions');
});

Route::get('/reportage', function () {
    return view('reportage');
});

Route::get('/contacts', function () {
    return view('contacts');
});



//Admin Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//Localization Routes

Route::post('set-locale', [LocalizationController::class, 'setLocale'])->name('set.locale');

