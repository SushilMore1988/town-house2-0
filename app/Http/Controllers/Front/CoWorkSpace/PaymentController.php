<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Admin;
use App\Models\CwsBooking;
use App\Models\CwsBookingMeetingRoom;
use App\Models\CwsBookingPrivateOffice;
use App\Models\CwsBookingSharedDesk;
use App\Models\CwsDedicatedDeskBooking;
use App\Models\CwsPayment;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Payment;

class PaymentController extends BaseController
{
	public function payment(Request $request){
		// echo 'IN'; exit;
		$coWorkSpaceBooking = CwsBooking::findOrFail($request->bookingId);
		Session::put('coWorkSpaceBookingId',$coWorkSpaceBooking->id);


		if(isset($request->is_rebook)){
			$validator = Validator::make($request->all(), [
	            'bookingId' => 'required',
	            'bookingDate' => 'required'
	        ]);
	         if ($validator->fails()) {
	         	$validator->errors();
	            return redirect()->back()->withErrors($validator->errors());
	        }
	        $oldBookings = CwsBooking::where('cws_id', $coWorkSpaceBooking->cws_id)->get(); 
	        foreach($oldBookings as $oldBooking){ 
	        	if($oldBooking){
		        	if(strtotime($oldBooking->start_date) == strtotime($request->bookingDate)){
		        		toastr()->error('Cowork space not  available on selected date.');  
		        		return redirect()->back()->withInput();	
		        	} else{
		        		if($oldBooking->sharedDeskBooking){
		        			if(strtotime($oldBooking->start_date.'+'.$oldBooking->sharedDeskBooking->duration) > strtotime($request->bookingDate)){
			        			toastr()->error('Shared desk not available on selected date.');  
			        			return redirect()->back()->withInput();
		        			}
		        		}
		        		if($oldBooking->dedicatedDeskBooking){
		        			if( strtotime($oldBooking->start_date.'+'.$oldBooking->dedicatedDeskBooking->duration) > strtotime($request->bookingDate)){
			        			toastr()->error('Dedicated desk not available on selected date.');  
			        			return redirect()->back()->withInput();
		        			}	
		        		}
		        		if($oldBooking->privateOfficeBooking){
		        			if(strtotime($oldBooking->start_date.'+'.$oldBooking->privateOfficeBooking->duration) > strtotime($request->bookingDate)){
			        			toastr()->error('Private office not available on selected date.');  
			        			return redirect()->back()->withInput();
		        			}
		        		}
		        		if($oldBooking->meetingRoomBooking){
		        			if(strtotime($oldBooking->start_date.'+'.$oldBooking->meetingRoomBooking->duration) > strtotime($request->bookingDate)){
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
	        	$data = ['short_subject' => 'Co-Working Space Booking', 'message' => 'Your space '.$booking->cws->name.' has new booking.', 'link' => url('/')];
	        	$user = User::findOrFail($booking->user_id);
	        	$user->notify(new BookingNotification($data));

	        	$data = ['short_subject' => 'Co-Working Space Booking', 'message' => $booking->cws->name.' has new booking.', 'link' => url('/admin/check-booking')];
	        	$user = Admin::first();
	        	$user->notify(new BookingNotification($data));

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

		$coWorkSpacePayment = new CwsPayment;
		// $coWorkSpacePayment->cws_booking_id = Session::get('coWorkSpaceBookingId');
		$coWorkSpacePayment->cws_booking_id = $coWorkSpaceBooking->id;
 		$coWorkSpacePayment->status = 'pending';
		$coWorkSpacePayment->payment_for = $request->title;
		$coWorkSpacePayment->amount = $request->price;
		$coWorkSpacePayment->txnid = $this->txn_no();
		$coWorkSpacePayment->firstname = Auth::user()->fname.' '.Auth::user()->lname;
		$coWorkSpacePayment->email = Auth::user()->email;
		$coWorkSpacePayment->phone = Auth::user()->phone;
		$coWorkSpacePayment->dated = date('Y-m-d H:i:s');
		$coWorkSpacePayment->save();

		
		
		$attributes = [
    		'txnid' => $coWorkSpacePayment->txnid, # Transaction ID.
		    'amount' => $request->price, # Amount to be charged.
		    'productinfo' => $request->title,
		    'firstname' => $coWorkSpacePayment->firstname , # Payee Name.
		    'email' => $coWorkSpacePayment->email, # Payee Email Address.
		    'phone' => $coWorkSpacePayment->phone, # Payee Phone Number.
		];

		Session::put('coWorkSpacePaymentId',$coWorkSpacePayment->id);

		return Payment::make($attributes, function ($then) {
		    $then->redirectRoute('co-work-space.payment.status');
		});
	}

	public function status(){
		$payment = Payment::capture();

    	$payment->isCaptured();

		$paymentData = $payment->getData();

		$coWorkSpacePayment =  CwsPayment::findOrFail(Session::get('coWorkSpacePaymentId'));
		$coWorkSpacePayment->status = $paymentData->status;
		$coWorkSpacePayment->save();

		$coWorkSpaceBooking = CwsBooking::findOrFail(Session::get('coWorkSpaceBookingId'));
		// $coWorkSpaceBooking->txnid = $coWorkSpacePayment->txnid;
		$coWorkSpaceBooking->status = $coWorkSpacePayment->status;
		$coWorkSpaceBooking->save();

		if($paymentData->status == 'success'){ 
			return view('front.cowork.payment.success', compact('paymentData', 'coWorkSpacePayment'));
		}elseif($paymentData->status == 'failure'){
			
			return view('front.cowork.payment.failure', compact('paymentData', 'coWorkSpacePayment'));
		}elseif($paymentData->status == 'canceled'){
			return view('front.cowork.payment.cancel', compact('paymentData', 'coWorkSpacePayment'));
		}else{
			return view('front.cowork.payment.error', compact('paymentData', 'coWorkSpacePayment'));
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