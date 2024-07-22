<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    // getting list of all Contacts
    public function index()
    {
        $contacts = ContactUs::all();

        return view('contacts.list', compact('contacts'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required'
        ]);


        ContactUs::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->route('home');
    }
    // viewing single contact
    public function view(ContactUs $contact)
    {
        return view('contact.view', compact('contact'));
    }

    // deleting a contact
    public function destroy(ContactUs $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.list')
            ->with('success', 'Contact deleted successfully.');
    }
}
