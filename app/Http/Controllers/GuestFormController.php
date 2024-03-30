<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class GuestFormController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'comment',
//            'g-recaptcha-response' => ['required', new ReCaptchaEnterpriseRule]
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment,
        ])->save;

        return redirect('/');
    }
}
