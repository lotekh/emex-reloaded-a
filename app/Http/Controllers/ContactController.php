<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $contact = Contact::create([
            'name' => $request->input('Contact.name'),
            'email' => $request->input('Contact.email'),
            'phone' => $request->input('Contact.phone'),
            'company' => $request->input('Contact.company'),
            'ip_address' => $request->ip(),
            'page_url' => url()->previous(),
            'message' => $request->input('Contact.message'),
        ]);

        try {
            $fromEmail = 'info@emex.ro'; 
            $clientEmail = $contact->email;

            // Create the email content
            $emailContent = "Nume: {$contact->name}\n";
            $emailContent .= "Email: {$contact->email}\n";
            $emailContent .= "Telefon: {$contact->phone}\n";
            $emailContent .= "Companie: " . ($contact->company ?: '-') . "\n";
            $emailContent .= "Mesaj: {$contact->message}\n";
            $emailContent .= "IP: {$contact->ip_address}\n";
            $emailContent .= "URL: {$contact->page_url}\n";

            // Send the email to the client
            Mail::raw($emailContent, function ($message) use ($clientEmail, $fromEmail) {
                $message->to($clientEmail)
                    ->from($fromEmail, 'Romtehnochim')
                    ->subject('Mesajul a fost trimis');
            });

            Log::info('Email trimis cu succes către client:', [
                'email' => $clientEmail,
                'contact_id' => $contact->id,
            ]);

        } catch (\Exception $e) {
            Log::error('A apărut o eroare la trimiterea emailului de contact:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        // Redirect to thank-you page
        return redirect()->route('thank-you');
    }
}
