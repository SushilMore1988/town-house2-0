<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\CwsLocation;    
use App\Models\CwsCompletedTab;    
use App\Models\Cws;

class LocationController extends BaseController
{
	public function store(Request $request, Cws $cws)
	{
		$validator = Validator::make($request->all(), [
            'address' 			=> 		'required|max:255',
			'pin_code' 			=>		'required|max:8',
            // 'latitude'          =>      'required',
            // 'longitude'          =>      'required',
            ]);
		
		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->with('current_tab','Location');
        }

        $cws->address = [
            'address' => $request->address,
            'pin_code' => $request->pin_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'street_number' => $request->street_number,
            'route' => $request->route,
            'locality' => $request->locality,
            'administrative_area_level_1' => $request->administrative_area_level_1,
            'country' => $request->country,
        ];
        
        if($cws->save()) {
            $this->completeTabLocation($request, $cws->id);

            return $this->redirectedTab($request);
        }
        else {
            toastr()->error('Error Occur to save your space facilities!!!');                 
            return redirect()->back()->with('current_tab','facilities');
        }
        	
    }

    /**
    * Checking for location is present or not, if present it will update, if not it will create.
    * @param  \Illuminate\Http\Request  $request
    * 
    * @return $location
    */
    public function createLocation(Request $request)
    {
        $location = null;
        if($location = CwsLocation::where('cws_id',$request->coWorkSpaceId)->first()){
            $location=$location;
        }
        else{
            $location = new CwsLocation;
            $location->cws_id = $request->coWorkSpaceId;
        }
        
        $location->address = $request->address;
        $location->pin_code = $request->pin_code;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();
        return $location;
    }

    /**
    * Checking for location tab is present or not in CwsCompletedTab Model , if present it will not add, if not it will create.
    * @param  \Illuminate\Http\Request  $request
    * 
    * @return void
    */
    public function completeTabLocation(Request $request, $cws)
    { 
        $completed_tab = CwsCompletedTab::where('cws_id', $cws)
                                     ->where('tab_name','location')->first();
        if($completed_tab){
            $completed_tab->value = $completed_tab->value ;
        }
        else{
            $completed_tab = new CwsCompletedTab;
            $completed_tab->cws_id = $cws;
            $completed_tab->tab_name = 'location';
            $completed_tab->value = 10;
        }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
    }

    /**
    * Redirect Tab to next tab or to keep on the same tab
    *
    * @param  \Illuminate\Http\Request  $request
    * 
    * @return mixed
    */
    public function redirectedTab(Request $request)
    {
        toastr()->success('Location completed Successfully!!!', 'List your space');                 
        if($request->input('save')){
            return redirect()->back()->with('current_tab','location');
        }
        elseif($request->input('saveAndSubmit')){
            return redirect()->back()->with('current_tab','opening-hours');
        }
    }
}