<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Models\CwsOpeningHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OpeningHoursController extends BaseController
{
	public function store(Request $request, Cws $cws)
	{
		$validator = Validator::make($request->all(), [
            'coWorkSpaceId'		=>		'required',
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
            return redirect()->back()->withErrors($validator)->with('current_tab','opening-hours');
        }
        $days = config('constant.DAYS');
        $timing = [];
        foreach ($days as $day => $key) {
        	if(isset($request->{$day.'_radio'})){
	    		$timing[$day]['checked'] = 1;
	    		$timing[$day]['from'] = $request->{$day.'_from'};
	    		$timing[$day]['to'] = $request->{$day.'_to'};
	    	}else{
	    		$timing[$day]['checked'] = 0;
	    		$timing[$day]['from'] = null;
	    		$timing[$day]['to'] = null;
	    	}
		}
		$cws->opening_hours = [
			'timing' => $timing,
			'specific_time_info' => $request->time_information
		];
		if($cws->save()){
			$this->completeTabLocation($request, $cws->id);

            toastr()->success('Opening Hours competed Successfully!!!', 'List your space');                 
			if($request->input('save')){
			 	return redirect()->back()->with('current_tab','opening-hours');
			}
			elseif($request->input('saveAndSubmit')){
				return redirect()->back()->with('current_tab','size');
			}
		}else{
            toastr()->error('Error Occur to save your space Opening Hours!!!');                 
			return redirect()->back()->with('current_tab','size');
		}
    }

    public function completeTabLocation(Request $request, $cws)
    { 
        $completed_tab = CwsCompletedTab::where('cws_id', $cws)
                                     ->where('tab_name','opening_hours')->first();
        if($completed_tab){
            $completed_tab->value = $completed_tab->value ;
        }
        else{
            $completed_tab = new CwsCompletedTab;
            $completed_tab->cws_id = $cws;
            $completed_tab->tab_name = 'opening_hours';
            $completed_tab->value = 10;
        }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
    }
}