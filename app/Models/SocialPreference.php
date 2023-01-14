<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPreference extends Model
{
    use HasFactory;

    protected $casts = [
        'acceptance_level' => 'array',
        'community_member_type' => 'array',
        'professional_interests' => 'array',
        'social_interests' => 'array'
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
