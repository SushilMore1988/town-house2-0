<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CommunityGroup extends Model
{
    use HasFactory;

    protected $casts = [
        'members' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getMemberNamesAttribute()
    {
        $names = [];
        foreach($this->members as $member){
            $user = User::find($member);
            if($user){
                array_push($names, $user->fname);
            }
        }
        return implode(' | ', $names);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if(isset($this->attributes['id'])){
            $this->attributes['slug'] = Str::slug($value, '-').'-'.$this->attributes['id'];
        }else{
            $id = CommunityGroup::max('id')+1;
            $this->attributes['slug'] = Str::slug($value, '-').'-'.$id;
        }
    }
}
