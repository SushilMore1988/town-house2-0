<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClsAmenityCategory extends Model
{
    public function clsAmenityValues(){
    	return $this->hasMany('App\Models\ClsAmenityValue');
    }
}
