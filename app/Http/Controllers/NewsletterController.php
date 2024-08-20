<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterEmail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'NewsletterEmails.email' => 'required|email|unique:newsletter_emails,email',
        ]);

        $newsletterEmail = new NewsletterEmail();
        $newsletterEmail->email = $request->input('NewsletterEmails.email');
        $newsletterEmail->page_url = $request->input('current_url');
        $newsletterEmail->ip = $request->ip();
        $newsletterEmail->save();

        return redirect()->back()->with('success', 'Te-ai abonat cu succes la newsletter!');
    }
}
