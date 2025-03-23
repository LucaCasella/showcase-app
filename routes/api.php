<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/generate-token', [ApiController::class, 'generateToken']);

Route::post('/submit-contact', [ApiController::class, 'submitContact'])->middleware('SPA-verify');

Route::get('/albums', [ApiController::class, 'getAllAlbums'])->middleware('SPA-verify');

Route::get('/albums/{id}', [ApiController::class, 'getPhotosByAlbumId'])->middleware('SPA-verify');

Route::get('/google-review', [ApiController::class, 'getGoogleReview'])->middleware('SPA-verify');

Route::get('/video-list', function () {
    return Video::all()->pluck('yt_video_id')->toJson();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
});
