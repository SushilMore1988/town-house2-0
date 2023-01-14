<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsBooking extends Model
{
    public function cws(){
    	return $this->belongsTo('App\Models\Cws')->withTrashed();
    }

    public function sharedDeskBooking()
    {
        return $this->hasOne('App\Models\CwsBookingSharedDesk');
    }

     public function dedicatedDeskBooking()
    {
        return $this->hasOne('App\Models\CwsDedicatedDeskBooking');
    }

     public function privateOfficeBooking()
    {
        return $this->hasOne('App\Models\CwsBookingPrivateOffice');
    }

    public function meetingRoomBooking()
    {
        return $this->hasOne('App\Models\CwsBookingMeetingRoom');
    }


     public function cwsPayment()
    {
        return $this->hasOne('App\Models\CwsPayment');
    }
    public function user(){
        return $this->belongsTo('App\Models\User')->withTrashed();
    }
}
