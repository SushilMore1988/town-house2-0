<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Models\CwsListingPayment;
use App\Models\CwsPackage;
use App\Models\Package;
use App\Models\PriceSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Notifications\CwsPackagePurchaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tzsk\Payu\Concerns\Attributes;
use Tzsk\Payu\Concerns\Customer;
use Tzsk\Payu\Concerns\Transaction;
use Srmklive\PayPal\Services\ExpressCheckout;
use Tzsk\Payu\Facades\Payu;
use Razorpay\Api\Api;
use Exception;

class ListingPaymentController extends BaseController
{
	/**
     * @var ExpressCheckout
     */
    protected $provider;
	
	public function __construct(){
		$this->provider = new ExpressCheckout();
	}

	public function payThroughPayUMoney(Request $request){

		$coWorkSpace = Cws::findOrFail($request->coWorkSpaceId);
		$currency_code = 'USD';
	    if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
			$currency_code = 'INR';
	    }
		$package = Package::findOrFail($request->selectedPackageId);
		$package_amount = $package->packageAmounts()->where('currency', strtolower($currency_code))->first();
		$price = $package_amount->amount;
		if($price == 0){
			$coWorkSpacePackage = new CwsPackage;
			$coWorkSpacePackage->cws_id = $request->coWorkSpaceId;
			$coWorkSpacePackage->package_id = $package->id;
			$coWorkSpacePackage->status = 'Success';
			$coWorkSpacePackage->amount = 0;
			$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
			$coWorkSpacePackage->save();
			$paymentData = null;
			$listingPayment = null;
			return view('front.cowork.payment.success', compact('paymentData', 'listingPayment'));
		}

		$listingPayment = new CwsListingPayment;
		$listingPayment->cws_id = $request->coWorkSpaceId;
		$listingPayment->package_id = $package->id;
 		$listingPayment->status = 'pending';
		$listingPayment->payment_for = "package subscription";
		$listingPayment->amount = $price;
		$listingPayment->currency = $currency_code;
		$listingPayment->txnid = $this->txn_no();
		$listingPayment->firstname = $request->name;
		$listingPayment->email = $request->email;
		$listingPayment->phone = $request->phone;
		$listingPayment->dated = date('Y-m-d H:i:s');
		$listingPayment->save();
		$customer = Customer::make()
		->firstName(Auth::user()->fname)
		->phone(Auth::user()->phone)
		->email(Auth::user()->email);
		
        $attributes = Attributes::make()
		->udf1($listingPayment->payment_for);
		
        $transaction = Transaction::make($listingPayment->txnid)
		->charge($listingPayment->amount)
		->for($listingPayment->payment_for)
		->with($attributes)
		->to($customer);
		
