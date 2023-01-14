<?php

namespace App\Http\Controllers\Front\CoLiveSpace;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ClsLocation;    

/*
    Name:Varsha
    Date:28/12/2019
    Description: The LocationCoLiveSpaceController class is used for getting the details 
    			 and description for location of CoLiveSpace.
*/

class LocationCoLiveSpaceController extends BaseController
{
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'coLiveSpaceId'		=>		'required',
            'address' 			=> 		'required',
			'pin_code' 			=>		'required',
            'latitude'          =>      'required',
            'longitude'          =>      'required',
        ]);
		if ($validator->fails()) {
            dd($validator->errors());
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }

        $location = null;
        if($location = ClsLocation::where('co_live_space_id',$request->coLiveSpaceId)->first()){

        	$location=$location;
        }
        else{
       	    $location = new ClsLocation;
	     	$location->co_live_space_id = $request->coLiveSpaceId;
	    }
	    
	    $location->address = $request->address;
	    $location->pin_code = $request->pin_code;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
    
        if($location->save()){
            if($request->input('save')){
                return redirect()->back()->with('message', 'Location of CoWork Space Added Successfully!!!')->with('current_tab','location');
                }
            elseif($request->input('saveAndSubmit')){
                   return redirect()->back()->with('current_tab','opening-hours');
                }
        }

        else {
             return redirect()->back()->with('error', 'Error Occur to save your space facilities!!!')->with('current_tab','facilities');
        }
        	
    }


    public function edit(Request $request){
       
       // dd($request->all());
        // $coWorkSpaceLocation = ClsLocation::where('co_live_space_id',$request->coWorkSpaceId)->first();
        // dd($coWorkSpaceLocation);
        // return response()->json($coWorkSpaceLocation);
    }
    
}