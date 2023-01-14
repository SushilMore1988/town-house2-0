<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Photos extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'pricing']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Photos saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.photos');
    }
}
