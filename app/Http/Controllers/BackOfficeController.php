<?php

namespace App\Http\Controllers;


use App\Models\Collaboration;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;


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

    public function destroy($collaboration_id)
    {
        try {
            Log::info($collaboration_id);
            $collaboration = Collaboration::findOrFail($collaboration_id);


            $collaboration->delete();

            return redirect()->route('backoffice')->with('success', 'collaboration deleted successfully');

        }catch (\Illuminate\Database\QueryException $e){

            return redirect()->route('backoffice')->withErrors('error', $e->getMessage());
        }


    }
}
