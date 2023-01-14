<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function packagePoints(){
    	return $this->hasMany('App\Models\PackagePoint');
    }

    public function cwsPackages(){
        return $this->hasMany('App\Models\CwsPackage');
    }

    public function packageAmounts(){
    	return $this->hasMany('App\Models\PackageAmount');
    }

    public function indianAmount($query){
    	return $this->whereHas('packageAmounts', function($query){
    		$query->where('currency', 'inr');
    	});
    }

    public function otherAmount($query){
    	return $this->whereHas('packageAmounts', function($query){
    		$query->where('currency', 'usd');
    	});
    }
}
