<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Mockery\Exception;
use Service\AlbumManager\Facades\AlbumMangerFacades;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photo')->get();

        return view('backoffice.albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('backoffice.albums.create');
    }

    public function store(Request $request)
    {
        try {
            return AlbumMangerFacades::store($request);
        } catch (\Exception $e) {
            return redirect()->route('create-album')->with('error', $e->getMessage());
        }
    }

    public function show($album_id)
    {
        $album = Album::findOrFail($album_id);
        $photos = $album->photo()->orderBy('order')->get();

        return view('backoffice.albums.show')->with(['album' => $album, 'photos' => $photos]);
    }

    public function edit($album_id)
    {
        $album = Album::find($album_id);

        return view('backoffice.albums.edit')->with('album', $album);
    }

    public function update(Request $request, $album_id)
    {
        try {
            return AlbumMangerFacades::update($request, $album_id);
        } catch (Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }

    public function toggleHighlight($album_id)
    {
        try {
            return AlbumMangerFacades::toggleHighlight($album_id);
        } catch (Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $album_id)
    {
        try {
            return AlbumMangerFacades::delete($request, $album_id);
        } catch (Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }
}
