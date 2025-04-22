<?php

use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GuestFormController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WorkWithUsController;
use App\Models\Album;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

//todo: high - at the end check all the routes end clear useless ones

// PUBLIC ROUTES
Route::get('/migrations', function (){
    return "Migrazioni e seeding completati con successo!";
})->middleware('run-migrations');

//Route::get('/', function () {
//    return view('pages.home');
//})->name('home');

//Route::get('/work-with-us', function (){
//    return view('pages.work-with-us');
//})->name('work-with-us');

Route::get('/photos', function () {
    $albums = Album::where('visible', 1)
        ->where('type', 'weddings')
        ->get();
    return view('pages.photos', ['albums' => $albums]);
})->name('photos');

//Route::get('/locations', function () {
//    $albums = Album::where('visible', 1)
//        ->where('type', 'locations')
//        ->get();
//    return view('pages.photos', ['albums' => $albums]);
//})->name('photos');

Route::get('/photos/{id}', function ($album_id) {
    $album = Album::with('photo')->findOrFail($album_id);
    $photos = $album->photo;
    return view('pages.photos-show')->with(['album' => $album, 'photos' => $photos]);
})->name('photos-show');

//Route::get('/videos', function () {
//    $videos = Video::where('visible', '=', 1)->get();
//    return view('pages.videos', ['videos' => $videos]);
//})->name('videos');

Route::post('/guest-form-submit', [GuestFormController::class, 'store'])->name('guest-form');
Route::post('/collaborator-form-submit', [WorkWithUsController::class, 'store'])->name('collaborator-form');




// ADMIN ROUTES

Route::get('/admin-login', function () {
    return view('welcome');
})->name('login-admin');

//Route::get('/backoffice', function () {
//    $contacts = Contact::where('privacy_accepted', '=', 1)
//        ->where('visible', '=', 1)
//        ->orderBy('created_at', 'asc')->get();
//    return view('backoffice.dashboard', ['contacts' => $contacts]);
//})->middleware(['auth', 'verified'])->name('backoffice');

Route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(['auth' , 'verified'])->name('backoffice');

Route::delete('/backoffice/{contact_id}', [GuestFormController::class, 'destroy'])->name('destroy-contact');

//    Route::get('/adm-info', [AdminInfoController::class, 'index'])->name('adm-info')

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    ALBUM ROUTES
    Route::get('/adm-gallery', [AlbumController::class, 'index'])->name('index-album');
    Route::get('/adm-gallery/create', [AlbumController::class, 'create'])->name('create-album');
    Route::post('/adm-gallery/store', [AlbumController::class, 'store'])->name('store-album');
    Route::get('/adm-gallery/show/{album_id}', [AlbumController::class, 'show'])->name('show-album');
    Route::get('/adm-gallery/edit/{album_id}', [AlbumController::class, 'edit'])->name('edit-album');
    Route::put('/adm-gallery/update/{album_id}', [AlbumController::class, 'update'])->name('update-album');
    Route::patch('/adm-gallery/highlight/{album_id}', [AlbumController::class, 'toggleHighlight'])->name('toggle-highlight');
    Route::delete('/adm-gallery/destroy/{album_id}', [AlbumController::class, 'destroy'])->name('destroy-album');

//    ALBUM PHOTO ROUTES
    Route::get('/adm-gallery/{album_id}/photo/create', [PhotoController::class, 'create'])->name('create-photo');
    Route::post('/adm-gallery/{album_id}/photo/store', [PhotoController::class, 'store'])->name('store-photo');
    Route::delete('/adm-gallery/{album_id}/{photo_id}', [PhotoController::class, 'destroy'])->name('destroy-photo');
    Route::post('/adm-gallery/update-photo-order', [PhotoController::class, 'updateOrder'])->name('update-photo-order');

//    ALBUM DETAIL ROUTES
    Route::get('/adm-gallery/{album_id}/detail/create', [DetailController::class, 'create'])->name('create-detail');
    Route::post('/adm-gallery/{album_id}/detail/store', [DetailController::class, 'store'])->name('store-detail');
    Route::put('/adm-gallery/{album_id}/detail/{detail_id}/update', [DetailController::class, 'update'])->name('update-detail');
    Route::put('/adm-gallery/{album_id}/detail/clear', [DetailController::class, 'clear'])->name('clear-detail');
    Route::delete('/adm-gallery/{album_id}/detail/delete', [DetailController::class, 'delete'])->name('delete-detail');

//    VIDEO ROUTES
    Route::get('/adm-videos', [VideoController::class, 'index'])->name('index-video');
    Route::get('/adm-videos/create', [VideoController::class, 'create'])->name('create-video');
    Route::post('/adm-videos/store', [VideoController::class, 'store'])->name('store-video');
    Route::get('/adm-videos/edit/{video_id}', [VideoController::class, 'edit'])->name('edit-video');
    Route::put('/adm-videos/update/{video_id}', [VideoController::class, 'update'])->name('update-video');
    Route::delete('/adm-videos/destroy/{video_id}', [VideoController::class, 'destroy'])->name('destroy-video');

    Route::delete('/backoffice/{contact_id}', [GuestFormController::class, 'destroy'])->name('destroy-contact');

    Route::delete('/collaboration/{collaboration_id}', [BackOfficeController::class, 'destroy'])->name('destroy-collaboration');

//    Route::get('/adm-info', [AdminInfoController::class, 'index'])->name('adm-info')
});

// ROUTE THAT SHOW LOGS
Route::get('/logs', [LogController::class, 'showLogs']);

// LOCALIZATION ROUTES
Route::post('set-locale', [LocalizationController::class, 'setLocale'])->name('set.locale');

// REACT ROUTE BUILD
//Route::get('/{any}', function () {
//    return view('react.react');
//})->where('any', '.*');

Route::fallback(function () {
    return view('react.react');
});

// IN CASE EXPLODE PRODUCTION

