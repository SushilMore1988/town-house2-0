<?php

namespace App\Http\Livewire\CoWork;

use App\Models\Cws;
use App\Models\PriceSetting;
use Livewire\Component;

class Pricing extends Component
{
    public $cws, $size, $submitValue = 'save', $gst, $price_setting, $price;

    public function mount(Cws $cws)
    {
        $priceSetting = PriceSetting::first();
        $this->cws = $cws;
        $this->gst = $cws->gst;
        $this->size = $cws->size;
        $this->price_setting = $priceSetting->type;
		$this->price = $priceSetting->price;
        // dd($this->cws->size);
    }

    public function render()
    {
        return view('livewire.co-work.pricing');
    }

    public function store()
    {
        $this->cws->gst = $this->gst;
        $this->cws->size = $this->size;
        $this->cws->save();
    }
}
