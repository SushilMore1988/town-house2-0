<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;

class Payment extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function store()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'marketing']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Payment saved successfully.']);
    }

    public function render()
    {
        return view('livewire.colive.payment');
    }
}
