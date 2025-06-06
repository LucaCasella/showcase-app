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
use App\Models\Album;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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

//    ADMIN ROUTES

Route::get('/admin-login', function () {
    return view('welcome');
})->name('login-admin');

Route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(['auth' , 'verified'])->name('backoffice');

Route::delete('/backoffice/{contact_id}', [GuestFormController::class, 'destroy'])->name('destroy-contact');

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

//    ROUTE THAT RUN MIGRATIONS & SEEDER UNDER AUTH MIDDLEWARE
    Route::get('/migrations', function (){
        return "Migrazioni e seeding completati con successo!";
    })->middleware('run-migrations');

//    Route::get('/adm-info', [AdminInfoController::class, 'index'])->name('adm-info')
});

// SITEMAPS ROUTES
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    // Add here static pages
    $sitemap->add(Url::create('/')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/albums')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

    $sitemap->add(Url::create('/videos')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/locations')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/vendors')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/extra')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/about-us')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/work-with-us')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    $sitemap->add(Url::create('/contacts')
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    // Add here dynamic contents
    Album::all()->each(function ($album) use ($sitemap) {
        // Converti la stringa in Carbon/DateTime
        $lastModified = $album->updated_at ? Carbon::parse($album->updated_at) : now();

        $sitemap->add(Url::create("/albums/{$album->slug}")
            ->setLastModificationDate($lastModified)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.7));
    });

    // Save the sitemaps
    $sitemap->writeToFile(public_path('sitemap.xml'));
});

// ROUTE THAT SHOW LOGS
Route::get('/logs', [LogController::class, 'showLogs']);

// LOCALIZATION ROUTES
Route::post('set-locale', [LocalizationController::class, 'setLocale'])->name('set.locale');

// REACT ROUTE BUILD
Route::fallback(function () {
    return view('react.react');
});


