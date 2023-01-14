<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use App\Models\PriceSetting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pricing extends Component
{
    use LivewireAlert;
    
    public $cws, $size, $submitValue = 'save', $gst, $price_setting, $price, $currency;

    public function mount(Cws $cws)
    {
        $priceSetting = PriceSetting::first();
        $this->cws = $cws;
        $this->gst = $cws->gst;
        $this->size = $cws->size;
        $this->currency = $cws->size['currency'];
        // dd($this->size);
        $this->price_setting = $priceSetting->type;
		$this->price = $priceSetting->price;
        $this->cws = $cws;
        
    }

    public function rules()
    {
        return [
            'size.currency' => 'required',
            'size.service_charges.type' => 'required',
            'size.service_charges.price' => 'required',
            'size.seating_capacity' => 'required',
            'size.size_in_sqft' => 'required',
            'size.service_fee_type' => 'required',
            'size.service_fee' => 'required',
            'size.shared_desk.available' => 'required',
            'size.shared_desk.for_listing' => 'required',
            'size.shared_desk.pricing.1 Day' => 'required',
            'size.shared_desk.pricing.1 Week' => 'required',
            'size.shared_desk.pricing.1 Month' => 'required',
            'size.shared_desk.pricing.3 Months' => 'required',
            'size.shared_desk.pricing.6 Months' => 'required',
            'size.shared_desk.pricing.12 Months' => 'required',
            'size.dedicated_desk.available' => 'required',
            'size.dedicated_desk.for_listing' => 'required',
            'size.dedicated_desk.pricing.1 Day' => 'required',
            'size.dedicated_desk.pricing.1 Week' => 'required',
            'size.dedicated_desk.pricing.1 Month' => 'required',
            'size.dedicated_desk.pricing.3 Months' => 'required',
            'size.dedicated_desk.pricing.6 Months' => 'required',
            'size.dedicated_desk.pricing.12 Months' => 'required',
            'size.private_offices.available' => 'required',
            'size.private_offices.for_listing' => 'required',
            'size.private_offices.types_for_listing' => 'required',
            'size.private_offices.pricing.1 Month' => 'required',
            'size.private_offices.pricing.3 Months' => 'required',
            'size.private_offices.pricing.6 Months' => 'required',
            'size.private_offices.pricing.12 Months' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.co-work.edit.pricing');
    }

    public function store($save)
    {
        $this->cws->gst = $this->gst;
        $this->size['currency'] = $this->currency;
        // dd($this->size);
        $this->cws->size = $this->size;
        $this->cws->save();

        $this->alert('success', 'Co-work space pricing updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'photo');
        }else{
            $this->emit('setCurrentTab', 'pricing');
        }
    }

    public function updatedSizeCurrency($value){
        
    }
}
