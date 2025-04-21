<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Collaboration;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Support\Facades\Validator;
use Service\PdfManager\Facade\PdfManagerFacade;

class WorkWithUsController extends Controller
{
     public function store(Request $request){

         try {

             Validator::make($request->all(), [
                 'g-recaptcha-response' => ['required', new ReCaptchaEnterpriseRule],
                 'pdf' => ['required', 'file', 'mimetypes:application/pdf', 'max:2048'],
                 'email' => ['required', 'email'],
                 'phone' => ['required'],
             ]);

             Collaboration::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'privacy_accepted' => $request->privacycheck,
                 'curriculum' => PdfManagerFacade::storePdfFromRequest($request->file('pdf'), $request->name),
             ])->save;

             return redirect()->route('work-with-us')->with('success', 'Request collaboration created successfully');

         }catch (\Exception $e){

             return redirect()->route('work-with-us')->with('error', 'Something went wrong');
         }

     }
     public function index(){

         return PdfManagerFacade::getAllPathPdfFromDB();
     }
}
