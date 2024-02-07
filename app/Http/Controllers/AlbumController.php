<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        //retrive all albums
        $data = Album::query()->get()->toJson();

        //decode to JSON
        $albums = json_decode($data);

        return view('backoffice.index', compact('albums'));
    }

    public function create()
    {
        return view('backoffice.create');
    }

    public function store(Request $request)
    {
        //validate the input
        $request->validate([
            'title' => 'required',
            'cover_path' => 'required'
        ]);

        //create new album
        Album::create($request->all());

        //redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album created successfully');
    }

    public function show(Album $album)
    {
        return view('backoffice.show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('backoffice.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        //validate the input
        $request->validate([
            'title' => 'required',
            'cover_path' => 'required'
        ]);

        //update the album
        $album->update($request->all());

        //redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Album updated successfully');
    }

    public function destroy(Album $album)
    {
        //delete the album
        $album->delete();

        //redirect the user and display success message
        return redirect()->route('index-album')->with('success', 'Album deleted successfully');
    }
}
