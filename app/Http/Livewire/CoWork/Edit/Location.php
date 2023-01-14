<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Location extends Component
{
    use LivewireAlert;

    protected $listeners = ['updateAddress'];

    public $coWorkSpace;
    public $newAddress;

    public function mount(Cws $cws)
    {
        $this->coWorkSpace = $cws;
    }

    public function rules()
    {
        return [
            'coWorkSpace.address.address' => 'required',
            'coWorkSpace.address.pin_code' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.co-work.edit.location');
    }

    public function updateAddress($result)
    {
        $address = [];
        foreach($result['address_components'] as $component){
            foreach($component['types'] as $key => $value){
                if($value == 'country'){
                    $address['country'] = $component['long_name'];
                }elseif($value == 'administrative_area_level_1'){
                    $address['administrative_area_level_1'] = $component['long_name'];
                }elseif($value == 'administrative_area_level_2'){
                    $address['administrative_area_level_2'] = $component['long_name'];
                }elseif($value == 'locality'){
                    $address['locality'] = $component['long_name'];
                }elseif($value == 'route'){
                    $address['route'] = $component['long_name'];
                }elseif($value == 'street_number'){
                    $address['street_number'] = $component['long_name'];
                }elseif($value == 'postal_code'){
                    $address['pin_code'] = $component['long_name'];
                }
            }
        }
        $address['address'] = $result['formatted_address'];
        $address['place_id'] = $result['place_id'];
        $address['latitude'] = $result['geometry']['location']['lat'];
        $address['longitude'] = $result['geometry']['location']['lng'];
        
        $this->newAddress = $address;
        $this->coWorkSpace->address = $this->newAddress;
    }

    public function save($save)
    {
        $this->coWorkSpace->address = $this->newAddress;
        $this->coWorkSpace->save();
        
        $this->alert('success', 'Co-work space location updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'opening-hours');
        }else{
            $this->emit('setCurrentTab', 'location');
        }
    }
}
