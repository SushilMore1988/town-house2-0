<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Explore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CwsScheduleTour;

class ScheduleTourController extends Controller
{
	public function store(Request $request){
        // dd($request->all());
		$validator = Validator::make($request->all(), [
            'first_name'  		=>    'required',
            'last_name'         =>    'required',
            'email'           	=>    'required',
            'message'           =>    'required', 
            'date'              =>    'required',
            'schedule_time'     =>    'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return response()->json( [$validator->errors(), 'status' => 'validation_error']);
        }
        $coWorkSpaceEnquiry = $this->createScheduleTour($request);
        if($coWorkSpaceEnquiry){
        	// return redirect()->back()->with('message','Enquiry Send Successfully!!!');
            return response()->json(['msg' => 'Tour Scheduled Successfully!!!', 'status' => 'success']);
        }
        else{
        	// return redirect()->back()->with('error','Enquiry not Send, error occur!!!');
            return response()->json(['msg' => 'Tour not Scheduled , error occur!!!', 'status' => 'failed']);
        }

	}

	public function createScheduleTour(Request $request)
	{
        $CoWorkSpaceMembershipEnquiry = new CwsScheduleTour;
        $CoWorkSpaceMembershipEnquiry->first_name   = $request->first_name;
        $CoWorkSpaceMembershipEnquiry->last_name 	= $request->last_name;
        $CoWorkSpaceMembershipEnquiry->email 		= $request->email;
        $CoWorkSpaceMembershipEnquiry->message 	    = $request->message;
        $CoWorkSpaceMembershipEnquiry->start_date   = $request->date;
        $CoWorkSpaceMembershipEnquiry->time = $request->schedule_time;
        $CoWorkSpaceMembershipEnquiry->save();

        return $CoWorkSpaceMembershipEnquiry;
	}


}