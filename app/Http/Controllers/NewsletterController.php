<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'NewsletterEmails.email' => 'required|email',
        ]);

        if (NewsletterEmail::where('email', $request->input('NewsletterEmails.email'))->exists()) {
            return redirect()->back()->with('error', 'Acest email este deja înregistrat!');
        }

        $newsletterEmail = new NewsletterEmail();
        $newsletterEmail->email = $request->input('NewsletterEmails.email');
        $newsletterEmail->page_url = $request->input('current_url');
        $newsletterEmail->ip = $request->ip();
        $newsletterEmail->save();

        try {
            $fromEmail = 'info@emex.ro'; 
            $clientEmail = $newsletterEmail->email;
    
            $emailContent = "Salut,\n\n";
            $emailContent .= "Îți mulțumim că te-ai abonat la newsletterul nostru!\n";
            $emailContent .= "Toate cele bune,\n";
            $emailContent .= "Echipa Romtehnochim";
    
            Mail::raw($emailContent, function ($message) use ($clientEmail, $fromEmail) {
                $message->to($clientEmail)
                    ->from($fromEmail, 'Romtehnochim')
                    ->subject('Confirmare abonare la newsletter');
            });
    
            Log::info('Email de confirmare newsletter trimis:', [
                'email' => $clientEmail,
            ]);
    
        } catch (\Exception $e) {
            Log::error('Eroare la trimiterea emailului de confirmare newsletter:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        return redirect()->back()->with('success', 'Te-ai abonat cu succes la newsletter!');
    }
}
