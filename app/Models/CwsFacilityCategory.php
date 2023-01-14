<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsFacilityCategory extends Model
{
    public function cwsFacilityCategoryValues(){
    	return $this->hasMany('App\Models\CwsFacilityCategoryValue');
    }

    
}
