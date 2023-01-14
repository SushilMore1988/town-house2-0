<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Cws extends Model implements Viewable
{
    use InteractsWithViews, SoftDeletes;
    protected $fillable = [ 'email_verified', 'facilities', 'opening_hours' ];
    protected $casts = [        
        'contact_details' => 'array',
        'address' => 'array',
        'size' => 'array',
        'facilities' => 'array',
        'opening_hours' => 'array',
        'images' => 'array',
        'subscription_info' => 'array'
    ];
    
    public static function boot()
    {
        parent::boot();
        try {
            $lastId = Cws::latest()->first()->id + 1;
        } catch (\Throwable $th) {
            $lastId = 1;
        }
        static::saving(function ($model) use($lastId) {
            if(empty($model->slug)){
                $model->slug = Str::slug($model->name).'-'.$lastId;
            }
        });
    }

    public function completedTab(){
        return $this->hasOne('App\Models\CwsCompletedTab');
    }

    public function user(){
         return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function cwsPackage()
    {
        return $this->hasOne('App\Models\CwsPackage');
    }

    public function cwsPackages()
    {
        return $this->hasMany('App\Models\CwsPackage');
    }

    public function cwsMaster()
    {
        return $this->hasOne('App\Models\CwsMaster');
    }

    public function adminCwsRatings(){
        return $this->hasMany('App\Models\AdminCwsRating');
    }

    public function experienceOfCoWorkSpaces(){
        return $this->hasMany('App\Models\CwsExperience');
    }

    public function cwsBookings(){
        return $this->hasMany('App\Models\CwsBooking');
    }

     public function listingPayments()
    {
        return $this->hasMany('App\Models\CwsListingPayment');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function getIsPricingSetAttribute(){
        if(!empty($this->size)){
            //Check if shared desk has any pricing
            if(!empty($this->size['shared_desk']) && $this->size['shared_desk']['for_listing'] > 0){
                foreach($this->size['shared_desk']['pricing'] as $key => $price){
                    if(!empty($price) && $price > 0){
                        return true;
                    }
                }
            }
            //Check if dedicated desk has any pricing
            if(!empty($this->size['dedicated_desk']) && $this->size['dedicated_desk']['for_listing'] > 0){
                foreach($this->size['dedicated_desk']['pricing'] as $key => $price){
                    if(!empty($price) && $price > 0){
                        return true;
                    }
                }
            }
            //Check if private offices has any pricing
            if(!empty($this->size['private_offices']) && $this->size['private_offices']['for_listing'] > 0){
                foreach($this->size['private_offices']['private_offices'] as $k => $privateOffice){
                    foreach($privateOffice['pricing'] as $key => $price){
                        if(!empty($price) && $price > 0){
                            return true;
                        }
                    }
                }
            }
            //Check if private offices has any pricing
            if(!empty($this->size['meeting_rooms']) && $this->size['meeting_rooms']['for_listing'] > 0){
                foreach($this->size['meeting_rooms']['meeting_rooms'] as $k => $meetingRoom){
                    foreach($meetingRoom['pricing'] as $key => $price){
                        if(!empty($price) && $price > 0){
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
