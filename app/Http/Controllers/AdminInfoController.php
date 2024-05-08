<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInfoController extends Controller
{
    public function index()
    {
        // Retrieve Admin Information
        $info = Admin::get();

        return view('backoffice.adminfo.index')->with('info', $info);
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
            'location' => 'required',
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
        $album->location = $request->input('location');
        $album->cover = $fileNameToStore;
        $album->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album created successfully');
    }

    public function show($album_id)
    {
        // Retrieve selected album and its photos with relation
        $album = Album::with('photo')->findOrFail($album_id);
        $photos = $album->photo;

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
            'location' => 'required',
            'cover' => 'required|image'
        ]);

        // Retrieve selected album
        $album = Album::findOrFail($album_id);

        // Update title
        $album->title = $request->title;
        $album->location = $request->location;

        // Delete previous cover
        Storage::delete('public/album_covers/'.$album->cover);

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
        $album = Album::findOrFail($album_id);

        // Delete the album and related cover
        if (Storage::delete('public/album_covers/'.$album->cover)){
            $album->delete();
        }

        // Delete photos related to the album deleted
        Storage::deleteDirectory('public/photos/'.$album->id);

        // Redirect the user and display success message
        return redirect()->route('index-album')->with('success', 'Album deleted successfully');
    }
}
