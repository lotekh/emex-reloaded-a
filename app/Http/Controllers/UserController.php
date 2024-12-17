<?php

namespace App\Http\Controllers;

use App\Models\City;
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
            $newPassword = $this->generateNewPassword();
            $user->password = Hash::make($newPassword);
            $user->save();

            $emailContent = "Salut, " . $user->email . "\nNoua ta parola este: " . $newPassword;

            Mail::raw($emailContent, function ($message) use ($user) {
                $message->to($user->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')) 
                    ->subject('Resetare parola');
            });

            Log::info('E-mail trimis pentru resetare parola:', [
                'email' => $user->email,
                'mesaj' => $emailContent,
                'parola' => $newPassword,
            ]);

            return redirect()->back()->with('success', 'Parola a fost resetata cu succes si trimisa pe email.');
        } else {
            Log::warning('E-mailul pentru resetare parola nu a fost găsit:', [
                'email' => $request->email,
            ]);
            return redirect()->back()->withErrors(['email' => 'Ne pare rau, dar acest email nu a fost gasit.']);
        }
    }

    public function generateNewPassword()
    {
        $characters = '0123456789abcdef';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function edit()
    {
        $user = Auth::user();
        $counties = County::all();
        $cities = City::all();

        // Get the orders of the user along with the products from the order
        $orders = $user->orders()->with('productVariations.product')->get();

        return view('contul-meu', compact('user', 'cities', 'counties', 'orders'));
    }

    public function saveDetaliiCont(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only(['last_name', 'first_name', 'phone']));

        // return redirect()->back()->with('success', 'Detalii cont actualizate cu succes.');
        return redirect('/contul-meu#' . $request->input('active_tab'))->with('success', 'Detalii cont actualizate cu succes.');
    }

    public function saveFacturare(Request $request)
    {
        $user = Auth::user();
        $data = $request->except(['_token', 'user_id']);
        $user->company_information = json_encode($data);
        $user->billing_type = $request->billing_type;
        $user->save();

        // return redirect()->back()->with('success', 'Informatii facturare actualizate cu succes.');
        $activeTab = $request->input('active_tab', 'detalii-cont');
        return redirect('/contul-meu#' . $activeTab)->with('success', 'Informatii facturare actualizate cu succes.');
    }

    public function saveLivrare(Request $request)
    {
        $user = Auth::user();
        $data = $request->except(['_token', 'user_id']);
        $user->delivery_information = json_encode($data);
        $user->save();

        // return redirect()->back()->with('success', 'Informatii livrare actualizate cu succes.');
        return redirect('/contul-meu#' . $request->input('active_tab'))->with('success', 'Informatii livrare actualizate cu succes.');
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

        // return redirect()->back()->with('success', 'Parola a fost schimbata cu succes.');
        return redirect('/contul-meu#' . $request->input('active_tab'))->with('success', 'Parola a fost schimbata cu succes.');
    }

    public function getCitiesByCounty($countyId)
    {
        $cities = City::where('county_id', $countyId)->get();
        return response()->json($cities);
    }

}
