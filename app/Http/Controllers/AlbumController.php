<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        // Retrieve all albums
        $albums = Album::with('Photo')->get();

        return view('backoffice.albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('backoffice.albums.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        // Get filename with extension
        $fileNameWithExt = $request->file('cover')->getClientOriginalName();

        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('cover')->getClientOriginalExtension();

        // Create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('cover')->storeAs('public/album_covers', $fileNameToStore);

        // Create album
        $album = new Album;
        $album->title = $request->input('title');
        $album->cover = $fileNameToStore;
        $album->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album created successfully');
    }

    public function show($album_id)
    {
//        dd($album_id);
        $album = Album::with('Photo')->find($album_id);
//        dd($album);
        $photos = $album->photo()->get();
//        dd($photos);
        return view('backoffice.albums.show')->with(['album' => $album, 'photos' => $photos]);
    }

    public function edit($album_id)
    {
        // Retrieve selected album
        $album = Album::find($album_id);

        return view('backoffice.albums.edit')->with('album', $album);
    }

    public function update(Request $request, $album_id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'cover' => 'required|image'
        ]);

        // Retrieve selected album
        $album = Album::findOrFail($album_id);

        // Update title
        $album->title = $request->title;

        // Get filename with extension
        $fileNameWithExt = $request->file('cover')->getClientOriginalName();

        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('cover')->getClientOriginalExtension();

        // Create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('cover')->storeAs('public/album_covers', $fileNameToStore);

        // Update cover
        $album->cover = $fileNameToStore;
        $album->updated_at = now();

        // Save updates
        $album->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album updated successfully');
    }

    public function destroy($album_id)
    {
        // Retrieve selected album
        $album = Album::query()->where('album_id', '=', $album_id)->first();

        // Delete the album
        $album->delete();

        // Redirect the user and display success message
        return redirect()->route('index-album')->with('success', 'Album deleted successfully');
    }
}
