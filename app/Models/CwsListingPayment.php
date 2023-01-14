<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CwsListingPayment extends Model
{
	protected $casts = [
		'txn_info' => 'array',
		'paypal_sub_info' => 'array',
		'payment_info' => 'array'
	];
    public function cws()
    {
        return $this->belongsTo('App\Models\Cws')->withTrashed();
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
