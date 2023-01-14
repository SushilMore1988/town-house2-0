<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpatialPreference extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function getSharing()
    {
        $share = '';
        if($this->share_liv == 1){
            if(empty($share)){
                $share .= 'Living';
            }else{
                $share .= ', Living';
            }
        }
        if($this->share_kit == 1){
            if(empty($share)){
                $share .= 'Kitchen';
            }else{
                $share .= ', Kitchen';
            }
        }
        if($this->share_din == 1){
            if(empty($share)){
                $share .= 'Dining';
            }else{
                $share .= ', Dining';
            }
        }
        if($this->share_bed == 1){
            if(empty($share)){
                $share .= 'Bedroom';
            }else{
                $share .= ', Bedroom';
            }
        }
        if($this->share_toi == 1){
            if(empty($share)){
                $share .= 'Toilet';
            }else{
                $share .= ', Toilet';
            }
        }
        return $share;
    }
}
