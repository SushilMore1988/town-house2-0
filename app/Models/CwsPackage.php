<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsPackage extends Model
{
    public function cws(){
   		return $this->belongsTo('App\Models\Cws')->withTrashed();
   	}

   	public function package(){
   		return $this->belongsTo('App\Models\Package');
   	}
}
