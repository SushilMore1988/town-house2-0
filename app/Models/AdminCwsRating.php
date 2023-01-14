<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCwsRating extends Model
{
    public function cwsRatingType(){
        return $this->belongsTo('App\Models\CwsRatingType');
    }

    public function cws(){
    	return $this->belongsTo('App\Models\Cws')->withTrashed();
    }
}
