<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;

class CountriesController extends Controller
{
    function get(){
    	$countries = Countries::all();
    	return response()->json($countries);
    }
}
