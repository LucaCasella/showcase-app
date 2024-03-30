<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\Notification;
use App\Models\Contact;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class GuestFormController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment,
        ])->save;

        Mail::to('mailtrap.club@gmail.com')->send(new Notification($request->name, $request->email, $request->phone, $request->comment));

        Mail::to($request->input('email'))->send(new ContactMail($request->name));

        return redirect('/');
    }

//    public function show($contact_id)
//    {
//        $contact = Contact::findOrFail($contact_id);
//
//        return view('backoffice.contacts.show')->with(['contact' => $contact]);
//    }

//    public function setReplied($contact_id)
//    {
//        $contact = Contact::findOrFail($contact_id);
//
//        $contact->replied = !$contact->replied;
//
//        $contact->save();
//
//        return redirect()->route('backoffice')->with('success', 'Contact updated successfully');
//    }
//
//    public function setVisibility($contact_id)
//    {
//        $contact = Contact::findOrFail($contact_id);
//
//        $contact->visible = !$contact->visible;
//
//        $contact->save();
//
//        return redirect()->route('backoffice')->with('success', 'Contact updated successfully');
//    }

    public function destroy($contact_id)
    {
        // Retrieve selected album
        $contact = Contact::findOrFail($contact_id);

        $contact->delete();

        // Redirect the user and display success message
        return redirect()->route('backoffice')->with('success', 'Contact deleted successfully');
    }
}
