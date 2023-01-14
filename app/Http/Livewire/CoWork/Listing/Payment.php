<?php

namespace App\Http\Livewire\CoWork\Listing;

use App\Models\Cws;
use App\Models\CwsListingPayment;
use App\Models\Package;
use App\Models\PriceSetting;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Payment extends Component
{
    public $cws, $priceSetting, $terms, $package;

    public function mount(Cws $cws, $selectedPackageId)
    {
        $this->cws = $cws;
        $this->priceSetting = PriceSetting::first();
        $this->terms = Setting::where('name', 'terms')->first();
        $this->package = Package::findOrFail($selectedPackageId);
    }

    public function render()
    {
        return view('livewire.co-work.listing.payment');
    }

    public function makePayment()
    {
        $user = Auth::user();
        $listingPayment = new CwsListingPayment();
		$listingPayment->cws_id = $this->cws->id;
		$listingPayment->package_id = $this->package->id;
 		$listingPayment->status = 'pending';
		$listingPayment->payment_for = "package subscription";
		$listingPayment->amount = $this->package->packageAmounts()->where('currency', 'inr')->first()->amount;
		$listingPayment->currency = 'INR';
		$listingPayment->txnid = $this->txn_no();
		$listingPayment->firstname = $user->fname;
		$listingPayment->email = $user->email;
		$listingPayment->phone = $user->phone;
		$listingPayment->dated = date('Y-m-d H:i:s');
		if($listingPayment->save()){
            $this->dispatchBrowserEvent('payUsingRazorPay', ['listingPayment' => $listingPayment]);
        }
    }

    public function txn_no(){
		$txn_no = $this->random_strings(20);
        if(empty(CwsListingPayment::where('txnid',$txn_no)->first())){
            return $txn_no;
        }else{
            $this->txn_no();
        }
	}

    public function random_strings($length_of_string){ 
		return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, $length_of_string);
	}
}
