<?php

namespace App\Http\Livewire\Colive;

use App\Models\Cls;
use App\Models\ClsAmenityCategory;
use Livewire\Component;

class Amenities extends Component
{
    public $cls, $clsAmenityCategories, $amenities = [], $submitValue = 'save';

    public function addAmenities()
    {
        $this->cls->amenities = $this->amenities;
        $this->cls->save();

        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'accomodation']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Amenities saved successfully.']);

    }

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function mount(Cls $cls)
    {
        $this->cls = $cls;
        $this->clsAmenityCategories = ClsAmenityCategory::all();
        if(!empty($this->cls->amenities)){
            $this->amenities = $this->cls->amenities;
        }
    }

    public function render()
    {
        return view('livewire.colive.amenities');
    }
}
