<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GuestFormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowPriceController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/backoffice', function () {
    return view('backoffice.dashboard');
})->middleware(['auth', 'verified'])->name('backoffice');



Route::post('/guest-form-submit',[GuestFormController::class, 'store'])->name('guest-form');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/adm-gallery', [AlbumController::class, 'index'])->name('index-album');
    Route::get('/adm-gallery/create', [AlbumController::class, 'create'])->name('create-album');
//    Route::get('/show-album/{album_id}', [AlbumController::class, 'show']);
    Route::post('/adm-gallery/store', [AlbumController::class, 'store'])->name('store-album');
//    Route::post('/update-album/{album_id}', [AlbumController::class, 'edit']);
//    Route::post('/delete-album/{album_id}', [AlbumController::class, 'destroy']);

    Route::get('/adm-pricing', function () {
        return view('backoffice.adm-pricing');
    })->name('adm-pricing');
});

Route::middleware('guestVerified')->group(function (){
    Route::get('/price', [ShowPriceController::class, 'show'])->name('price-page');
});

Route::get('/logs', [LogController::class, 'showLogs']);

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::controller(ImageController::class)->prefix('images')->group(function () {
        Route::get('','index')->name('images');
        Route::get('create','create')->name('images.create');
    });
});
