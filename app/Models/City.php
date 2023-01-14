<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
	 * City belongs to Country
	 */
    public function country(){
    	return $this->belongsTo('App\Models\Country');
    }

  	/**
	 * City belongs to State
	 */
    public function state(){
    	return $this->belongsTo('App\Models\State');
    }


    public function getCitiesByState($state)
    {
        $cities = [];
        $cities = $state->cities()->pluck('name','id');
        // $cities = $state->cities()->where('name','pune')->pluck('name','id');
        return $cities;
    }

    public function getCitiesByCountry($country)
    {
        $cities = [];
        // $cities = $country->cities()->where('name','pune')->orWhere('name','satara')->pluck('name','id');
        $cities = $country->cities()->pluck('name','id');
        return $cities;
    }
}
