<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GuestFormController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\VideoController;
use App\Models\Contact;
use App\Http\Controllers\LogsController;
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


Route::get('/backoffice', function () {
    $contacts = Contact::all()->where('privacy_accepted', '=', 1);
    return view('backoffice.dashboard', ['contacts' => $contacts]);
})->middleware(['auth', 'verified'])->name('backoffice');

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



Route::post('/guest-form-submit',[GuestFormController::class, 'store'])->name('guest-form');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/adm-gallery', [AlbumController::class, 'index'])->name('index-album');
    Route::get('/adm-gallery/create', [AlbumController::class, 'create'])->name('create-album');
    Route::post('/adm-gallery/store', [AlbumController::class, 'store'])->name('store-album');
    Route::get('/adm-gallery/show/{album_id}', [AlbumController::class, 'show'])->name('show-album');
    Route::get('/adm-gallery/edit/{album_id}', [AlbumController::class, 'edit'])->name('edit-album');
    Route::put('/adm-gallery/update/{album_id}', [AlbumController::class, 'update'])->name('update-album');
    Route::delete('/adm-gallery/destroy/{album_id}', [AlbumController::class, 'destroy'])->name('destroy-album');

    Route::get('/adm-gallery/{album_id}/photo/create', [PhotoController::class, 'create'])->name('create-photo');
    Route::post('/adm-gallery/{album_id}/photo/store', [PhotoController::class, 'store'])->name('store-photo');

    Route::get('/adm-videos', [VideoController::class, 'index'])->name('index-video');
    Route::get('/adm-videos/create', [VideoController::class, 'create'])->name('create-video');
    Route::post('/adm-videos/store', [VideoController::class, 'store'])->name('store-video');
    Route::get('/adm-videos/edit/{video_id}', [VideoController::class, 'edit'])->name('edit-video');
    Route::put('/adm-videos/update/{video_id}', [VideoController::class, 'update'])->name('update-video');
    Route::delete('/adm-videos/destroy/{video_id}', [VideoController::class, 'destroy'])->name('destroy-video');

    Route::get('/adm-pricing', [PriceController::class, 'index'])->name('index-price');
});

Route::middleware('guestVerified')->group(function (){
    Route::get('/price', [PriceController::class, 'show'])->name('price-page');
});

Route::get('/logs', [LogController::class, 'showLogs']);

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::controller(PhotoController::class)->prefix('images')->group(function () {
        Route::get('','index')->name('images');
        Route::get('create','create')->name('images.create');
    });
});



//Localization Routes

Route::post('set-locale', [LocalizationController::class, 'setLocale'])->name('set.locale');


Route::get('/logs', [LogsController::class, 'showLogs']);


