<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Detail;
use Illuminate\Http\Request;
use Service\DetailManager\Facades\DetailMangerFacades;

class DetailController extends Controller
{
    public function create($album_id)
    {
        try {
            $album = Album::findOrFail($album_id);
            $detail = Detail::where('album_id', '=' , $album_id)->first();

            if ($detail) {
                return view('backoffice.details.manage', compact('album', 'detail'));
            }

            return view('backoffice.details.manage')->with('album', $album);
        } catch (\Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }

    public function store(Request $request, $album_id)
    {
        try {
            return DetailMangerFacades::store($request, $album_id);
        } catch (\Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $album_id, $detail_id)
    {
        try {
            return DetailMangerFacades::update($request, $album_id, $detail_id);
        } catch (\Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }

    public function clear($album_id)
    {
        try {
            return DetailMangerFacades::clear($album_id);
        } catch (\Exception $e) {
            return redirect()->route('index-album')->with('error', $e->getMessage());
        }
    }
}
