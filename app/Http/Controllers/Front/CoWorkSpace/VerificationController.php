<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class VerificationController extends BaseController
{
        public function sendEmailOtp($email){
           $response = array();
           
           if ( isset($email) && $email == "" ) {
               $response['error'] = 1; 
               $response['message'] = 'Invalid email';
               $response['loggedIn'] = 1;
           } else {
               $user = User::findOrFail(Auth::user()->id);

               $otp = rand(100000, 999999);

               Session::put('OTP', $otp);

               $mail_array = ['otp' => $otp];
               $details = ['message' => 'Your OTP to verify your mail is ', 'otp' => $otp];
               try{
                   $user->notify(new EmailVerificationNotification($otp));
                   // Notification::send($user, new EmailVerificationNotification($details));
                   $response['error'] = 0;
                   $response['message'] = 'Your OTP is created.';
                //    $response['OTP'] = $otp;
                   $response['loggedIn'] = 1; 
               }
               catch (\Exception $e) {
                   $response['error'] = 1;
                   $response['message'] = 'Error in sending mail.';
                   $response['error_message'] = $e;
                   $response['loggedIn'] = 0;
               }
           }
           return response()->json($response);         
        }

        /**
         * Verify email address by checking it's otp
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function verifyEmail(Request $request){ 

            $otp = request()->session()->get('OTP');
            
            $validator = Validator::make($request->all(), [
                'otp' => 'required|in:' . $otp,
                'email' => 'required'
            ]);

            if ($validator->fails()) {
                $response['error'] = 'Error in verifying email. Please try again.';
                $response['email'] = $request->email;
                $response['verified'] = 'No';
                return response()->json($response);
            }
            if($otp == $request->otp){
    	        $cws = Cws::FindOrFail($request->cws_id);
              $contactDetailsArray = $cws->contact_details;
              $contactDetailsArray['email_id'] = $request->email; 
              $cws->contact_details = $contactDetailsArray;
    	        $cws->email_verified = now();
    	        if($cws->save()){
                  	$response['error'] = 'Email verified successfully.';
                  	// $response['email'] = $user->user->email;
                    $response['email'] = $cws->email;
                  	$response['verified'] = 'Yes';
                  	return response()->json($response);
              	}else{
                  	$response['error'] = 'Error in verifying email. Please try again.';
                  	$response['email'] = $request->email;
                  	$response['verified'] = 'No';
                  	return response()->json($response);
              	}
            }else{
                $response['error'] = 'Error in verifying email. Please try again.';
                $response['email'] = $request->email;
                $response['verified'] = 'No';
                return response()->json($response);
            }
        }
}
