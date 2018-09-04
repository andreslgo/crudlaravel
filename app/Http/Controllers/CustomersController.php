<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
    function get(){
    	$customers = Customers::with('country')->with('cities')
    								->with('customertypes')
    								->all();
    	return response()->json($customers);
    }
}
