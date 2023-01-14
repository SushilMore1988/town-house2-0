<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\CwsBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PayuPaymentController extends Controller
{
    public function payment(Request $request)
    {	
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
        
    }
}