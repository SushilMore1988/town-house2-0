<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PersonaliseController extends BaseController
{
    public function create()
    {
        $warningMsg = null;
        if(Session::has('errorMsg')){
            $warningMsg = Session::get('errorMsg');
        }
        $user = User::with('personalise')->findOrFail(Auth::user()->id);

        $gi_per = 0;
        if(!empty($user->fname)){
            $gi_per += 9.09;
        }
        if(!empty($user->lname)){
            $gi_per += 9.09;
        }
        if(!empty($user->unique_name)){
            $gi_per += 9.09;
        }
        if(!empty($user->email)){
            $gi_per += 9.09;
        }
        if(!empty($user->phone)){
            $gi_per += 9.09;
        }
        if(!empty($user->gender)){
            $gi_per += 9.09;
        }
        if(!empty($user->dob)){
            $gi_per += 9.09;
        }
        if(!empty($user->personalise->profession)){
            $gi_per += 9.09;
        }
        if(!empty($user->personalise->marital_status)){
            $gi_per += 9.09;
        }
        if(!empty($user->personalise->current_location)){
            $gi_per += 9.09;
        }
        if(!empty($user->personalise->hometown)){
            $gi_per += 9.10;
        }

        $lp_per = 0;
        if(!empty($user->locationPreference->currenct_work_location_1)){
            $lp_per += 25;
        }
        
        if(!empty($user->locationPreference->currenct_work_location_2)){
            $lp_per += 25;
        }
        
        if(!empty($user->locationPreference->mode_of_commute)){
            $lp_per += 25;
        }
        
        if(!empty($user->locationPreference->time_of_daily_commute)){
            $lp_per += 25;
        }
        
        $sp_per = 0;
        if(!empty($user->spatialPreference->liv)){
            $sp_per += 14.28;
        }
        
        if(!empty($user->spatialPreference->kit)){
            $sp_per += 14.28;
        }
        
        if(!empty($user->spatialPreference->din)){
            $sp_per += 14.28;
        }
        
        if(!empty($user->spatialPreference->bed)){
            $sp_per += 14.28;
        }

        if(!empty($user->spatialPreference->toi)){
            $sp_per += 14.28;
        }

        if(!empty($user->spatialPreference->share_liv) || !empty($user->spatialPreference->share_kit) || !empty($user->spatialPreference->share_din) || !empty($user->spatialPreference->share_bed) || !empty($user->spatialPreference->share_toi) || !empty($user->spatialPreference->max_members)){
            $sp_per += 14.28;
        }

        if(!empty($user->spatialPreference->max_members)){
            $sp_per += 14.32;
        }

        $sop_per = 0;
        if(!empty($user->socialPreference->professional_interests)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->social_interests)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->privacy_level)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->hygine_level)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->community_member_type)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->acceptance_level)){
            $sop_per += 14.28;
        }

        if(!empty($user->socialPreference->lifestyle_balance)){
            $sop_per += 14.32;
        }

        return view('front.personalise.create', compact('gi_per', 'lp_per', 'sp_per', 'sop_per', 'warningMsg'));
    }
}