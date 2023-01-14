<?php

namespace App\Http\Livewire\Colive;

use App\Models\Cls;
use Livewire\Component;

class Conditions extends Component
{
    public $cls;
    public $conditions = [];
    public $submitValue = 'save';
    public $guest_allowed = null;
    public $pets_allowed = null;
    public $parties_allowed = null;

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }

    public function store()
    {
        $this->cls->conditions = [
                                    'guest_allowed' => $this->guest_allowed,
                                    'pets_allowed' => $this->pets_allowed,
                                    'parties_allowed' => $this->parties_allowed
                                ];
        $this->cls->save();

        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'photos']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Conditions saved successfully.']);
    }

    public function mount(Cls $cls)
    {
        $this->cls = $cls;
        if(!empty($cls->conditions)){
            $this->guest_allowed = $cls->conditions['guest_allowed'];
            $this->pets_allowed = $cls->conditions['pets_allowed'];
            $this->parties_allowed = $cls->conditions['parties_allowed'];
        }
    }

    public function render()
    {
        return view('livewire.colive.conditions');
    }
}
