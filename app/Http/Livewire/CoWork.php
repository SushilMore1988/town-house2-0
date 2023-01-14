<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class CoWork extends Component
{

    public $step1 = false, $step2 = false, $step3 = false;

    public $type;

    public $coWorkSpaceName, $country, $state, $city, $userRole = 'Owner';

    public $countries, $states = [], $cities = [];

    public function mount($step)
    {
        if($step == 3){
            $this->step3 = true;
        }elseif($step == 2){
            $this->step2 = true;
        }else{
            $this->step1 = true;
        }

        $this->countries = Country::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.co-work');
    }

    public function setType($type){
        $this->type = $type;
        $this->step1 = false;
        $this->step2 = true;
    }

    public function countryChanged()
    {
        $this->states = State::where('country_id',$this->country)->pluck('name', 'id');
    }

    public function stateChanged()
    {
        $this->cities = City::where('state_id',$this->state)->pluck('name', 'id');
    }

    public function storeInfo()
    {
        $this->validate([
            'coWorkSpaceName' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'userRole' => 'required',
        ],[
            'coWorkSpaceName.required' => 'Enter co-work space name.',
            'country.required' => 'Select co-work space country.',
            'state.required' => 'Select co-work space state.',
            'city.required' => 'Select co-work space city.',
            'userRole.required' => 'Select your role co-work space.',
        ]);
        $this->step2 = false;
        $this->step3 = true;
    }
}
