<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Service\PhotoManager\Facades\PhotoManagerFacades;

class PhotoController extends Controller
{
    public function create($album_id)
    {
        $album = Album::find($album_id);

        if (!$album) {
            return redirect()->route('index-album')->with('error', 'Album non trovato');
        }

        $photos = $album->children;

        return view('backoffice.images.create')->with(['album' => $album, 'photos' => $photos]);
    }

    public function store(Request $request, $album_id)
    {
        try {
            $message =  PhotoManagerFacades::store($request, $album_id);

            Log::info($message);

            return redirect()->route('show-album', [$album_id])->with('success', $message);

        } catch (Exception $e) {

            return redirect()->route('create-photo')->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $album_id, $photo_id)
    {
        try {
            return PhotoManagerFacades::delete($request, $album_id, $photo_id);
        } catch (Exception $e) {
            return redirect()->route('show-album')->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request) {
        try {
            return PhotoManagerFacades::updateOrder($request);
        } catch (Exception $e) {
            return redirect()->route('show-album')->with('error', $e->getMessage());
        }
    }
}
