<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
	    'id' => 'string',
        'data' => 'array',
    ];
}
