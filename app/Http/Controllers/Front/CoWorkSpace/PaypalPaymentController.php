<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsBooking;
use App\Models\CwsBookingMeetingRoom;
use App\Models\CwsBookingPrivateOffice;
use App\Models\CwsBookingSharedDesk;
use App\Models\CwsDedicatedDeskBooking;
use App\Models\CwsPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
// use Payment;
use Srmklive\PayPal\Services\ExpressCheckout;
use Tzsk\Payu\Concerns\Attributes;
use Tzsk\Payu\Concerns\Customer;
use Tzsk\Payu\Concerns\Transaction;
use Tzsk\Payu\Facades\Payu;


class PaypalPaymentController extends BaseController
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
            'bookingId' => 'required'
        ]);

     	if($validator->fails()) {
         	$validator->errors();
            return redirect()->back()->withErrors($validator->errors());
        }
        
		$coWorkSpaceBooking = CwsBooking::findOrFail($request->bookingId);
		$coWorkSpace = Cws::findOrFail($request->coWorkSpaceId);
		Session::put('coWorkSpaceBookingId',$coWorkSpaceBooking->id);

		if(isset($request->is_rebook)) {
			$validator = Validator::make($request->all(), [
	            'bookingDate' => 'required'
	        ]);
         	if($validator->fails()) {
	         	$validator->errors();
	            return redirect()->back()->withErrors($validator->errors());
	        }



	        $oldBookings = CwsBooking::where('cws_id', $coWorkSpaceBooking->cws_id)->where('status', 'Success')->get(); 

	        if($coWorkSpace->size['shared_desk']){
	        	$totalSharedDeskCount = $coWorkSpace->size['shared_desk']['for_listing'];
	        	$totalSharedDeskBookedCount = 0;
	        }

	        if($coWorkSpace->size['dedicated_desk']){
	        	$totalDedicatedDeskCount = $coWorkSpace->size['dedicated_desk']['for_listing'];
	        	$totalDedicatedDeskBookedCount = 0;
	        }


	        foreach($oldBookings as $oldBooking){ 
	        	if($oldBooking){
					if($oldBooking->sharedDeskBooking){
						// if(strtotime($oldBooking->start_date.'+'.$oldBooking->sharedDeskBooking->duration) > strtotime($request->bookingDate)){
						// 	toastr()->error('Shared desk not available on selected date.');  
						// 	return redirect()->back()->withInput();
						// }
						//echo 'INSIDE SHARED ';exit;
						if($coWorkSpaceBooking->sharedDeskBooking->no_of_desk > 0 && strtotime($oldBooking->start_date.'+'.$oldBooking->sharedDeskBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
							$totalSharedDeskBookedCount = $totalSharedDeskBookedCount + $oldBooking->sharedDeskBooking->no_of_desk; 
							$remainingSharedDesk =  $totalSharedDeskCount - $totalSharedDeskBookedCount;
							//dd($request->all());

							if($remainingSharedDesk < $coWorkSpaceBooking->sharedDeskBooking->no_of_desk){
								toastr()->error('Shared desk not available on selected date.');  
								return redirect()->back()->withInput();
							}
						}		        			
					}
					if($oldBooking->dedicatedDeskBooking){
						// if( strtotime($oldBooking->start_date.'+'.$oldBooking->dedicatedDeskBooking->duration) > strtotime($request->bookingDate)){
						// 	toastr()->error('Dedicated desk not available on selected date.');  
						// 	return redirect()->back()->withInput();
						// }
						if($coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk > 0 &&  strtotime($oldBooking->start_date.'+'.$oldBooking->dedicatedDeskBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
							$totalDedicatedDeskBookedCount = $totalDedicatedDeskBookedCount + $oldBooking->dedicatedDeskBooking->no_of_desk;
							$remainingDedicatedDeskCount = $totalDedicatedDeskCount - $totalDedicatedDeskBookedCount;
							if($remainingDedicatedDeskCount < $coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk){
								toastr()->error('Dedicated desk not available on selected date.');  
								return redirect()->back()->withInput();
							}
						}	
					}
					if($oldBooking->privateOfficeBooking){
						// if(strtotime($oldBooking->start_date.'+'.$oldBooking->privateOfficeBooking->duration) > strtotime($request->bookingDate)){
						// 	toastr()->error('Private office not available on selected date.');  
						// 	return redirect()->back()->withInput();
						// }
						if($coWorkSpaceBooking->privateOfficeBooking->office_id != null && strtotime($oldBooking->start_date.'+'.$oldBooking->privateOfficeBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
							if($oldBooking->privateOfficeBooking->office_id == $coWorkSpaceBooking->privateOfficeBooking->office_id){
								toastr()->error('Private office not available on selected date.');  
								return redirect()->back()->withInput();
							}
						}
					}
					if($oldBooking->meetingRoomBooking){
						// if(strtotime($oldBooking->start_date.'+'.$oldBooking->meetingRoomBooking->duration) > strtotime($request->bookingDate)){
						// 	toastr()->error('Meeting room not available on selected date.');  
						// 	return redirect()->back()->withInput();
						// }
						if($coWorkSpaceBooking->meetingRoomBooking->meeting_room_id && strtotime($oldBooking->start_date.'+'.$oldBooking->meetingRoomBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){  
							if($oldBooking->meetingRoomBooking->meeting_room_id == $coWorkSpaceBooking->meetingRoomBooking->meeting_room_id){
								toastr()->error('Meeting room not available on selected date.');
								return redirect()->back()->withInput();
							}
						}
					}
		        }	
	        }

	        $booking = new CwsBooking;
	        $booking->user_id = $coWorkSpaceBooking->user_id;
	        $booking->cws_id =$coWorkSpaceBooking->cws_id; 
	        $booking->start_date = $request->bookingDate;
	        $booking->total = $coWorkSpaceBooking->total;
	        $booking->currency = $coWorkSpaceBooking->currency;
	        $booking->status = "Pending";
	        if($booking->save()){
				Session::put('coWorkSpaceBookingId',$booking->id);
	        	// $data = ['short_subject' => 'Co-Working Space Booking', 'message' => 'Your space '.$booking->cws->name.' has new booking.', 'link' => url('/')];
	        	// $user = User::findOrFail($booking->user_id);
	        	// $user->notify(new BookingNotification($data));

	        	// $data = ['short_subject' => 'Co-Working Space Booking', 'message' => $booking->cws->name.' has new booking.', 'link' => url('/admin/check-booking')];
	        	// $user = Admin::first();
	        	// $user->notify(new BookingNotification($data));

				if($coWorkSpaceBooking->sharedDeskBooking){
					$sharedDesk = new CwsBookingSharedDesk;
					$sharedDesk->cws_booking_id = $booking->id;
					$sharedDesk->no_of_desk = $coWorkSpaceBooking->sharedDeskBooking->no_of_desk;
					$sharedDesk->duration = $coWorkSpaceBooking->sharedDeskBooking->duration;
					$sharedDesk->price = $coWorkSpaceBooking->sharedDeskBooking->price;
					$sharedDesk->save();
				}
				if($coWorkSpaceBooking->dedicatedDeskBooking){
					$dedicatedDesk = new CwsDedicatedDeskBooking;
					$dedicatedDesk->cws_booking_id = $booking->id;
					$dedicatedDesk->no_of_desk = $coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk;
					$dedicatedDesk->duration = $coWorkSpaceBooking->dedicatedDeskBooking->duration;
					$dedicatedDesk->price = $coWorkSpaceBooking->dedicatedDeskBooking->price;
					$dedicatedDesk->save();
				}
				if($coWorkSpaceBooking->privateOfficeBooking){
					$privateOfficeBooking = new CwsBookingPrivateOffice;
					$privateOfficeBooking->cws_booking_id = $booking->id;
					$privateOfficeBooking->duration = $coWorkSpaceBooking->privateOfficeBooking->duration;
					$privateOfficeBooking->office_id = $coWorkSpaceBooking->privateOfficeBooking->office_id;
					$privateOfficeBooking->price = $coWorkSpaceBooking->privateOfficeBooking->price;
					$privateOfficeBooking->save();
				}
				if($coWorkSpaceBooking->meetingRoomBooking){
					$meetingRoomBooking = new CwsBookingMeetingRoom;
					$meetingRoomBooking->cws_booking_id = $booking->id;
					$meetingRoomBooking->duration = $coWorkSpaceBooking->meetingRoomBooking->duration;
					$meetingRoomBooking->meeting_room_id = $coWorkSpaceBooking->meetingRoomBooking->meeting_room_id;
					$meetingRoomBooking->price = $coWorkSpaceBooking->meetingRoomBooking->price;
					$meetingRoomBooking->save();
				}
			}
		}
	        

		$data = [];

		$data['items'] = [];
		
		if($coWorkSpaceBooking->sharedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Shared Desk',
                'price' => $coWorkSpaceBooking->sharedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->sharedDeskBooking->no_of_desk,
			]);
		}

		if($coWorkSpaceBooking->dedicatedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Dedicated Desk',
                'price' => $coWorkSpaceBooking->dedicatedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk,
			]);
		}

		if($coWorkSpaceBooking->privateOfficeBooking){
			array_push($data['items'], [
				'name'  => 'Private Office',
                'price' => $coWorkSpaceBooking->privateOfficeBooking->price,
                'qty'   => 1,
			]);
		}
		if($coWorkSpaceBooking->meetingRoomBooking){
			array_push($data['items'], [
				'name'  => 'Meeting Room',
                'price' => $coWorkSpaceBooking->meetingRoomBooking->price,
                'qty'   => 1,
			]);
		}
		


        $order_id = CwsPayment::all()->count() + 199;
        $data['invoice_id'] = config('paypal.invoice_prefix').'B_'.$order_id;
        
        $coWorkSpacePayment = new CwsPayment;

		if(!empty($request->promo_code)){
			
			$coWorkSpace->promo_code = $request->promo_code;
			$coWorkSpace->promo_code_type = $request->promo_code_type;
			$coWorkSpace->promo_code_discount = $request->promo_code_discount;
			
		}
		

		// $coWorkSpacePayment->cws_booking_id = Session::get('coWorkSpaceBookingId');
		$coWorkSpacePayment->cws_booking_id = $coWorkSpaceBooking->id;
 		$coWorkSpacePayment->status = 'pending';
		$coWorkSpacePayment->payment_for = $request->title;
		$coWorkSpacePayment->amount = $request->price;
		$coWorkSpacePayment->txnid = $data['invoice_id'];
		$coWorkSpacePayment->firstname = Auth::user()->fname.' '.Auth::user()->lname;
		$coWorkSpacePayment->email = Auth::user()->email;
		$coWorkSpacePayment->phone = Auth::user()->phone;
		$coWorkSpacePayment->dated = date('Y-m-d H:i:s');
		if(!empty($request->promo_code)){
			$coWorkSpace->promo_code = $request->promo_code;
			$coWorkSpace->promo_code_type = $request->promo_code_type;
			$coWorkSpace->promo_code_discount = $request->promo_code_discount;
		}
		$coWorkSpacePayment->save();


		if($coWorkSpaceBooking->currency == "INR"){
			
			// $customer = Customer::make()
			// 	->firstName('John')
			// 	->email('john@example.com');

			// // This is entirely optional custom attributes
			// $attributes = Attributes::make()
			// 	->udf1('anything');

			// $transaction = Transaction::make()
			// 	->charge(100)
			// 	->for('Product')
			// 	->with($attributes) // Only when using any custom attributes
			// 	->to($customer);
			
			// return Payu::initiate($transaction)->redirect(route('co-work-space.payu.payment.status'));

			$customer = Customer::make()
			    ->firstName($coWorkSpacePayment->firstname)
			    ->phone($coWorkSpacePayment->phone)
			    ->email($coWorkSpacePayment->email);

			// $attributes = Attributes::make()
			//     ->udf1($request->title)
			//     ->udf2($coWorkSpacePayment->txnid);

			$transaction = Transaction::make($coWorkSpacePayment->txnid)
			    ->charge($request->price)
			    ->for($request->title)
			    // ->with($attributes)
			    ->to($customer);
			/**
			*	TODO - CHECK HERE
			*	REBOOK RETURNS FROM HERE
			*/
			return Payu::initiate($transaction)->redirect(route('co-work-space.payu.payment.status'));
		}else{			
	        try { 
				
		        $data['return_url'] = url('/co-work-space/payment/status');

		        $data['invoice_description'] = "Order #$order_id Invoice";
		        $data['cancel_url'] = url('/co-work-space/payment/cancel');

		        $total = 0;
		        foreach ($data['items'] as $item) {
		            $total += $item['price'] * $item['qty'];
		        }

		        $data['total'] = $total;
		    	
				if($request->promo_code_type == 'Money'){
					$data['shipping_discount'] = $request->promo_code_discount;
				}elseif($request->promo_code_type == 'Percentage'){
					$data['shipping_discount'] = ($total*$request->promo_code_discount)/100;
				}else{
	
				}

				$recurring = false;

		        $response = $this->provider->setCurrency($coWorkSpaceBooking->currency)->setExpressCheckout($data, $recurring);

		        if(empty($response['paypal_link'])){
		        	$msg = $response['L_LONGMESSAGE0'];
					$coWorkSpacePayment->status = 'failed';
					$coWorkSpacePayment->save();
		        	return view('front.cowork.payment.failure', compact('msg'));
		        }
				if(!empty($response['paypal_link'])){
		            return redirect($response['paypal_link']);
		        }
				

	        } catch (\Exception $e) { 
	        	if(isset($coWorkSpacePayment)){
	            	$invoice = $this->createInvoice($coWorkSpacePayment, 'Failed');
	        	}
	            return view('front.cowork.payment.failure');
	            // session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
	        }
		}
	}

	public function paymentCanceled(Request $request){
		$token = $request->get('token');
        
        $PayerID = $request->get('PayerID');
    	
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);
		$coWorkSpacePayment = CwsPayment::where('txnid', $response['INVNUM'])->first();
		$coWorkSpacePayment->status = 'canceled';
		$coWorkSpacePayment->save();
		return view('front.cowork.payment.failure');
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
    	
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        // dd($response);

        $recurring = false;

        $coWorkSpacePayment = CwsPayment::where('txnid', $response['INVNUM'])->first();
        $coWorkSpaceBooking = $coWorkSpacePayment->cwsBooking;
        $data = [];

		$data['items'] = [];
		
		if($coWorkSpaceBooking->sharedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Shared Desk',
                'price' => $coWorkSpaceBooking->sharedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->sharedDeskBooking->no_of_desk,
			]);
		}
		if($coWorkSpaceBooking->dedicatedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Dedicated Desk',
                'price' => $coWorkSpaceBooking->dedicatedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk,
			]);
		}
		if($coWorkSpaceBooking->privateOfficeBooking){
			array_push($data['items'], [
				'name'  => 'Private Office',
                'price' => $coWorkSpaceBooking->privateOfficeBooking->price,
                'qty'   => 1,
			]);
		}
		if($coWorkSpaceBooking->meetingRoomBooking){
			array_push($data['items'], [
				'name'  => 'Meeting Room',
                'price' => $coWorkSpaceBooking->meetingRoomBooking->price,
                'qty'   => 1,
			]);
		}
		$data['return_url'] = url('/co-work-space/payment/status');
        $data['subscription_desc'] = $response['L_NAME0'];
        $data['invoice_id'] = $response['INVNUM'];
        $data['invoice_description'] = $response['DESC'];
        $data['cancel_url'] = url('/co-work-space/payment/cancel');
        $data['total'] = $response['PAYMENTREQUEST_0_AMT'];
        $data['currency'] = $response['CURRENCYCODE'];

        if (in_array(strtoupper($response['ACK']), ['Success', 'SUCCESS', 'SUCCESSWITHWARNING'])) {
			
            $payment_status = $this->provider->setCurrency($data['currency'])->doExpressCheckoutPayment($data, $token, $PayerID);
			
            $status = $payment_status['ACK'];
            
            $coWorkSpacePayment = $this->createInvoice($coWorkSpacePayment, $status);

            if ($coWorkSpacePayment->status == 'Success') {
            	return view('front.cowork.payment.success');
                // session()->put(['code' => 'success', 'message' => "Order $invoice->id has been paid successfully!"]);
            } else {
            	return view('front.cowork.payment.failure');
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
    protected function createInvoice(CwsPayment $coWorkSpacePayment, $status)
    {
    	// dd($status);
    	$cwsBooking = $coWorkSpacePayment->cwsBooking;
    	if (!strcasecmp($status, 'Success') || !strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed') || !strcasecmp($status, 'SuccessWithWarning')) {
    		$coWorkSpacePayment->status = 'Success';
    		$cwsBooking->status = 'Success';
        } else {
            $coWorkSpacePayment->status = 'Failed';
    		$cwsBooking->status = 'Failed';
        }
		$coWorkSpacePayment->save();
    	$cwsBooking->save();
		// dd($coWorkSpacePayment);
        return $coWorkSpacePayment;
    }

	public function status(){  
		// $payment = Payment::capture();
		$payment = Payu::capture();
			
		if($payment){

    		$coWorkSpacePayment = CwsPayment::where('txnid', $payment->response['txnid'])->first();
    		$coWorkSpacePayment->status = $payment->response('status');
    		$coWorkSpacePayment->save();

    		$coWorkSpaceBooking = CwsBooking::where('id', $coWorkSpacePayment->cws_booking_id)->first();
    		$coWorkSpaceBooking->status = $coWorkSpacePayment->status;
    		$coWorkSpaceBooking->save();
			
    		if($payment->response('status') == 'success'){ 
    			return view('front.cowork.payment.success', compact('coWorkSpacePayment'));
    		}else{
    			
    			return view('front.cowork.payment.failure', compact('coWorkSpacePayment'));
    		}
		}
	}

	public function txn_no(){
		$txn_no = $this->random_strings(20);
        if(empty(CwsPayment::where('txnid',$txn_no)->first())){
            return $txn_no;
        }else{
            $this->txn_no();
        }
	}

	public function random_strings($length_of_string){ 
	    // String of all alphanumeric character 
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	    // Shufle the $str_result and returns substring 
	    // of specified length 
	    return substr(str_shuffle($str_result),  
	                       0, $length_of_string); 
	}
}