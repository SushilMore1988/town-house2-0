<?php

namespace App\Http\Livewire\THNetwork;

use App\Models\CommunityGroup;
use App\Models\Multiplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $network_type;
    public $th_ids;
    public $th_id;
    public $hdyk;
    public $group_name;
    public $community_index;
    public $showCommunityIndex = false;

    public function mount(CommunityGroup $communityGroup)
    {
        if(empty($communityGroup->id)){
            $this->network_type = 'Individual';
            $this->hdyk = 'friend';
        }else{
            $this->network_type = 'Group';
            $this->hdyk = $communityGroup->hdyk;
            $this->group_name = $communityGroup->name;
            $this->community_index = $communityGroup->rating;
            $this->showCommunityIndex = true;
            foreach($communityGroup->members as $member){
                $member = User::findOrFail($member);
                if(empty($this->th_ids)){
                    $this->th_ids .= $member->unique_name;
                }else{
                    $this->th_ids .= ', '.$member->unique_name;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.t-h-network.create');
    }

    public function show()
    {
        $this->validate([
            'hdyk' => 'required', //how do you know a person (hdyk)
            'th_id' => 'required_if:network_type,Individual',
            'th_ids' => 'required_if:network_type,Group',
        ],[
            'hdyk.required' => 'How do you know the Individual/Community is required field.',
            'th_id.required_if' => 'TH2.0 ID is required field.',
            'th_ids.required_if' => 'TH2.0 ID is required field.',
        ]);
        
        $this->community_index = 0;
        
        $me = User::find(Auth::id());

        if(!$me){
            $this->addError('th_id', 'Please login to check community index.');
            return false;
        }
        
        if($this->network_type == 'Individual'){
            $you = User::where('unique_name', $this->th_id)->first();
            if(!$you){
                $this->addError('th_id', 'This TH2.0 id is invalid.');
                return false;
            }
            
            if(empty($you->personalise) || empty($you->spatialPreference) || empty($you->locationPreference) || empty($you->socialPreference)){
                $this->addError('th_id', 'This User doesn\'t have sufficient data to calculate community index.');
                return false;
            }

            $this->community_index = $this->calculateCommunityIndex($me, $you);
        
        }else{
            $thIds = explode(',', $this->th_ids);
            $members = array();
            $i = 0;
            foreach($thIds as $id){
                $you = User::where('unique_name', trim($id))->first();
                if(!$you){
                    $this->addError('th_ids', 'This TH2.0 id is invalid.');
                    return false;
                }
                if(empty($you->personalise) || empty($you->spatialPreference) || empty($you->locationPreference) || empty($you->socialPreference)){
                    $this->addError('th_ids', 'User '.trim($id).' doesn\'t have sufficient data to calculate community index.');
                    return false;
                }
                $this->community_index += $this->calculateCommunityIndex($me, $you);
                $i++;
                array_push($members, $you->id);
            }
        
            $this->community_index = $this->community_index/$i;

            $community_group = CommunityGroup::where('user_id', Auth::id())->where('name', $this->group_name)->first();
            if(!$community_group){
                $community_group = new CommunityGroup;
            }
            $community_group->user_id = Auth::id();
            $community_group->name = $this->group_name;
            $community_group->members = $members;
            $community_group->hdyk = $this->hdyk;
            $community_group->rating = $this->community_index;
            $community_group->save();
        }
        
        $this->showCommunityIndex = true;

    }

    public function calculateCommunityIndex(User $me, User $you)
    {
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
        //A && B
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
        $community_index += 10;
        
        /**
         * 2.2
         * Provide Preferred Area / Locality
         */
        $community_index += 10;

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
        if($me->socialPreference->privacy_level == $you->socialPreference->privacy_level){
            $community_index += 10;
        }else{
            $community_index += 10;
        }
        /**
         * 4.2
         */
        $community_index += 10;

        /**
         * 4.3
         */
        $community_index += 10;

        /**
         * 4.4
         */
        $community_index += 10;

        /**
         * 4.5
         */
        $community_index += 10;

        /**
         * 4.6
         */
        $community_index += 10;

        /**
         * 4.7
         */
        $community_index += 10;

        // dd($community_index);
        if($community_index >= 0 && $community_index <= 99){
            $community_index = $community_index/10;
        }elseif($community_index >= 100 && $community_index <= 999) {
            $community_index = $community_index/100;
        }elseif($community_index >= 1000 && $community_index <= 9999) {
            $community_index = $community_index/1000;
        }
        return $community_index;
    }

    public function storeGroupName()
    {
        $this->validate([
            'group_name' => 'required|min:2|max:50',
            'th_ids' => 'required'
        ]);

        //First check if user name has been already exists with user
        $community_group = CommunityGroup::where('user_id', Auth::id())->where('name', $this->group_name)->first();
        if(!$community_group){
            $community_group = new CommunityGroup;
        }
        $thIds = explode(',', $this->th_ids);
        $members = array();
        foreach($thIds as $id){
            $you = User::where('unique_name', trim($id))->first();
            if(!$you){
                $this->addError('th_ids', trim($id).' TH2.0 id is invalid.');
                return false;
            }
            if(empty($you->personalise) || empty($you->spatialPreference) || empty($you->locationPreference) || empty($you->socialPreference)){
                $this->addError('th_ids', 'User '.trim($id).' doesn\'t have sufficient data to calculate community index.');
                return false;
            }
            array_push($members, $you->id);
        }
        $community_group->user_id = Auth::id();
        $community_group->name = $this->group_name;
        $community_group->members = $members;
        $community_group->hdyk = $this->hdyk;
        $community_group->is_saved = 1;
        $community_group->save();
        $this->emit('alert', ['type' => 'Success', 'message' => 'Group saved successfully.']);
    }
}
