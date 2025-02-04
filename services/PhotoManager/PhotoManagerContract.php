<?php

namespace Service\PhotoManager;

use Illuminate\Http\Request;

interface PhotoManagerContract
{
    public function store(Request $request, $album_id);
    public function update(Request $request, $album_id);
    public function delete(Request $request, $album_id, $photo_id);
}
