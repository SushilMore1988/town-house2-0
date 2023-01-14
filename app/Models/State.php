<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country(){
    	return $this->belongsTo('App\Models\Country');
    }

    public function cities(){
    	return $this->hasMany('App\Models\City');
    }

    public function getStateByCountry($country)
    {
    	$states = [];
    	$states = $country->states()->pluck('name','id');
      	return $states;
    }
}
