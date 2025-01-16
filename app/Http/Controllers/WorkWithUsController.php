<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkWithUsController extends Controller
{
     public function store(Request $request){

         $validator = Validator::make($request->all(), [
             'g-recaptcha-response' => ['required', new ReCaptchaEnterpriseRule]
         ]);

         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
         }

          return '';
     }
}
