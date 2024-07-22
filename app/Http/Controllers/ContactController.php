<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validare date formular
        $request->validate([
            'Contact.name' => 'required|string|max:255',
            'Contact.email' => 'required|email|max:255',
            'Contact.phone' => 'required|string|max:255',
            'Contact.message' => 'required|string',
            'captchaResult' => 'required',
            'captchaMdResult' => 'required',
        ]);

        // Validare captcha
        if(md5($request->captchaResult) !== $request->captchaMdResult) {
            return back()->withErrors(['captchaResult' => 'Captcha invalid.']);
        }

        // Procesare date formular
        // Exemplu: salvare în baza de date, trimitere email, etc.
        
        return redirect()->back()->with('success', 'Formularul a fost trimis cu succes!');
    }
}
