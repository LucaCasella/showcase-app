<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLocale(Request $request)
    {

        $locale = $request->input('locale');

        App::setLocale($locale);

        Session::put('locale',$locale);

        return redirect()->back();

    }
}
