<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Subscription extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'terms']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Subscription saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.subscription');
    }
}
