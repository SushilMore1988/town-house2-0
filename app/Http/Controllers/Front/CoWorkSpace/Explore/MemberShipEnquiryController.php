<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Explore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CwsMembershipEnquiry;

class MemberShipEnquiryController extends Controller
{
	public function store(Request $request){
        // dd($request->all());
		$validator = Validator::make($request->all(), [
            'first_name'  		=>    'required',
            'last_name'         =>    'required',
            'email'           	=>    'required',
            'message'           =>    'required', 
            'start_date'        =>    'required',
            'end_date'          =>    'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return response()->json( [$validator->errors(), 'status' => 'validation_error']);
        }
        $coWorkSpaceEnquiry = $this->createMembershipEnquiry($request);
        if($coWorkSpaceEnquiry){
        	// return redirect()->back()->with('message','Enquiry Send Successfully!!!');
            return response()->json(['msg' => 'Membership Enquiry Send Successfully!!!', 'status' => 'success']);
        }
        else{
        	// return redirect()->back()->with('error','Enquiry not Send, error occur!!!');
            return response()->json(['msg' => 'Membership Enquiry not Send, error occur!!!', 'status' => 'failed']);
        }

	}

	public function createMembershipEnquiry(Request $request)
	{
        $CoWorkSpaceMembershipEnquiry = new CwsMembershipEnquiry;
        $CoWorkSpaceMembershipEnquiry->first_name   = $request->first_name;
        $CoWorkSpaceMembershipEnquiry->last_name 	= $request->last_name;
        $CoWorkSpaceMembershipEnquiry->email 		= $request->email;
        $CoWorkSpaceMembershipEnquiry->message 	    = $request->message;
        $CoWorkSpaceMembershipEnquiry->start_date   = $request->start_date;
        $CoWorkSpaceMembershipEnquiry->end_date     = $request->end_date;
        $CoWorkSpaceMembershipEnquiry->save();

        return $CoWorkSpaceMembershipEnquiry;
	}


}