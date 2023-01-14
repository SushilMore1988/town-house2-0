<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'images' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function cws(){
        return $this->hasMany('App\Models\Cws')->withTrashed();
    }
     
     public function cwsBookings(){
        return $this->hasMany('App\Models\CwsBooking');
    }

    public function socialProviders(){
        return $this->hasMany('App\Models\SocialProvider');
    }

    public function personalise()
    {
        return $this->hasOne('App\Models\Personalise');
    }

    public function spatialPreference()
    {
        return $this->hasOne('App\Models\SpatialPreference');
    }

    public function locationPreference()
    {
        return $this->hasOne('App\Models\LocationPreference');
    }

    public function socialPreference()
    {
        return $this->hasOne('App\Models\SocialPreference');
    }

    public function communityGroups()
    {
        return $this->hasMany('App\Models\CommunityGroup');
    }

    public function socialInterests()
    {
        return $this->belongsToMany(SocialInterest::class)->withPivot('rating');
    }

    public function professionalInterests()
    {
        return $this->belongsToMany(ProfessionalInterest::class)->withPivot('rating');
    }
}
