<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\OfferRequest;
use App\Models\Media;

class OfferRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|string|max:191',
            'address' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'surface' => 'nullable|string|max:191',
            'usage' => 'nullable|string|max:191',
            'application' => 'nullable|string|max:191',
            'interior_exterior' => 'nullable|integer|in:1,2',
            'message' => 'nullable|string',
            // File - max 10 MB => 10240
            'file' => 'nullable|file|mimes:jpg,jpeg,png,rar,zip|max:10240', 
        ]);

        // Handle file upload
        $fileId = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('offer_requests/files', 'public');
            $extension = $file->getClientOriginalExtension();

            // Save file in Media table
            $media = Media::create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'type' => 'attachment',
                'ext' => $extension,
            ]);

            // dd($media);

            $fileId = $media->id;
            // dd($fileId);
        }
        // dd($validated['city'] ?? null);

        // Save offer request in database
        $offerRequest = OfferRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'surface' => $validated['surface'] ?? null,
            'usage' => $validated['usage'] ?? null,
            'application' => $validated['application'] ?? null,
            'interior_exterior' => $validated['interior_exterior'] ?? null,
            'message' => $validated['message'] ?? null,
            'file_id' => $fileId,
        ]);

        return redirect('/solicita-cotatie')->with('success', 'Solicitarea a fost trimisă cu succes!');
    }
}

