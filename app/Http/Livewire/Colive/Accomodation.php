<?php

namespace App\Http\Livewire\Colive;

use Livewire\Component;
use App\Models\Cls;

class Accomodation extends Component
{
    public $submitValue = 'save';

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function addAccomodations()
    {
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'location']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Accomodations saved successfully.']);
    }

    public function mount(Cls $cls)
    {
        $this->cls = $cls;
    }

    public function render()
    {
        return view('livewire.colive.accomodation');
    }
}
