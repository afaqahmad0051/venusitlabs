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
        return view('contacts.list', compact('$contacts'));
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
