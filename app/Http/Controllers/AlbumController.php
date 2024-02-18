<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit($album_id)
    {

        $album = Album::query()->where('album_id', '=', $album_id)->first();

        $albumDecode = json_decode($album);

        return view('backoffice.edit', compact('album'));
    }

    public function update(Request $request, $album_id)
    {
        $request->validate([
            'title' => 'required',
            'cover_path' => 'required'
        ]);

        $album = Album::query()->where('album_id', '=', $album_id)->first();

        $album->title = $request->title;
        $album->cover_path = $request->cover_path;
        $album->updated_at = now();
        $album->save();


        //update the album
//        Album::update($request->all());

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
