<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('contact');
    }
}
