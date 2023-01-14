<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Notification;
use RobinCSamuel\LaravelMsg91\Facades\LaravelMsg91;

class VerificationController extends BaseController
{
  
    public function sendEmailOtp($email){
       $response = array();
       
       if ( isset($email) && $email == "" ) {
           $response['error'] = 1; 
           $response['message'] = 'Invalid email';
           $response['loggedIn'] = 1;
       } else {
           $user = Auth::user();

           $otp = rand(100000, 999999);

           Session::put('OTP', $otp);

           $mail_array = ['otp' => $otp];
           $details = ['message' => 'Your OTP to verify your mail is ', 'otp' => $otp];
           try{
               $user->notify(new EmailVerificationNotification($otp));
               // Notification::send($user, new EmailVerificationNotification($details));
               $response['error'] = 0;
               $response['message'] = 'Your OTP is created.';
               $response['OTP'] = $otp;
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

        $otp = \Request::session()->get('OTP');
        
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
	        $user = Auth::user(); 
          	$user->email = $request->email;
	        $user->email_verified = now();
	        if($user->save()){
              	$response['error'] = 'Email verified successfully.';
              	// $response['email'] = $user->user->email;
                $response['email'] = $user->email;
              	$response['verified'] = 'Yes';
              	return response()->json($response);
          	}else{
              	$response['error'] = 'Error in verifying email. Please try again.';
              	$response['email'] = $user->user->email;
              	$response['verified'] = 'No';
              	return response()->json($response);
          	}
        }else{
            $response['error'] = 'Error in verifying email. Please try again.';
            $response['email'] = $user->email;
            $response['verified'] = 'No';
            return response()->json($response);
        }
    }

    /**
     * create and send otp to given mobile number for verification.
     *
     * @param  mixed $mobile
     * @return \Illuminate\Http\Response
     */
    public function sendPhoneOtp($mobile){
        $response = array();
        $otp = rand(100000, 999999);

        if ( isset($mobile) && $mobile =="" ) {
            $response['error'] = 1; 
            $response['message'] = 'Invalid mobile number';
            $response['loggedIn'] = 1;
        } else {
          try {
            $result = LaravelMsg91::sendOtp($mobile, $otp, "Your OTP for mobile no verification is ".$otp);
            if($result->type == 'success'){
                Session::put('OTP', $otp);
                $response['error'] = 0;
                $response['message'] = 'Your OTP is created.';
                $response['OTP'] = $otp;
                $response['loggedIn'] = 1; 
            }else{
                $response['error'] = 1;
                $response['message'] = 'Error in sending message.';
                $response['loggedIn'] = 0;
            }
          } catch (Exception $e) {
                // $response['error'] = 1;
                // $response['message'] = 'Error in sending message.';
                // $response['loggedIn'] = 0;
                //Delete from here            
                $response['error'] = 0;
                $response['message'] = 'Your OTP is created.';
                $response['OTP'] = $otp;
                $response['loggedIn'] = 1;
          }
        }
        return response()->json($response);
    }

    /**
     * Verficy mobile by checking it's otp
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyPhone(Request $request){
        $otp = \Request::session()->get('OTP');
        $validator = Validator::make($request->all(), [
            'otp' => 'required|in:' . $otp,
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->with("error","Error in verifying mobile. Please try again.");
          $response['error'] = 'Error in verifying phone. Please try again.';
          $response['phone'] = $request->phone;
          $response['verified'] = 'No';
          return response()->json($response);
        }

        $user = Auth::user();
        $user->phone_verified = now();
        if($user->save()){
          $response['error'] = 'Phone verified successfully.';
          $response['phone'] = $user->phone;
          $response['verified'] = 'Yes';
          return response()->json($response);
            // return redirect()->back()->with("success", "Mobile verified successfully.");
        }else{
          $response['error'] = 'Error in verifying phone. Please try again.';
          $response['phone'] = $request->phone;
          $response['verified'] = 'No';
          return response()->json($response);
            // return redirect()->back()->with("error", "Error in verifying mobile. Please try again.");
        }
    }
}
