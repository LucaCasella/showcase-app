<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        // Retrieve all albums
        $albums = Album::with('Image')->get();

        return view('backoffice.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('backoffice.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'cover_path' => 'required|image'
        ]);

        // Get filename with extension
        $fileNameWithExt = $request->file('cover_path')->getClientOriginalName();

        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('cover_path')->getClientOriginalExtension();

        // Create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('cover_path')->storeAs('public/album_covers', $fileNameToStore);

        // Create album
        $album = new Album;
        $album->title = $request->input('title');
        $album->cover_path = $fileNameToStore;
        $album->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album created successfully');
    }

    public function show($album_id)
    {
        $album = Album::query()->where('album_id', '=', $album_id)->first();

        return view('backoffice.show', compact('album'));
    }

    public function edit($album_id)
    {
        //retrieve selected album and its cover
        $album = Album::query()->where('album_id', '=', $album_id)->first();

        $currentCover = $album->cover_path;
//        dd($currentCover);
        return view('backoffice.edit', compact('album', 'currentCover'));
    }

    public function update(Request $request, $album_id)
    {
        //validate the input
        $request->validate([
            'title' => 'required',
            'cover_path' => 'image|max:1999'
        ]);

        //retrieve selected album
        $album = Album::query()->where('album_id', '=', $album_id)->first();

        //update the attributes
        $album->title = $request->title;
        $album->cover_path = $request->cover_path;
        $album->updated_at = now();

        //save updates
        $album->save();

        //redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album updated successfully');
    }

    public function destroy($album_id)
    {
        //retrieve selected album
        $album = Album::query()->where('album_id', '=', $album_id)->first();

        //delete the album
        $album->delete();

        //redirect the user and display success message
        return redirect()->route('index-album')->with('success', 'Album deleted successfully');
    }
}
