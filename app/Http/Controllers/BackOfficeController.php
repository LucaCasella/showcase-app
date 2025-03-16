<?php

namespace App\Http\Controllers;


use App\Models\Collaboration;
use App\Models\Contact;
use Exception;
use Illuminate\Database\QueryException;
use Service\PdfManager\Facade\PdfManagerFacade;



class BackOfficeController extends Controller
{
    public function index(){

        $contacts = Contact::where('privacy_accepted', '=', 1)
            ->where('visible', '=', 1)
            ->orderBy('created_at', 'asc')->get();

        $collaborations = Collaboration::where('privacy_accepted', '=', 1)
            ->where('visible','=', 1)
            ->orderBy('created_at', 'asc')->get();

        return view('backoffice.dashboard', ['contacts' => $contacts, 'collaborations' => $collaborations]);
    }

    /**
     * @throws Exception
     */
    public function destroy($collaboration_id)
    {
        try {

            $collaboration = Collaboration::findOrFail($collaboration_id);

           if(!PdfManagerFacade::deletePdfFile($collaboration->curriculum)){
               throw new Exception('File not found');
           }

            $collaboration->delete();

            return redirect()->route('backoffice')->with('success', 'collaboration deleted successfully');

        }catch (QueryException $e){

            return redirect()->route('backoffice')->withErrors('error', $e->getMessage());
        }


    }
}
