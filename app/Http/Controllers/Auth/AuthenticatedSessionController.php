<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

          // Mută produsele din wishlist din sesiune în baza de date
        app(WishlistController::class)->moveSessionWishlistToDatabase();

        return redirect()->intended(url()->previous());
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         // Verifică dacă ruta anterioară este '/contul-meu'
        if ($request->headers->get('referer') && str_contains($request->headers->get('referer'), '/contul-meu')) {
            return redirect('/'); // Dacă este, redirecționează la pagina principală
        }
        return redirect(url()->previous()); // În alte cazuri, redirecționează la pagina anterioară
    }
}
