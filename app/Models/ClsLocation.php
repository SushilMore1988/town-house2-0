<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClsLocation extends Model
{
    public function cls(){
    	return $this->belongsTo('App\Models\Cls');
	}
}
