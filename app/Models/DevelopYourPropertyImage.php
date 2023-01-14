<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevelopYourPropertyImage extends Model
{
    public function developYourProperty(){
    	$this->belongsTo('App\Models\DevelopYourProperty');
    }
}
