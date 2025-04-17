<?php

namespace Service\AlbumManager;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface AlbumManagerContract
{
    public function store(Request $request) :RedirectResponse;
    public function update(Request $request, $album_id);
    public function toggleHighlight($album_id);
    public function delete(Request $request, $album_id);
}
