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
            $path = $file->store('media/offer_requests/files', 'public');
            $extension = $file->getClientOriginalExtension();
            
            // Determine file type based on MIME type
            $type = match ($extension) {
                'jpg', 'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
                default => 'attachment', // fallback type
            };

            // Save file in Media table
            $media = Media::create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'type' => $type,
                'ext' => $extension,
            ]);

            $fileId = $media->id;
        }

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

