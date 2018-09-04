<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    public function country(){
    	return $this->belongsTo('App\Countries', 'id_country', 'id');
    }
}
