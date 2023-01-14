<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsRatingType extends Model
{
    public function cwsRatings(){
        return $this->hasMany('App\Models\CwsRating');
    }
}
