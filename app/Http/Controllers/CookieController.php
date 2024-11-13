<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function acceptCookies(Request $request)
{
    // Set the cookie to last for a year
    // 525600 minutes = 1 year
    $cookie = cookie('cookies_accepted', true, 525600); 

    return response()->json(['success' => true])->withCookie($cookie);
}

}
