<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Pricing extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'payment']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Pricing saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.pricing');
    }
}
