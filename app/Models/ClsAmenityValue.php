<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClsAmenityValue extends Model
{
    public function clsAmenityCategory(){
    	return $this->belongsTo('App\Models\ClsAmenityCategory');
    }
}
