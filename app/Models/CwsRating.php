<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsRating extends Model
{
    public function cwsRatingType(){
        return $this->belongsTo('App\Models\CwsRatingType');
    }

    public function experienceOfCws(){
    	return $this->belongsTo('App\Models\ExperienceOfCws');
    }
}
