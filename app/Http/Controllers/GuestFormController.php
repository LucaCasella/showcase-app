<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class GuestFormController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Contact::class],
            'phone' => ['required', 'string', 'max:10']
        ]);

         Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ])->save;

        $request->session()->put(['guest-verified' => true]);

        return redirect('/');
    }
}
