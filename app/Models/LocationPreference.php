<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationPreference extends Model
{
    use HasFactory;

    protected $casts = [
        'currenct_work_location_1' => 'array',
        'currenct_work_location_2' => 'array',
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function getModeOfCommute()
    {
        switch ($this->mode_of_commute) {
            case 'private-car':
                return 'Private Car / Motorbike';
                break;
            
            default:
                return ucwords(str_replace('-', ' ', $this->mode_of_commute));
                break;
        }
    }
}
