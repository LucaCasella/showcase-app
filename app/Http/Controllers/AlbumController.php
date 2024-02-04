<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::query()->get()->toJson();
        $albumss = json_decode($albums);
//        dd($albumss);
        return view('backoffice.index', compact('albumss'));
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

    public function edit($id)
    {
        $page = 'edit';
        $data = Album::find($id);
        return view('backoffice.adm-gallery', compact('data', 'page'));
    }
}
