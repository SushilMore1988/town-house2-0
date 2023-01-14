<?php

namespace App\Http\Controllers\Front\CoLiveSpace;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ClsCheckInCheckOut;
use App\Models\Cls;    

/*
    Name:Varsha
    Date:23/11/2019
    Description: The OpeningHoursCwsController class is used for getting the details 
    			 and description for Opening Hourse of Cws.
*/

class CheckInCheckOutCoLiveSpaceController extends BaseController
{
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'coLiveSpaceId'		=>		'required',
            'monday_from'		=>		'nullable',
            'monday_to' 		=> 		'nullable',
            'tuesday_from' 		=>		'nullable',
			'tuesday_to' 		=> 		'nullable',
			'wednesday_from' 	=>		'nullable',
			'wednesday_to' 		=> 		'nullable',
			'thursday_from' 	=> 		'nullable',
			'thursday_to' 		=> 		'nullable',
			'friday_from' 		=> 		'nullable',
			'friday_to' 		=> 		'nullable',
			'saturday_from' 	=> 		'nullable',
			'saturday_to' 		=> 		'nullable',
			'sunday_from' 		=> 		'nullable',
			'sunday_to' 		=> 		'nullable'
            ]);
		
		if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }

        $check_in_check_outs = ClsCheckInCheckOut::where('co_live_space_id', $request->coLiveSpaceId)->get();
        
        foreach($check_in_check_outs as $check_in_check_out){
              $check_in_check_out->delete();
        }

        $days = Day::all();
        
        foreach ($days as $day) {
        	$check_in_check_out = new ClsCheckInCheckOut;
			$check_in_check_out->cls_id = $request->coLiveSpaceId;
			$check_in_check_out->day = $day->day;
			$check_in_check_out->from = $request->{$day->day.'_from'};
			$check_in_check_out->to = $request->{$day->day.'_to'};
			$check_in_check_out->save();
		}
			$colive = Cls::where('id',$request->coLiveSpaceId)->first();
			$colive->time_information = $request->time_information;
			
			if($colive->save()){
				if($request->input('save')){
				 	return redirect()->back()->with('message', 'Opening Hourse of CoWork Space Added Successfully!!!')->with('current_tab','check-in-check-out');
				}
				elseif($request->input('saveAndSubmit')){
					return redirect()->back()->with('current_tab','conditions');
				}
			}
			else{
				return redirect()->back()->with('error', 'Error Occur to save your space check-in-check-out time!!!')->with('current_tab','check-in-check-out');
			}
    }
}