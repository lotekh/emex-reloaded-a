<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\OfferRequest;

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
            'interior_exterior' => 'required|integer|in:1,2',
            'message' => 'nullable|string',
            // Images - max 10 MB => 10240
            // 'images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
        ]);

        // $imagesPaths = [];
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $path = $image->store('offer_requests/images', 'public');
        //         $imagesPaths[] = $path;
        //     }
        // }

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
            // 'images' => json_encode($imagesPaths), 
        ]);

        return redirect('/solicita-cotatie')->with('success', 'Solicitarea a fost trimisă cu succes!');
    }
}

