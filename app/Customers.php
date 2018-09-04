<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';

    public function country(){
    	return $this->belongsTo('App\Countries', 'id_country', 'id');
    }

    public function cities(){
    	return $this->belongsTo('App\Cities', 'id_city', 'id');
    }

    public function customertypes(){
    	return $this->belongsTo('App\CustomerTypes', 'id_customer_type', 'id');
    }
    
}
