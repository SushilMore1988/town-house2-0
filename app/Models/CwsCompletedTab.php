<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsCompletedTab extends Model
{
    public function cws(){
    	return $this->belongsTo('App\Models\Cws')->withTrashed();
	}
}
