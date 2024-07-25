<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::all();

        return view('admin.contacts.list', compact('contacts'));
    }

    public function save(Request $request)
    {
        $requestParams = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required',
            'from_email' => 'required|email',
            'to_email' => 'required|email',
        ]);

        ContactUs::create([
            'user_name' => $requestParams['user_name'],
            'user_email' => $requestParams['user_email'],
            'subject' => $requestParams['subject'],
            'message' => $requestParams['message'],
        ]);
        // Notification::route('mail', 'afaqahmad@robustagency.co')->notify(new ContactFormSubmitted($requestParams));

        $htmlContent = view('emails.contact_form_submitted', ['contactFormData' => $requestParams])->render();
        Resend::emails()->send([
            'from' => $requestParams['from_email'],
            'to' => [$requestParams['to_email']],
            'subject' => $requestParams['subject'],
            'html' => $htmlContent,
        ]);
        $notification = [
            'message' => 'Your message has been submitted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('home')->with($notification);
    }

    public function view(ContactUs $contact)
    {
        return view('admin.contacts.view', compact('contact'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();

        $message = 'Contact deleted Successfully';
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('contact-us.list')
            ->with($notification);
    }
}
