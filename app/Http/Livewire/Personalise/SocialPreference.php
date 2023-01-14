<?php

namespace App\Http\Livewire\Personalise;

use App\Models\ProfessionalInterest;
use App\Models\SocialInterest;
use App\Models\SocialPreference as ModelsSocialPreference;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SocialPreference extends Component
{
    public $user, $socialPreference, $professional_interests, $social_interests, $privacy_level, $hygine_level, $community_member_type, $acceptance_level, $lifestyle_balance;
    // public $adventure, $cooking, $design, $architecture, $technology, $entrepreneur, $fashion_design;
    public $list_of_professional_interests;
    public $list_of_social_interests;
    public $pi_array = [];
    public $si_array = [];
    public $social_interest_search = '';
    public $professional_interest_search = '';

    public function mount()
    {
        $this->list_of_professional_interests = ProfessionalInterest::all();
        $this->list_of_social_interests = SocialInterest::all();
        $user = User::with('socialPreference')->findOrFail(Auth::user()->id);
        $this->user = $user;
        $this->socialPreference = $user->socialPreference;
        // dd($user->socialPreference->social_interests);
        
        if(empty($this->socialPreference->professional_interests)){
            // $pi_array = [];
            foreach($this->list_of_professional_interests as $pi){
                // $this->socialPreference->professional_interests[$pi->id] = 0;
                $this->pi_array[$pi->id] = 0;
            }
            $this->professional_interests = $this->pi_array;
        }else{
            $this->professional_interests = $this->socialPreference->professional_interests;
        }

        if(empty($this->socialPreference->social_interests)){
            foreach($this->list_of_social_interests as $pi){
                $this->pi_array[$pi->id] = 0;
            }
            $this->social_interests = $this->pi_array;
        }else{
            $this->social_interests = $this->socialPreference->social_interests;
        }

        if(empty($this->socialPreference->privacy_level)){
            $this->privacy_level = '';
        }else{
            $this->privacy_level = $this->socialPreference->privacy_level;
        }

        if(empty($this->socialPreference->hygine_level)){
            $this->hygine_level = '';
        }else{
            $this->hygine_level = $this->socialPreference->hygine_level;
        }

        if(empty($this->socialPreference->community_member_type)){
            $this->community_member_type = [];
        }else{
            $this->community_member_type = $this->socialPreference->community_member_type;
        }

        if(empty($this->socialPreference->acceptance_level)){
            $this->acceptance_level = [];
        }else{
            $this->acceptance_level = $this->socialPreference->acceptance_level;
        }

        if(empty($this->socialPreference->lifestyle_balance)){
            $this->lifestyle_balance = '';
        }else{
            $this->lifestyle_balance = $this->socialPreference->lifestyle_balance;
        }
    }

    public function render()
    {
        return view('livewire.personalise.social-preference');
    }

    public function update()
    {
        $socialPreference = ModelsSocialPreference::where('user_id', Auth::id())->first();
        if(!$socialPreference){
            $socialPreference = new ModelsSocialPreference();
            $socialPreference->user_id = Auth::id();
        }
        $socialPreference->professional_interests = $this->professional_interests;
        $socialPreference->social_interests = $this->social_interests;
        $socialPreference->privacy_level = $this->privacy_level;
        $socialPreference->hygine_level = $this->hygine_level;
        $socialPreference->community_member_type = $this->community_member_type;
        $socialPreference->acceptance_level = $this->acceptance_level;
        $socialPreference->lifestyle_balance = $this->lifestyle_balance;
        $socialPreference->save();
        $this->emit('alert', ['type' => 'Success', 'message' => 'Social preference updated successfully.']);
    }

    public function changeProfessionalInterests($pi_id, $i)
    {
        $this->user->professionalInterests()->sync([$pi_id => ['rating' => $i]], false);
        // $this->professional_interests[$pi_id] = $i;
        // $this->socialPreference->professional_interests[$pi_id] = $i;
    }

    public function changeSocialInterests($pi_id, $i)
    {
        // $this->social_interests[$pi_id] = $i;
        $this->user->socialInterests()->sync([$pi_id => ['rating' => $i]], false);
    }
}
