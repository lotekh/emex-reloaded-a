<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function validateLogin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Adresa de email este obligatorie.',
                'email.email' => 'Adresa de email nu este validă.',
                'email.exists' => 'Nu există un cont cu această adresă de email.',
                'password.required' => 'Parola este obligatorie.',
                'password.min' => 'Parola trebuie să conțină cel puțin :min caractere.',
            ]
        );

        $errors = [];

        if ($validator->fails()) {
            if ($validator->errors()->has('email')) {
                $errors['email'] = $validator->errors()->first('email');
            }

            if ($validator->errors()->has('password')) {
                $errors['password'] = $validator->errors()->first('password');
            }

            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }

        return response()->json(['success' => true]);
    }
}
