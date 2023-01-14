<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevelopYourProperty extends Model
{
	protected $casts = [        
	    'feedback' => 'array'
	];

    public function developYourPropertyImages(){
    	$this->hasMany('App\Models\DevelopYourPropertyImage');
    }
}
