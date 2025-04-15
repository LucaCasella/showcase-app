<?php

namespace Service\DetailManager;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface DetailManagerContract
{
    public function store(Request $request, $album_id) :RedirectResponse;
    public function update(Request $request, $album_id, $detail_id);
    public function clear($album_id);
}
