<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsMaster extends Model
{
    public function cws(){
    	return $this->belongsTo('App\Models\Cws')->withTrashed();
	}
}
