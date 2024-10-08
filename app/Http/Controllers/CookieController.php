<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function acceptCookies(Request $request)
{
    // Setăm cookie-ul pentru a dura un an (de exemplu)
    $cookie = cookie('cookies_accepted', true, 525600); // 525600 minute = 1 an

    return response()->json(['success' => true])->withCookie($cookie);
}

}
