<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate form
        $request->validate([
            'Contact.name' => 'required|string|max:255',
            'Contact.email' => 'required|email|max:255',
            'Contact.phone' => 'required|string|max:255',
            'Contact.message' => 'required|string',
            'captchaResult' => 'required',
            'captchaMdResult' => 'required',
        ]);

        // Validate captcha
        if (md5($request->captchaResult) !== $request->captchaMdResult) {
            return back()->withErrors(['captchaResult' => 'Captcha invalid.']);
        }

        // Save the information in database
        Contact::create([
            'name' => $request->input('Contact.name'),
            'email' => $request->input('Contact.email'),
            'phone' => $request->input('Contact.phone'),
            'company' => $request->input('Contact.company'),
            'ip_address' => $request->ip(),
            'page_url' => url()->previous(),
            'message' => $request->input('Contact.message'),
        ]);

        // Redirect to thank-you page
        return redirect()->route('thank-you');
        // return redirect()->route('home');
    }
}
