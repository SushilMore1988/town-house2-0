<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Models\CwsListingPayment;
use App\Models\CwsPackage;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Validator;

class ListingPaypalPaymentController extends BaseController
{
	/**
     * @var ExpressCheckout
     */
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

	public function payment(Request $request){
		$validator = Validator::make($request->all(), [
            'cws_id' => 'required',
            'selectedPackageId' => 'required'
        ]);
        if($validator->fails()) {
            $validator->errors();
            toastr()->error('Please select package for your co-work space.', 'Subscription Package');
            return redirect()->back()->withErrors($validator->errors());
        }        

		$package = Package::findOrFail($request->selectedPackageId);

        $coWorkSpace = Cws::findOrFail($request->cws_id);
		
        $currency_code = 'USD';
        if(strtolower(trim($coWorkSpace->country->name)) == 'india'){
            $currency_code = 'INR';
        }
        $package_amount = $package->packageAmounts()->where('currency', strtolower($currency_code))->first();
        $price = $package_amount->amount;

        $recurring = true;

        // $cart = $this->getCheckoutData($recurring);
        $order_id = CwsListingPayment::all()->count() + 1;

        $data['items'] = [
            [
                'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                'price' => $price,
                'qty'   => 1,
            ],
        ];

        $data['return_url'] = url('/co-work-space/listing-paypal-payment-status?mode=recurring');
        $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id;

        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = url('/co-work-space/listing-paypal-payment-canceled');
        $data['total'] = $price;

        try {
            // dd($this->provider);
            $response = $this->provider->setCurrency($currency_code)->setExpressCheckout($data, $recurring);
            // dd($response);
            $listingPayment = new CwsListingPayment;
			$listingPayment->cws_id = $request->coWorkSpaceId;
			$listingPayment->package_id = $package->id;
	 		$listingPayment->status = 'pending';
			$listingPayment->payment_for = "package subscription";
			$listingPayment->amount = $data['total'];
			$listingPayment->currency = $currency_code;
			$listingPayment->txnid = config('paypal.invoice_prefix').'_'.$order_id;
			$listingPayment->firstname = $request->name;
			$listingPayment->email = $request->email;
			$listingPayment->phone = $request->phone;
			$listingPayment->dated = date('Y-m-d H:i:s');
			$listingPayment->save();

            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            $invoice = $this->createInvoice($listingPayment, 'Failed');
            // session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
            return view('front.cowork.listing-payment.failed');
        }
	}

	public function paymentCanceled(Request $request){
		return view('front.cowork.listing-payment.failed');
	}

	/**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paymentStatus(Request $request)
    {
        $token = $request->get('token');
        
        $PayerID = $request->get('PayerID');
    	// dd($request->all());
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        // dd($response);

        $recurring = ($request->get('mode') === 'recurring') ? true : false;

        $listingPayment = CwsListingPayment::where('txnid', $response['INVNUM'])->first();
        if(!$listingPayment){
            abort(404);
        }
        $listingPayment->txn_info = $response;
        $listingPayment->save();


        $data['items'] = [
            [
                'name'  => $response['L_NAME0'],
                'price' => $response['PAYMENTREQUEST_0_ITEMAMT'],
                'qty'   => $response['L_QTY0'],
            ],
        ];

        $data['return_url'] = url('/co-work-space/listing-paypal-payment-status?mode=recurring');
        $data['subscription_desc'] = $response['L_NAME0'];

        $data['invoice_id'] = $response['INVNUM'];
        $data['invoice_description'] = $response['DESC'];
        $data['cancel_url'] = url('/co-work-space/listing-paypal-payment-canceled');
        $data['total'] = $response['PAYMENTREQUEST_0_AMT'];


        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $subResponse = $this->provider->createMonthlySubscription($response['TOKEN'], $data['total'], $data['subscription_desc']);
            // dd($subResponse);
            $listingPayment->paypal_sub_info = $subResponse;
            $listingPayment->save();
            if (!empty($subResponse['PROFILESTATUS']) && in_array($subResponse['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                $status = 'Processed';
            } else {
                $status = 'Invalid';
            }
            
            $listingPayment = $this->createInvoice($listingPayment, $status);

            if ($listingPayment->status == 'Success') {
                $this->completeTabPackage($request, $listingPayment->cws_id);

                $this->sendInvoice($listingPayment);

            	return view('front.cowork.listing-payment.success');
                // session()->put(['code' => 'success', 'message' => "Order $invoice->id has been paid successfully!"]);
            } else {
            	return view('front.cowork.listing-payment.failed');
                // session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
            }

            // return redirect('/');
        }
    }

    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice(CwsListingPayment $listingPayment, $status)
    {
    	if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
    		$listingPayment->status = 'Success';
	        $coWorkSpacePackage = new CwsPackage;
			$coWorkSpacePackage->cws_id = $listingPayment->cws_id;
			$coWorkSpacePackage->package_id = $listingPayment->package_id;
			$coWorkSpacePackage->txnid = $listingPayment->txnid;
			$coWorkSpacePackage->status = $listingPayment->status;
			$coWorkSpacePackage->amount = $listingPayment->amount;
			$coWorkSpacePackage->dated = date('Y-m-d H:i:s');
			$coWorkSpacePackage->save();
        } else {
            $listingPayment->status = 'Failed';
        }

		$listingPayment->save();
        return $listingPayment;
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
            $completed_tab->value = 20;
        }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
    }

    public function sendInvoice(CwsListingPayment $cwsListingPayment)
    {
        if($cwsListingPayment->status == 'Success'){
            $data = array();
            $data['name'] = $cwsListingPayment->cws->user->fname.' '.$cwsListingPayment->cws->user->lname;
            $data['email'] = $cwsListingPayment->cws->user->email;
            $data['phone'] = $cwsListingPayment->cws->user->phone;
            $data['date'] = date('d.m.Y', strtotime($cwsListingPayment->created_at));
            $data['billing_address'] = $cwsListingPayment->cws->address['address'].' '.$cwsListingPayment->cws->address['pin_code'];
            $data['mode_of_payment'] = '';
            $data['payment_for'] = 'MONTHLY SUBSCRIPTION';
            $data['package_name'] = '<strong>Package :</strong> '.$cwsListingPayment->package->package_name;
            $data['package_amount'] = $cwsListingPayment->amount;
            $data['package_currency'] = $cwsListingPayment->package->sign;
            $data['txnid'] = $cwsListingPayment->txnid;
            
            return view('email.listing-invoice-data')->with(['data' => $data]);

            Mail::send(['html'=>'email.listing-invoice'], $data, function($message) use($data){
                $message->to($data['email'], $data['name'])->subject('Co-working Space Montly Subscription Payment Invoice');
                $message->from('noreply@th2-0.com');
            });
        }
    }

    public function storeRazorPayPayment()
    {
        
    }
}