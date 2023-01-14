<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClsCheckInCheckOut extends Model
{
    public function cls(){
    	return $this->belongsTo('App\Models\Cls');
    }
}
