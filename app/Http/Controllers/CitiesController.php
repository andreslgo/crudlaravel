<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;

class CitiesController extends Controller
{
    function get($idCountry){
    	$cities = Cities::with('country')->where('id_country', $idCountry)
    						->orderBy('city')
    						->get();
    	return response()->json($cities);
    }
}
