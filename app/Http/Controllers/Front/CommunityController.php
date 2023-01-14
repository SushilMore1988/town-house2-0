<?php
namespace App\Http\Controllers\Front;

use App\Models\Multiplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends BaseController
{
    public function index()
    {
        return view('front.community.index');
    }

    public function calculateCommunityIndex(Request $request)
    {
        $request->validate([
            'th_id' => 'required',
            'hdyk' => 'required' //how do you know a person (hdyk)
        ]);

        $me = User::findOrFail(Auth::id());
        $you = User::where('unique_name', $request->th_id)->firstOrFail();
        
        $community_index = 0;

        $multiplier = Multiplier::where('sunsign_one', $me->personalise->sunsign)->where('sunsign_two', $you->personalise->sunsign)->first();

        $gm = 0;
        if(!empty($multiplier->multiplier['gm'])){
            $gm = $multiplier->multiplier['gm'];
        }
        
        $n = 0;
        if(!empty($multiplier->multiplier['n'])){
            $n = $multiplier->multiplier['n'];
        }

        $ap = 0;
        if(!empty($multiplier->multiplier['ap'])){
            $ap = $multiplier->multiplier['ap'];
        }

        $mv = 0;
        if(!empty($multiplier->multiplier['mv'])){
            $mv = $multiplier->multiplier['mv'];
        }

        $pg = 0;
        if(!empty($multiplier->multiplier['pg'])){
            $pg = $multiplier->multiplier['pg'];
        }

        $sg = 0;
        if(!empty($multiplier->multiplier['sg'])){
            $sg = $multiplier->multiplier['sg'];
        }
        
        $g = 0;
        if(!empty($multiplier->multiplier['g'])){
            $g = $multiplier->multiplier['g'];
        }

        /**
         * 1.1
         * Date of Birth
         */
        if($gm < 0.35 || !empty($n)){
            $community_index += (10 - (10 * $gm));
        }else{
            $community_index += (10 + (10 * $gm));
        }

        /**
         * 1.2
         * Gender
         */
        //A
        if($me->gender != $you->gender){
            $community_index += 10;
            $search_gender = $you->gender == 'Male' ? 'Single Women' : 'Single Men';
            if(in_array($search_gender, $me->personalise->community_member_type)){
                $community_index += (10 + (10 * 1.2));
            }
        }else{
            $community_index += (10 + (10 * 1.5));
        }

        /**
         * 1.3
         * Profession
         */
         if($me->profession == $you->profession){
             $community_index += 10;
         }else{
             if(!empty($multiplier->pg)){
                 $community_index += (10 + (10 * 0.5));
             }
         }

        /**
         * 1.4
         * Marital Status
         */
         if($me->personalise->marital_status == $you->personalise->marital_status){
             $community_index += 10;
         }else{
             $community_index += (10 - (10 * 1.2));
         }
         //Point c is remaining

        /**
         * 1.5
         * Country, City
         */
        if($me->personalise->current_location == $you->personalise->current_location){
            $community_index += (10 - (10 * 1.2));
        }else{
            $community_index += 10;
        }
        /**
         * 1.6
         * Hometown
         */
        if($me->personalise->hometown == $you->personalise->hometown){
            $community_index += (10 - (10 * 1.2));
        }else{
            $community_index += 10;
        }
        /**
         * 2.1
         * Provide Work / Organisation / Institute / daily Commute Location
         */

        /**
         * 2.2
         * Provide Preferred Area / Locality
         */

        /**
         * 2.3
         * Preferred Mode of Commute
         */
        if($me->locationPreference == $you->locationPreference){
            $community_index += (10 + ( 10 * 1.2));
        }else{
            $community_index += 10;
        }

        /**
         * 2.4
         * Preferred Time of Daily Commute (One Way)
         */
        $community_index += 10;

        /**
         * 3.1
         * Space Matrix
         */
        $community_index += 10;

        /**
         * 3.2
         * Space Sharing
         */
        $community_index += 10;

        /**
         * 3.3
         * Maximum Community Members
         */
        $community_index += 10;

        /**
         * 4.1
         * Privacy Level
         */

        /**
         * 4.2
         */
        /**
         * 4.3
         */
        /**
         * 4.4
         */
        /**
         * 4.5
         */
        /**
         * 4.6
         */
        /**
         * 4.7
         */
        dd($community_index);
    }
}