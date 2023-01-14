<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Explore;

use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\CwsBooking;
use App\Models\CwsBookingMeetingRoom;
use App\Models\CwsBookingPrivateOffice;
use App\Models\CwsBookingSharedDesk;
use App\Models\CwsDedicatedDeskBooking;
use App\Models\CwsPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Payment;

class BookingController extends Controller
{
	public function checkAvailability(Request $request){ 
		// dd($request->all());
        $coWorkSpace = Cws:: findOrFail($request->coWorkSpaceId);
        if(Auth::id() == $coWorkSpace->user_id){
        	// toastr()->error('You cannot book your own property.');  
        	// return redirect()->back();
        	return response()->json(['error' => true, 'message' => 'You cannot book your own property.']);
        }
        $oldBookings = CwsBooking::where('cws_id', $request->coWorkSpaceId)->where('status', 'Success')->get();

        if($coWorkSpace->size['shared_desk']){
        	$totalSharedDeskCount = $coWorkSpace->size['shared_desk']['for_listing'];
        	$totalSharedDeskBookedCount = 0;
        }

        if($coWorkSpace->size['dedicated_desk']){
        	$totalDedicatedDeskCount = $coWorkSpace->size['dedicated_desk']['for_listing'];
        	$totalDedicatedDeskBookedCount = 0;
        }

        $errorArray = [];
        foreach($oldBookings as $oldBooking){ 
        	if($oldBooking){
        		if($oldBooking->sharedDeskBooking){
        			if($request->sharedDeskCount > 0 && strtotime($oldBooking->start_date.'+'.$oldBooking->sharedDeskBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
        				$totalSharedDeskBookedCount = $totalSharedDeskBookedCount + $oldBooking->sharedDeskBooking->no_of_desk; 
        				$remainingSharedDesk =  $totalSharedDeskCount - $totalSharedDeskBookedCount;
        				if($remainingSharedDesk < $request->sharedDeskCount){
		        			// return response()->json(['error' => true, 'message' => 'Shared desk not available on selected date.']);
		        			$errorArray['shared_error'] = "Shared desk not available on selected date.";
        				}
        			}
        		}
        		if($oldBooking->dedicatedDeskBooking){
        			if($request->dedicatedDeskCount > 0 &&  strtotime($oldBooking->start_date.'+'.$oldBooking->dedicatedDeskBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
        				$totalDedicatedDeskBookedCount = $totalDedicatedDeskBookedCount + $oldBooking->dedicatedDeskBooking->no_of_desk;
        				$remainingDedicatedDeskCount = $totalDedicatedDeskCount - $totalDedicatedDeskBookedCount;
        				if($remainingDedicatedDeskCount < $request->dedicatedDeskCount){
		        			// return response()->json(['error' => true, 'message' => 'Dedicated desk not available on selected date.']);
		        			$errorArray['dedicated_error'] = "Dedicated desk not available on selected date.";
        				}
        			}	
        		}
        		if($oldBooking->privateOfficeBooking){
        			if($request->privateOfficeId != null && strtotime($oldBooking->start_date.'+'.$oldBooking->privateOfficeBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){
        				if($oldBooking->privateOfficeBooking->office_id == $request->privateOfficeId){
		        			// return response()->json(['error' => true, 'message' => 'Private office not available on selected date.']);
		        			$errorArray['private_office_error'] = "Private office not available on selected date.";
        				}
        			}
        		}
        		if($oldBooking->meetingRoomBooking){ 
        			if($request->meetingRoomId != null && strtotime($oldBooking->start_date.'+'.$oldBooking->meetingRoomBooking->duration.'- 1 second') >= strtotime($request->bookingDate) && strtotime($oldBooking->start_date) <= strtotime($request->bookingDate)){  
        				if($oldBooking->meetingRoomBooking->meeting_room_id == $request->meetingRoomId){
        					$time = date('H:i',strtotime($oldBooking->meetingRoomBooking->check_in_time));
        					if(strtotime($time.'+'.$oldBooking->meetingRoomBooking->duration) > strtotime($request->meeting_room_check_in_time) && strtotime($time) < strtotime($request->meeting_room_check_in_time)){

		        				$errorArray['meeting_room_error'] = "Meeting room not available on selected date.";
        					}
		        			
        				}
        			}
        		}
	        }	
        }
        if(!empty($errorArray)){
		    return response()->json(['error' => true, 'errors' => $errorArray]);
        }
        return response()->json(['success' => true]);
	}

	public function show(CwsBooking $cwsBooking){
		if($cwsBooking->status != 'Pending'){
			return view('front.cowork.explore.booked-order-failed',compact('cwsBooking'));
        }
		return view('front.cowork.explore.booked-order',compact('cwsBooking'));
	}

	public function store(Request $request)
	{	
		// dd($request->all());
		$fname = Auth::user()->fname;
		$lname = Auth::user()->lname;
		$email = Auth::user()->email;
		$phone = Auth::user()->phone;
		$gender = Auth::user()->gender;
		$dob = Auth::user()->dob;

		if(empty($lname) || empty($phone) || empty($gender) || empty($dob) || empty($fname) || empty($email)){
			return redirect()->route('setting.index')->with('message', 'Please update your profile first');
		}

		// dd($request->all());
		$validator = Validator::make($request->all(), [
            'bookingDate' => 'required',
            'coWorkSpaceId' => 'required',
            'userId' => 'required',
            'currency' => 'required',    
            'totalAmount' => 'required',    
        ]);

        if ($validator->fails()) {
         	$validator->errors();
            return redirect()->back()->withErrors($validator->errors());
        }

        $coWorkSpace = Cws:: findOrFail($request->coWorkSpaceId);

        if(Auth::id() == $coWorkSpace->user_id){
        	// toastr()->error('You cannot book your own property.');  
        	// return redirect()->back();
        	return response()->json(['error' => true, 'message' => 'You cannot book your own property.']);
        }
         
       	$check_in_day = (date('l', strtotime($request->bookingDate)));
       	
		$office_close_day = strtolower((date('l', strtotime($request->bookingDate. ' -1 day' ))));

        $check_in_time = null;
       	
		foreach(config('constant.DAYS') as $day => $key){
       		if(strtolower($day) == strtolower($check_in_day)){
       			if(($coWorkSpace->opening_hours['timing'][$office_close_day]['to'] < strtotime(now())) && (strtotime(now()) < $coWorkSpace->opening_hours['timing'][$day]['from'])){

       				$check_in_time = strtotime($coWorkSpace->opening_hours['timing'][$day]['from']) + 7200;
       			}else{ 
       				$check_in_time = $coWorkSpace->opening_hours['timing'][$day]['from'];
       			}
       		}
        }  

        $booking = new CwsBooking;
        $booking->user_id = $request->userId;
        $booking->cws_id =$request->coWorkSpaceId;
        $booking->start_date = $request->bookingDate;
        $booking->check_in_time = $check_in_time;
        $booking->total = $request->totalAmount;
        $booking->currency = $request->currency;
        $booking->status = "Pending";
        if($booking->save()){
        	if($request->sharedDeskCount > 0 ){
				$sharedDesk = new CwsBookingSharedDesk;
				$sharedDesk->cws_booking_id = $booking->id;
				$sharedDesk->no_of_desk = $request->sharedDeskCount;
				$sharedDesk->duration = $request->shared_desk_booking;
				$sharedDesk->price = $request->selectedSharedPrice;
				$sharedDesk->save();
			}
			if($request->dedicatedDeskCount > 0 ){
				$dedicatedDesk = new CwsDedicatedDeskBooking;
				$dedicatedDesk->cws_booking_id = $booking->id;
				$dedicatedDesk->no_of_desk = $request->dedicatedDeskCount;
				$dedicatedDesk->duration = $request->dedicatedRadio;
				$dedicatedDesk->price = $request->selectedDedicatedPrice;
				$dedicatedDesk->save();
			}
			if($request->privateOfficeId != null){
				$privateOfficeBooking = new CwsBookingPrivateOffice;
				$privateOfficeBooking->cws_booking_id = $booking->id;
				$privateOfficeBooking->duration = $request->privateRadio;
				$privateOfficeBooking->office_id = $request->privateOfficeId;
				$privateOfficeBooking->price = $request->selectedPrivatePrice;
				$privateOfficeBooking->save();
			}
			if($request->meetingRoomId != null){
				$meetingRoomBooking = new CwsBookingMeetingRoom;
				$meetingRoomBooking->cws_booking_id = $booking->id;
				$meetingRoomBooking->duration = $request->meetingRadio;
				$meetingRoomBooking->meeting_room_id = $request->meetingRoomId;
				$meetingRoomBooking->price = $request->selectedMeetingPrice;
				$meetingRoomBooking->save();
			}
		}
		
		// $coWorkSpacePayment = new CwsPayment;
		// // $coWorkSpacePayment->cws_booking_id = Session::get('coWorkSpaceBookingId');
		// $coWorkSpacePayment->cws_booking_id = $booking->id;
 		// 	$coWorkSpacePayment->status = 'pending';
		// $coWorkSpacePayment->payment_for = "Booking Co-working space";
		// $coWorkSpacePayment->amount = $request->totalAmount;
		// $coWorkSpacePayment->txnid = $this->txn_no();
		// $coWorkSpacePayment->firstname = Auth::user()->fname.' '.Auth::user()->lname;
		// $coWorkSpacePayment->email = Auth::user()->email;
		// $coWorkSpacePayment->phone = Auth::user()->phone;
		// $coWorkSpacePayment->dated = date('Y-m-d H:i:s');
		// $coWorkSpacePayment->save();
		
		return view('front.cowork.explore.booked-order',compact('coWorkSpace','booking'));
	}

	public function status(){ 
		$payment = Payment::capture();
    	$payment->isCaptured();

		$paymentData = $payment->getData();

		// dd($paymentData);
		$coWorkSpacePayment =  CwsPayment::findOrFail(Session::get('coWorkSpacePaymentId'));
		$coWorkSpacePayment->status = $paymentData->status;
		$coWorkSpacePayment->save();
		// dd(Session::get('coWorkSpaceBookingId'));	
		$coWorkSpaceBooking = CwsBooking::findOrFail(Session::get('coWorkSpaceBookingId'));
		// $coWorkSpaceBooking->txnid = $coWorkSpacePayment->txnid;
		$coWorkSpaceBooking->status = $coWorkSpacePayment->status;
		$coWorkSpaceBooking->save();

		if($paymentData->status == 'success'){ 
			return view('front.cowork.payment.success', compact('paymentData', 'coWorkSpacePayment'));
		}elseif($paymentData->status == 'failure'){ 
			return view('front.cowork.payment.failed', compact('paymentData', 'coWorkSpacePayment'));
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

	public function bookingReview($id)
	{
		$coWorkSpace = Cws:: findOrFail($id); 
		return view('front.cowork.explore.booked-order',compact('coWorkSpace'));
	}

	public function reBookingReview($id)
	{
		$booking = CwsBooking::findOrFail($id); 
		$coWorkSpace = Cws:: findOrFail($booking->cws_id); 
		return view('front.cowork.explore.rebook',compact('coWorkSpace', 'booking'));
	}
}