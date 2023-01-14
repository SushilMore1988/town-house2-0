<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\File;

class SettingController extends BaseController
{
    public function index(){
        $user = Auth::user();
    	return view('front.setting.index', compact('user'));
    }

    public function changePassword(Request $request){
    	$validatedData = $request->validate([
    	    // 'current-password' => 'required',
    	    'new-password' => 'required|string|min:8|confirmed',
    	]);
    	if(!empty(Auth::user()->password)){
            if($request->get('current-password')){
                if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                    // The passwords matches
                	toastr()->error('Current password not match with the password you entered. Please try again.');
                    return redirect()->back();
                }

                if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                    //Current password and new password are same
                	toastr()->error('New Password cannot be same as your current password. Please choose a different password.');
                    return redirect()->back();
                }
            }
        } 

        if(strcmp($request->get('new-password_confirmation'), $request->get('new-password')) != 0){
            //Current password and new password are same
        	toastr()->error('Your password and confirmation password do not match.');
            return redirect()->back();
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        toastr()->success('Password changed successfully !');
        return redirect()->back();
    }

    public function updateProfile(Request $request){   
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'max:55'],
            'lname' => ['required', 'string', 'max:55'],
            'birth_date' => ['required'],
            'gender' => ['required'],
            'phone' => ['required'],
        ]);
        
        if ($validator->fails()) { 
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        
        $user = Auth::user();

        if(!empty($request->get('current-password'))){
            if(!empty(Auth::user()->password)){
                if($request->get('current-password')){
                    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                        // The passwords matches
                        toastr()->error('Current password not match with the password you entered. Please try again.');
                        return redirect()->back();
                    }

                    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                        //Current password and new password are same
                        toastr()->error('New Password cannot be same as your current password. Please choose a different password.');
                        return redirect()->back();
                    }
                }
            } 

            if(strcmp($request->get('new-password_confirmation'), $request->get('new-password')) != 0){
                //Current password and new password are same
                toastr()->error('Your password and confirmation password do not match.');
                return redirect()->back();
            }
            $user->password = bcrypt($request->get('new-password'));
        }
        $user->fname =  $request->fname; 
        $user->lname =  $request->lname;
        $user->phone = $request->phone;
        $user->dob = date('Y-m-d',strtotime($request->birth_date));
        $user->gender = $request->gender;

        $profileImage = null;
        $oldFile = null;
        $imageArray = array();
        if($user->images != null){
            $profileImage = $user->images['profile_image']['name'];
            $imageArray = $user->images;
        }
        if(!empty($profileImage)){
            $oldFile = public_path('/img/user/profile-image/'.$profileImage); 
        }
        if($request->file('profile-image')){
            $image = $request->file('profile-image');
            $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/profile-image/'), $new_name);
            //$imageArray['profile_image']['name'] = $new_name;
            //$user->images = $imageArray;
            $user->profile_image = $new_name;
            if(File::exists(public_path('img/user/profile-image/'.$new_name))) {
                if($oldFile != null && File::exists($oldFile)){
                    File::delete($oldFile);
                }
            }
        }
        $user->save();

        toastr()->success('Profile updated successfully !');
        return redirect()->back();
    }

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

        $otp = $request->session()->get('OTP');
        
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
