<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    public function show(Request $request)
    {
        return view('contact-us');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'form-contact-name' => 'required|max:255',
            'form-contact-email' => 'required|email|max:255',
            'form-contact-message' => 'required',
        ]);

        Log::channel('single')->info('Contact Form Email:', [
            'recipient' => 'tbotee@yahoo.com',
            'data' => $validated
        ]);
        //Mail::to('tbotee@yahoo.com')->send(new ContactFormMail($validated));

        return back()->with('success', __('contact.thank_you_for_contacting'));
    }
}
