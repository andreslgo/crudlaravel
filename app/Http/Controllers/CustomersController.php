<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
    public function get(){
    	$customers = Customers::with('country')->with('cities')
    								->with('customertypes')
    								->get();
    	return response()->json($customers);
    }

    public function getOne($idCustomer){
    	$customer = Customers::find($idCustomer);
    	return response()->json($customer);
    }

    public function create(Request $request){
    	try{
    		$customer = new Customers;
    		$customer->nit = $request->nit;
    		$customer->name = $this->sanitizeString($request->name);
    		$customer->id_customer_type = $request->customer_type;
    		$customer->address = $this->sanitizeString($request->address);
    		$customer->id_country = $request->country;
    		$customer->id_city = $request->city;
    		$customer->phone = $request->phone;
    		$customer->email = $request->email;
    		$customer->save();
    		return response()->json(["message" => "Cliente creado satisfactoriamente!"])->setStatusCode(201, 'Created');
    	}catch(\Exception $e ){
    		return response()->setStatusCode(400, 'Forbidden')->json(['error'=> $e->getMessage()]);
    	}
    }

    public function update(Request $request){
    	try{
	    	$customer = Customers::find($request->id);
				$customer->nit = $request->nit;
	    	$customer->name = $this->sanitizeString($request->name);
	    	$customer->id_customer_type = $request->customer_type;
	    	$customer->address = $this->sanitizeString($request->address);
	    	$customer->id_country = $request->country;
	    	$customer->id_city = $request->city;
	    	$customer->phone = $request->phone;
	    	$customer->email = $request->email;
	    	$customer->save();
	    	return response()->json(["message" => "Cliente actualizado satisfactoriamente!"])->setStatusCode(200, 'Created');
    	}catch(\Exception $e){
    		return response()->json(['error'=> $e->getMessage()])->setStatusCode(400, 'Forbidden');
    	}
    }

    public function delete($idCustomer){
    	try{
    		$customer = Customers::find($idCustomer);
    		$customer->delete();	
    		return response()->json(["message" => "Cliente eliminado satisfactoriamente!"])->setStatusCode(200, 'Ok');
    	}catch(\Exception $e){
    		return response()->setStatusCode(400, 'Forbidden')->json(['error'=> $e->getMessage()]);
    	}
    }

    private function sanitizeString($value){
    	return filter_var($value, FILTER_SANITIZE_STRING);
    }

}
