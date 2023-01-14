<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class OpeningHours extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'conditions']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Check In - Check Out time saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.opening-hours');
    }
}
