<?php

namespace App\Http\Livewire\CoWork;

use App\Models\Cws;
use App\Models\PriceSetting;
use App\Models\Setting;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners = ['setCurrentTab' => 'setCurrentTab'];

    public $current_tab = 'about';

    public $coWorkSpace;

    public $priceSetting, $terms;

    public function mount(Cws $cws)
    {
        $this->coWorkSpace = $cws;
        $this->priceSetting = PriceSetting::first();
        $this->terms = Setting::where('name', 'terms')->first();
    }
    public function render()
    {
        return view('livewire.co-work.edit');
    }

    public function setCurrentTab($tab){
        $this->current_tab = $tab;
    }
}
