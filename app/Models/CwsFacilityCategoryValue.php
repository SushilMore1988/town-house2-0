<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsFacilityCategoryValue extends Model
{
    public function cwsFacilityCategory(){
    	return $this->belongsTo('App\Models\CwsFacilityCategory');
    }

    public function coWorkSpaces()
    {
        return $this->belongsToMany('App\Models\Cws','cws_facility_values');
    }

   	public function cwsFacilityOtherValue(){
        return $this->hasOne('App\Models\CwsOtherFacility');
    }

    public function cwsOtherFacility()
    {
        return $this->hasOne('App\Models\CwsOtherFacility');
    }
}
