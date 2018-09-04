<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerTypes;

class CustomerTypesController extends Controller
{
    function get(){
    	return response()->json(CustomerTypes::all());
    }
}
