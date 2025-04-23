<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\OfferRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $path = null;
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
                'disk' => 'public',
                'directory' => 'media/offer_requests/files',
                'visibility' => 'public',
                'name' => $file->getClientOriginalName(),
                'path' => 'media/offer_requests/files/' . $file->getClientOriginalName(),
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

        // Email logic
        try {
            $emexEmail = 'info@emex.ro';
            $clientEmail = $validated['email'];
            $clientName = $validated['name'];

            // Email content
            $emailContent = "S-a solicitat oferta de pret pentru:\n";
            $emailContent .= "Sistem: {$validated['application']}\n";
            $emailContent .= "Utilizare: {$validated['usage']}\n";
            $emailContent .= "Suprafata totala: {$validated['surface']}\n";
            $emailContent .= "Zonă: " . ($validated['interior_exterior'] == 1 ? 'Interior' : 'Exterior') . "\n";
            $emailContent .= "Mesaj: {$validated['message']}\n\n";
            $emailContent .= "Detalii:\n";
            $emailContent .= "Nume sau firma: {$validated['name']}\n";
            $emailContent .= "Adresa de email: {$validated['email']}\n";
            $emailContent .= "Numar de telefon: {$validated['phone']}\n";
            $emailContent .= "Adresa completa: " . ($validated['address'] ?? '-') . "\n";
            $emailContent .= "Localitate: " . ($validated['city'] ?? '-') . "\n";

            // Email to client
            Mail::raw($emailContent, function ($message) use ($emexEmail, $clientEmail, $clientName, $path) {
                $message->to($clientEmail)
                    ->from($emexEmail, 'Romtehnochim')
                    ->subject('Cerere de oferta');
                
                if ($path) {
                    $message->attach(Storage::disk('public')->path($path));
                }
            });
            Log::info('Email de confirmare trimis către client:', [
                'email' => $clientEmail,
                'offer_request_id' => $offerRequest->id,
            ]);

            // Email to Emex
            Mail::raw($emailContent, function ($message) use ($emexEmail, $clientEmail, $clientName, $path) {
                $message->to($emexEmail)
                    ->from($clientEmail, $clientName)
                    ->subject('Cerere de oferta');

                if ($path) {
                    $message->attach(Storage::disk('public')->path($path));
                }
            });
            Log::info('Email trimis către Emex:', [
                'email' => $emexEmail,
                'offer_request_id' => $offerRequest->id,
            ]);

        } catch (\Exception $e) {
            Log::error('Eroare la trimiterea emailului:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }


        return redirect('/solicita-cotatie')->with('success', 'Solicitarea a fost trimisă cu succes!');
    }
}

