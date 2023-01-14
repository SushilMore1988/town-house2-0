<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Terms extends Component
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
        $this->emit('alert', ['type' => 'Success', 'message' => 'Terms adn conditions accepted successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.terms');
    }
}
