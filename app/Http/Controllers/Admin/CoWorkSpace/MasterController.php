<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\Cws;
use App\Models\CwsMaster;
use Illuminate\Support\Facades\Validator;
use App\Models\CwsRatingType;

class MasterController extends BaseController
{
	public function index($id)
	{
		$coWorkSpace = Cws::findOrFail($id);
		$ratingTypes = CwsRatingType::all();
		return view('admin.co-work.master',compact('coWorkSpace','ratingTypes'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'coWorkSpaceId'		=>    'required',
            'review_text_master'   =>    'nullable|max:255',
            'special_attribute'     	=>    'nullable|max:255',
            'tag_line'         	=>    'nullable|max:255',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }
		
        // $coWorkSpaceMaster;

		$coWorkSpaceMaster = $this->createMaster($request);

		if($coWorkSpaceMaster){
			return redirect()->back()->with('message','CoWorkSpaceMaster created successfully');
		}
		else{
			return redirect()->back()->with('error','CoWorkSpaceMaster not created, error occur');
		}
	}

	/**
	*	CwsMaster is created in co_work_space_masters table
	*   
	*   @param Illuminate\Http\Request
	*
	*   @return $coWorkSpaceMaster
	*/
	public function createMaster(Request $request)
	{
		$coWorkSpaceMaster = null;
        if($coWorkSpaceMaster = CwsMaster::where('cws_id',$request->coWorkSpaceId)->first()){
            $coWorkSpaceMaster=$coWorkSpaceMaster;
        }
        else{
            $coWorkSpaceMaster = new CwsMaster;
			$coWorkSpaceMaster->cws_id = $request->coWorkSpaceId; 
        }
		$coWorkSpaceMaster->review_text_master  = $request->review_text_master ; 
		$coWorkSpaceMaster->special_attribute 	= $request->special_attribute;
		$coWorkSpaceMaster->tag_line			= $request->tag_line;
		$coWorkSpaceMaster->save();

		return $coWorkSpaceMaster;
	}
}