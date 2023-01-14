<?php

namespace App\Http\Livewire\Personalise;

use App\Models\LocationPreference as ModelsLocationPreference;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LocationPreference extends Component
{
    public $user, $locationPreference, $currenct_work_location_1, $currenct_work_location_2, $mode_of_commute, $time_of_daily_commute;

    public $currenct_work_location_array_1, $currenct_work_location_array_2;

    protected $listeners = ['updateShipAddress', 'updateBillAddress'];

    public function mount()
    {
        $user = User::with('locationPreference')->findOrFail(Auth::user()->id);
        $this->user = $user;
        $this->locationPreference = $user->locationPreference;
        if(empty($this->locationPreference->currenct_work_location_1) || empty($this->locationPreference->currenct_work_location_1['formatted_address'])){
            $this->currenct_work_location_1 = "";
        }else{
            $this->currenct_work_location_1 = $this->locationPreference->currenct_work_location_1['formatted_address'];
        }
        
        if(empty($this->locationPreference->currenct_work_location_2) || empty($this->locationPreference->currenct_work_location_2['formatted_address'])){
            $this->currenct_work_location_2 = "";
        }else{
            $this->currenct_work_location_2 = $this->locationPreference->currenct_work_location_2['formatted_address'];
        }
        
        if(empty($this->locationPreference->mode_of_commute)){
            $this->mode_of_commute = "";
        }else{
            $this->mode_of_commute = $this->locationPreference->mode_of_commute;
        }
        
        if(empty($this->locationPreference->time_of_daily_commute)){
            $this->time_of_daily_commute = "";
        }else{
            $this->time_of_daily_commute = $this->locationPreference->time_of_daily_commute;
        }
    }

    public function render()
    {
        return view('livewire.personalise.location-preference');
    }

    public function update()
    {
        $locationPreference = ModelsLocationPreference::where('user_id', Auth::id())->first();
        if(!$locationPreference){
            $locationPreference = new ModelsLocationPreference();
            $locationPreference->user_id = Auth::id();
        }
        $this->currenct_work_location_array_1['formatted_address'] = $this->currenct_work_location_1;
        $this->currenct_work_location_array_2['formatted_address'] = $this->currenct_work_location_2;
        $locationPreference->currenct_work_location_1 = $this->currenct_work_location_array_1;
        $locationPreference->currenct_work_location_2 = $this->currenct_work_location_array_2;
        $locationPreference->mode_of_commute = $this->mode_of_commute;
        $locationPreference->time_of_daily_commute = $this->time_of_daily_commute;
        $locationPreference->save();
        $this->emit('alert', ['type' => 'Success', 'message' => 'Location preference updated successfully.']);
    }

    public function increaseDailyCommute()
    {
        $this->time_of_daily_commute++;
    }

    public function decreaseDailyCommute()
    {
        if($this->time_of_daily_commute > 0){
            $this->time_of_daily_commute--;
        }
    }

    public function updateShipAddress($result)
    {
        $address = [];
        $address['place_id'] = $result[0]['place_id'];
        $address['latitude'] = $result[0]['geometry']['location']['lat'];
        $address['longitude'] = $result[0]['geometry']['location']['lng'];
        $this->currenct_work_location_array_2 = $address;
        $this->currenct_work_location_2 = $result[0]['formatted_address'];
    }

    public function updateBillAddress($result)
    {
        $address = [];
        $address['place_id'] = $result[0]['place_id'];
        $address['latitude'] = $result[0]['geometry']['location']['lat'];
        $address['longitude'] = $result[0]['geometry']['location']['lng'];
        $this->currenct_work_location_array_1 = $address;
        $this->currenct_work_location_1 = $result[0]['formatted_address'];
    }
}
