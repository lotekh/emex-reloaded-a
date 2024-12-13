<?php

namespace App\Http\Controllers;

use App\Models\CareerContact;
use App\Models\Media;
use Illuminate\Http\Request;

class CareerContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Angajari.name' => 'required|string|max:191',
            'Angajari.date_of_birth' => 'required|date',
            'Angajari.address' => 'required|string|max:191',
            'Angajari.postal_code' => 'required|string|max:191',
            'Angajari.email' => 'required|email|max:191',
            'Angajari.gender' => 'required|in:M,F',
            'Angajari.city' => 'required|string|max:191',
            'Angajari.message' => 'required|string',
            'Angajari.upload' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Handle file upload
        $cvId = null;
        if ($request->hasFile('Angajari.upload')) {
            $file = $request->file('Angajari.upload');
            $path = $file->store('media/career_contacts/cvs', 'public');
            $extension = $file->getClientOriginalExtension();

            // Determine file type based on MIME type
            $type = match ($extension) {
                'pdf' => 'application/pdf',
                'doc', 'docx' => 'application/msword',
                default => 'attachment',
            };

            // Save file in Media table
            $media = Media::create([
                'disk' => 'public',
                'directory' => 'media/career_contacts/cvs',
                'visibility' => 'public',
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'type' => $type,
                'ext' => $extension,
            ]);

            // dd($media);

            $cvId = $media->id;
        }

        // Save career contact in database
        CareerContact::create([
            'name' => $validated['Angajari']['name'],
            'date_of_birth' => $validated['Angajari']['date_of_birth'],
            'address' => $validated['Angajari']['address'],
            'postal_code' => $validated['Angajari']['postal_code'],
            'email' => $validated['Angajari']['email'],
            'gender' => $validated['Angajari']['gender'],
            'city' => $validated['Angajari']['city'],
            'message' => $validated['Angajari']['message'],
            'cv_id' => $cvId,
        ]);

        return redirect()->back()->with('success', 'Aplicarea ta a fost trimisă cu succes!');
    }
}
