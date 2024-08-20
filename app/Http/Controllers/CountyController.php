<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;

class CountyController extends Controller
{
    public function getCountiesByCountry($country_id)
    {
        $counties = County::where('country_id', $country_id)->get();
        return response()->json($counties);
    }
}
