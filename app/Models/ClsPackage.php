<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClsPackage extends Model
{
    public function cls(){
   		return $this->belongsTo('App\Models\Cls');
   	}

   	public function package(){
   		return $this->belongsTo('App\Models\Package');
   	}
}
