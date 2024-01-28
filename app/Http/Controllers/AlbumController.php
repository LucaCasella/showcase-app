<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = Album::all()->where('visible', '=', 'true');
        return view('backoffice.adm-gallery', compact('data', 'page'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backoffice.adm-gallery', compact('data', 'page'));
    }

    public function edit($id)
    {
        $page = 'edit';
        $data = Album::find($id);
        return view('backoffice.adm-gallery', compact('data', 'page'));
    }
}
