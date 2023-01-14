<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Explore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CwsEnquiry;
use App\Models\Admin;
use App\Notifications\Enquiry;


class EnquiryController extends Controller
{
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'first_name'  		=>    'required',
            'last_name'         =>    'required',
            'email'           	=>    'required|email',
            'message'           =>    'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return response()->json( [$validator->errors(), 'status' => 'validation_error']);
        }
        $coWorkSpaceEnquiry = $this->createEnquiry($request);
        if($coWorkSpaceEnquiry){
            $enquiry = [ 'first-name' => $coWorkSpaceEnquiry->first_name, 'last-name' => $coWorkSpaceEnquiry->last_name, 'email' => $coWorkSpaceEnquiry->email, 'message' => $coWorkSpaceEnquiry->message];
            Admin::find(1)->notify(new Enquiry($enquiry));
        	// return redirect()->back()->with('message','Enquiry Send Successfully!!!');
            return response()->json(['msg' => 'Enquiry Send Successfully!!!', 'status' => 'success']);
        }
        else{
        	// return redirect()->back()->with('error','Enquiry not Send, error occur!!!');
            return response()->json(['msg' => 'Enquiry not Send, error occur!!!', 'status' => 'failed']);
        }

	}

	public function createEnquiry(Request $request)
	{
        $coWorkSpaceEnquiry = new CwsEnquiry;
        $coWorkSpaceEnquiry->first_name = $request->first_name;
        $coWorkSpaceEnquiry->last_name 	= $request->last_name;
        $coWorkSpaceEnquiry->email 		= $request->email;
        $coWorkSpaceEnquiry->message 	= $request->message;
        $coWorkSpaceEnquiry->save();

        return $coWorkSpaceEnquiry;
	}


}