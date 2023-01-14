<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\Cls;
use App\Models\CwsBooking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{

	public function index(){
		$coWorkSpaces = Cws::where('user_id',Auth()->user()->id)->get();
        $coLiveSpaces = Cls::where('user_id',Auth()->user()->id)->get();
		$coWorkSpaceBookings = CwsBooking::where('user_id',Auth()->user()->id)->where('status', 'success')->get();

		$fname = Auth::user()->fname;
        $lname = Auth::user()->lname;
        $email = Auth::user()->email;
        $phone = Auth::user()->phone;
        $gender = Auth::user()->gender;
        $dob = Auth::user()->dob;

        $government_id = empty(Auth::user()->images['government_id'][0]['name']) ? null :  Auth::user()->images['government_id'][0]['name'];
        $government_id = empty(Auth::user()->images['government_id'][1]['name']) ? null :  Auth::user()->images['government_id'][1]['name'];
        $government_id_verified = empty(Auth::user()->images['government_id'][0]['is_approved']) ? null : Auth::user()->images['government_id'][0]['is_approved'];
        $government_id_verified = empty(Auth::user()->images['government_id'][1]['is_approved']) ? null : Auth::user()->images['government_id'][1]['is_approved'];
        $selfie = empty(Auth::user()->images['selfie']['name']) ? null : Auth::user()->images['selfie']['name'];
        $selfie_verified = empty(Auth::user()->images['selfie']['is_approved']) ? null : Auth::user()->images['selfie']['is_approved'];

        $account_verified = 'not verified';
        $message = null;
        $route = null;
        if($fname == null || $lname == null || $email == null || $phone == null || $gender == null || $dob == null){
            $message = 'Please complete your profile to list your space.';
            $route = 'setting.index';
        }else if($selfie == null || $government_id == null){
            $message = 'Your document verification is pending. Please upload your documents.';
            $route = 'front.dashboard.index';
        }else if($government_id_verified == 'Pending Approval' || $selfie_verified == 'Pending Approval'){
            $message = 'Your document verification is pending, Please contact Admin.';
            $route = 'front.dashboard.index';
        }else{
            $account_verified = 'verified';
        }


		return view('front.cowork.dashboard.dashboard',compact('coWorkSpaces', 'coLiveSpaces', 'coWorkSpaceBookings', 'account_verified', 'message', 'route'));
	}

	public function success(){
		return view('front.cowork.payment.success');
	}
	public function failure(){
		return view('front.cowork.payment.failure');
	}
}