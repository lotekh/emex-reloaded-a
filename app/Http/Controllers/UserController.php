<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\County;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{

    public function forgotPassword(Request $request)
    {
        // Validate the email field
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the user with the given email exists
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $emailContent = 'Salut, ' . $user->email;

            Mail::raw($emailContent, function ($message) use ($user) {
                $message->to($user->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')) 
                    ->subject('Resetare parolă');
            });

            Log::info('E-mail trimis pentru resetare parolă:', [
                'email' => $user->email,
                'mesaj' => $emailContent,
            ]);

            return redirect()->back()->with('success', 'Parola a fost resetata cu succes si trimisa pe email.');
        } else {
            Log::warning('E-mailul pentru resetare parolă nu a fost găsit:', [
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['email' => 'Ne pare rau, dar acest email nu a fost gasit.']);
        }
    }

    public function edit()
    {
        $user = Auth::user();
        $countries = Country::all();
        $counties = County::all();

        // Preluăm comenzile utilizatorului împreună cu produsele din comenzi
        $orders = $user->orders()->with('productVariations.product')->get();

        return view('contul-meu', compact('user', 'countries', 'counties', 'orders'));
    }

    public function saveDetaliiCont(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only(['last_name', 'first_name', 'phone']));

        return redirect()->back()->with('success', 'Detalii cont actualizate cu succes.');
    }

    public function saveFacturare(Request $request)
    {
        $user = Auth::user();
        $data = $request->except(['_token', 'user_id']);
        $user->company_information = json_encode($data);
        $user->billing_type = $request->billing_type;
        $user->save();

        return redirect()->back()->with('success', 'Informatii facturare actualizate cu succes.');
    }

    public function saveLivrare(Request $request)
    {
        $user = Auth::user();
        $data = $request->except(['_token', 'user_id']);
        $user->delivery_information = json_encode($data);
        $user->save();

        return redirect()->back()->with('success', 'Informatii livrare actualizate cu succes.');
    }

    public function saveSchimbaParola(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Parola curenta este incorecta.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Parola a fost schimbata cu succes.');
    }

    public function getCountiesByCountry($countryId)
    {
        $counties = County::where('country_id', $countryId)->get();

        return response()->json($counties);
    }
}
