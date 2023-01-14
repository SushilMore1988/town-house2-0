<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cls extends Model
{
    protected $casts = [        
        'about_your_space' => 'array',
        'amenities' => 'array',
        'accomodation' => 'array',
        'location' => 'array',
        'check_in_out_time' => 'array',
        'conditions' => 'array',
        'photos' => 'array',
        'pricing' => 'array',
        'payment' => 'array',
        'marketing' => 'array',
        'subscription' => 'array',
        'terms_and_conditions' => 'array',
    ];

    public function clsValues()
    {
        return $this->hasMany('App\Models\ClsValue');
    }

     public function clsLocation()
    {
        return $this->hasOne('App\Models\ClsLocation');
    }

     public function clsPackage()
    {
        return $this->hasMany('App\Models\ClsPackage');
    }

    public function clsCheckInCheckOut(){
        return $this->hasMany('App\Models\ClsCheckInCheckOut');
    }
}