		try{
			return Payu::initiate($transaction)->redirect(route('co-work-space.listing-payment.status', [$listingPayment->id]));
		}catch(\Exception $e){
			Log::error($e);
			$paymentData = null;
			return view('front.cowork.payment.failure', compact('paymentData', 'listingPayment'));
		}
	}

	public function payThroughPayPal(Request $request){
		
		$coWorkSpace = Cws::findOrFail($request->coWorkSpaceId);
		$currency_code = 'USD';
	    if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
			$currency_code = 'INR';
	    }
		$package = Package::findOrFail($request->selectedPackageId);
		$package_amount = $package->packageAmounts()->where('currency', strtolower($currency_code))->first();
		$price = $package_amount->amount;
		if($price == 0){
			$coWorkSpacePackage = new CwsPackage;
			$coWorkSpacePackage->cws_id = $request->coWorkSpaceId;
			$coWorkSpacePackage->package_id = $package->id;
			$coWorkSpacePackage->status = 'Success';
			$coWorkSpacePackage->amount = 0;
			$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
			$coWorkSpacePackage->save();
			$paymentData = null;
			$listingPayment = null;
			return view('front.cowork.payment.success', compact('paymentData', 'listingPayment'));
		}

		$listingPayment = new CwsListingPayment;
		$listingPayment->cws_id = $request->coWorkSpaceId;
		$listingPayment->package_id = $package->id;
 		$listingPayment->status = 'pending';
		$listingPayment->payment_for = "package subscription";
		$listingPayment->amount = $price;
		$listingPayment->currency = $currency_code;
		$listingPayment->txnid = $this->txn_no();
		$listingPayment->firstname = $request->name;
		$listingPayment->email = $request->email;
		$listingPayment->phone = $request->phone;
		$listingPayment->dated = date('Y-m-d H:i:s');
		$listingPayment->save();
		
		$data['return_url'] = route('co-work-space.listing-payment.paypal-status', [$listingPayment->id]);

        $data['invoice_id'] = $listingPayment->txnid;
        $data['invoice_description'] = "Order #$listingPayment->id Invoice";
        $data['cancel_url'] = route('co-work-space.listing-payment.paypal-cancel', [$listingPayment->id]);

        $data['items'] = [];

        $get_amount = (int)($request->price);

        array_push($data['items'], [
                'name'  => 'Co-Work Space Package',
                'price' => $price,
                'desc'  => 'Co-Work Space Package Payment of '.$price,
                'qty'   => 1,
            ]);

        $data['total'] = $price;

        $recurring = false;

        try {
            $response = $this->provider->setExpressCheckout($data, $recurring);

            if(!empty($response['paypal_link'])){

                return redirect($response['paypal_link']);
            
            }else{
                $msg = $response['L_LONGMESSAGE0'];
				dd($response);
                return redirect()->route('co-work-space.listing-payment.paypal-failed', [$listingPayment->id]);;
            }
        }catch(\Exception $e){
            dd($e);
            return redirect()->route('co-work-space.listing-payment.paypal-failed', [$listingPayment->id]);;
        }

	}
	
	public function showPayment(Request $request){
		$cws = Cws::findOrFail($request->cws_id);
		$package = Package::findOrFail($request->selectedPackageId);
		// dd($package->packageAmounts()->where('currency', 'inr')->first());
		$priceSetting = PriceSetting::first();
		$terms = Setting::where('name', 'terms')->first();
		return view('front.cowork.payment.subscription',compact('cws', 'package', 'request', 'priceSetting', 'terms'));
	}

	public function payment(Request $request){
		$coWorkSpace = Cws::findOrFail($request->coWorkSpaceId);
		if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
			return $this->payThroughPayUMoney($request);
		}else{
			return $this->payThroughPayPal($request);
		}
		
	}

	public function status(Request $request, CwsListingPayment $cwsListingPayment){
		// dd($cwsListingPayment);
		$transaction = Payu::capture();
		$paymentData = $transaction;
        $cwsListingPayment->payment_info = $transaction->response;

		if($transaction->successful()){ 
            $cwsListingPayment->status = 'Success';
            $cwsListingPayment->save();

			$coWorkSpacePackage = new CwsPackage;
			$coWorkSpacePackage->cws_id = $cwsListingPayment->cws_id;
			$coWorkSpacePackage->package_id = $cwsListingPayment->package_id;
			$coWorkSpacePackage->txnid = $cwsListingPayment->txnid;
			$coWorkSpacePackage->status = $cwsListingPayment->status;
			$coWorkSpacePackage->amount = $cwsListingPayment->amount;
			$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
			$coWorkSpacePackage->save();

            return view('front.cowork.payment.success', compact('paymentData', 'cwsListingPayment'));
        }else{
			$cwsListingPayment->status = 'Failed';
            $cwsListingPayment->save();
			return view('front.cowork.payment.failure', compact('paymentData', 'cwsListingPayment'));
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
	    // $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	    // return substr(str_shuffle($str_result),  
	    //                    0, $length_of_string); 
	}

	public function completeTabPackage(Request $request, $cws)
	{ 
	    $completed_tab = CwsCompletedTab::where('cws_id', $cws)
	                                 ->where('tab_name','package')->first();
	    if($completed_tab){
	        $completed_tab->value = $completed_tab->value ;
	    }
	    else{
	        $completed_tab = new CwsCompletedTab;
	        $completed_tab->cws_id = $cws;
	        $completed_tab->tab_name = 'package';
	        $completed_tab->value = 10;
	    }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
	}

	public function paypalStatus(Request $request){
		$token = $request->get('token');
        
        $PayerID = $request->get('PayerID');
        
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        // dd($response);

        $recurring = false;
        
        $cwsListingPayment = CwsListingPayment::where('txnid', $response['INVNUM'])->first();
		if(!$cwsListingPayment){
			$cwsListingPayment->status = 'Failed';
			$cwsListingPayment->save();
			return view('front.cowork.payment.failure', compact('cwsListingPayment'));
		}

		
        $data = [];

        $data['items'] = [];

        $get_amount = (int)($request->price);

        array_push($data['items'], [
                'name'  => 'Co-Work Space Package',
                'price' => $response['PAYMENTREQUEST_0_AMT'],
                'desc'  => 'Co-Work Space Package Payment of '.$response['PAYMENTREQUEST_0_AMT'],
                'qty'   => 1,
            ]);
        $data['return_url'] = route('co-work-space.listing-payment.paypal-status', [$cwsListingPayment->id]);

        $data['invoice_id'] = $cwsListingPayment->txnid;
        $data['invoice_description'] = $response['PAYMENTREQUEST_0_DESC'];
        $data['cancel_url'] = route('co-work-space.listing-payment.paypal-cancel', [$cwsListingPayment->id]);

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;

        if (in_array(strtoupper($response['ACK']), ['Success', 'SUCCESS', 'SUCCESSWITHWARNING'])) {
			$payment_status = $this->provider->doExpressCheckoutPayment($data, $token, $PayerID);

            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
			if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
                $cwsListingPayment->status = $status;
                $cwsListingPayment->save();

				$coWorkSpacePackage = new CwsPackage;
				$coWorkSpacePackage->cws_id = $cwsListingPayment->cws_id;
				$coWorkSpacePackage->package_id = $cwsListingPayment->package_id;
				$coWorkSpacePackage->txnid = $cwsListingPayment->txnid;
				$coWorkSpacePackage->status = $cwsListingPayment->status;
				$coWorkSpacePackage->amount = $cwsListingPayment->amount;
				$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
				$coWorkSpacePackage->save();

                return view('front.cowork.payment.success', compact('cwsListingPayment'));
            } else {
                $cwsListingPayment->status = $status;
                $cwsListingPayment->save();
                return view('front.cowork.payment.failure', compact('cwsListingPayment'));
            }
		}else{
			$cwsListingPayment->status = 'Failed';
			$cwsListingPayment->save();
			return view('front.cowork.payment.failure', compact('cwsListingPayment'));
		}
	}

	public function paypalCancel(CwsListingPayment $cwsListingPayment){
		$cwsListingPayment->status = 'Cancelled';
        $cwsListingPayment->save();
		return view('front.cowork.payment.failure', compact('cwsListingPayment'));
	}

	public function paypalFailed(CwsListingPayment $cwsListingPayment){
		$cwsListingPayment->status = 'Failed';
        $cwsListingPayment->save();
		return view('front.cowork.payment.failure', compact('cwsListingPayment'));
	}

	public function storeRazorpay(Request $request){

		$input = $request->all();
        
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $cwsListingPayment = CwsListingPayment::findOrFail($request->cwsListingPaymentId);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                if($response->status == 'captured'){
                    $cwsListingPayment->payment_info = $response;
                    $cwsListingPayment->status = 'Success';
                    $cwsListingPayment->save();
					$coWorkSpacePackage = new CwsPackage;
					$coWorkSpacePackage->cws_id = $cwsListingPayment->cws_id;
					$coWorkSpacePackage->package_id = $cwsListingPayment->package_id;
					$coWorkSpacePackage->txnid = $cwsListingPayment->txnid;
					$coWorkSpacePackage->status = $cwsListingPayment->status;
					$coWorkSpacePackage->amount = $cwsListingPayment->amount;
					$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
					$coWorkSpacePackage->save();

					Auth::user()->notify(new CwsPackagePurchaseNotification($coWorkSpacePackage));
					
                    return view('front.cowork.payment.success', compact('cwsListingPayment'));
                }else{
                    $cwsListingPayment->status = 'Failed';
                    $cwsListingPayment->save();
                    return view('front.cowork.payment.failure', compact('cwsListingPayment'));
                }
            } catch (Exception $e) {
                $cwsListingPayment->status = 'Failed';
                    $cwsListingPayment->save();
					return view('front.cowork.payment.failure', compact('cwsListingPayment'));
            }
        }
        $cwsListingPayment->status = 'Failed';
        $cwsListingPayment->save();
        return view('front.cowork.payment.failure', compact('cwsListingPayment'));
	}
}