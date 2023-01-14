<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\CwsBooking;
use App\Models\CwsPayment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Support\Facades\Session;

class RazorpayPaymentController extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $coWorkSpacePayment = CwsPayment::findOrFail($request->cwsPaymentId);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $coWorkSpaceBooking = CwsBooking::where('id', $request->bookingId)->first();
                if($response->status == 'captured'){
                    $coWorkSpaceBooking->status = 'Success';
                    $coWorkSpaceBooking->save();
                    $coWorkSpacePayment->status = 'Success';
                    $coWorkSpacePayment->save();
                    return view('front.cowork.payment.success', compact('coWorkSpacePayment'));
                }else{
                    $coWorkSpaceBooking->status = 'Failed';
                    $coWorkSpaceBooking->save();
                    $coWorkSpacePayment->status = 'Failed';
                    $coWorkSpacePayment->save();
                    return view('front.cowork.payment.failure', compact('coWorkSpacePayment'));
                }
            } catch (Exception $e) {
                $coWorkSpacePayment->status = 'Failed';
                    $coWorkSpacePayment->save();
                return view('front.cowork.payment.failure', compact('coWorkSpacePayment'));
            }
        }
        $coWorkSpacePayment->status = 'Failed';
        $coWorkSpacePayment->save();
        return view('front.cowork.payment.failure', compact('coWorkSpacePayment'));
    }
}