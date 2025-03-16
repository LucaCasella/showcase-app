<?php

namespace App\Http\Controllers;


use App\Mail\ContactMail;
use App\Mail\Notification;
use App\Models\Contact;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class GuestFormController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => ['required', new ReCaptchaEnterpriseRule],
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment,
                'privacy_accepted' => $request->privacycheck
            ])->save;

            Mail::to('rasomanuel1@gmail.com')->send(new Notification($request->name, $request->email, $request->phone, $request->comment));

            Mail::to('rasomanuel1@gmail.com')->send(new ContactMail($request->name));

            return redirect()->route('home')->with('success', 'Thanks for contacting us!');
        }
        catch (\Exception $exception){
            return redirect()->route('home')->with('error', 'something went wrong!');
        }

    }

    public function destroy($contact_id)
    {
        // Retrieve selected album
        $contact = Contact::findOrFail($contact_id);

        $contact->delete();

        // Redirect the user and display success message
        return redirect()->route('backoffice')->with('success', 'Contact deleted successfully');
    }
}
