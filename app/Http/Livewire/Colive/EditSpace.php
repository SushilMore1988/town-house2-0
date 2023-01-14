<?php

namespace App\Http\Livewire\Colive;

use App\Models\Cls;
use Livewire\Component;

class EditSpace extends Component
{
    public $cls, $activeSection = 'about';

    protected $listeners = ['setActiveSection'];

    public function mount(Cls $cls)
    {
        $this->cls = $cls;
    }

    public function render()
    {
        return view('livewire.colive.edit-space');
    }

    public function setActiveSection($section)
    {
        $this->activeSection = $section;
    }
}
