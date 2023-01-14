<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsExperience extends Model
{
    public function cws(){
    	return $this->belongsTo('App\Models\Cws')->withTrashed();
    }

    public function user(){
    	return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function cwsRatings(){
        return $this->hasMany('App\Models\CwsRating', 'experience_of_cws_id');
    }

}
