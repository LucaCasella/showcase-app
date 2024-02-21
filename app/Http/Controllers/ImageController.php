<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class ImageController extends Controller
{
//    public function index($album_id)
//    {
//
//    }

    public function create($album_id)
    {
        // Retrieve the album
        $album = Album::find($album_id);

        // Retrieve related images
        $images = $album->children;

        return view('backoffice.images.create')->with(['album' => $album, 'images' => $images]);
    }
}
