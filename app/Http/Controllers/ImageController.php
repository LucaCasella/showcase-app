<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($album_id)
    {
        $album = Album::find($album_id);
        $images = $album->children;

        return view('images.index')->with(['album' => $album, 'images' => $images]);
    }

    public function create($album_id)
    {
        return view('backoffice.images.create')->with('album_id', $album_id);
    }
}
