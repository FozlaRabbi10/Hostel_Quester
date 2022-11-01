<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        Location::create([
            "name" => trim($request -> get('location_name'))
        ]);
    }
}
