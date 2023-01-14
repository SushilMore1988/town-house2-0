<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Location extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'opening-hours']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Location saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.location');
    }
}
