<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsBookingSharedDesk extends Model
{
    public function cwsBooking()
    {
        return $this->belongsTo('App\Models\CwsBooking');
    }
}
