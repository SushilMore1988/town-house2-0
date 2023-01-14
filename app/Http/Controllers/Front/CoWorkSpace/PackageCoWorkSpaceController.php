<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsPackage;
use App\Models\CompletedTab;
use App\Models\Cws;
use Illuminate\Support\Facades\Validator;

class PackageCoWorkSpaceController extends BaseController
{
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'coWorkSpaceId' => 'required',
            'selectedPackageId' => 'required',
            'name' => 'required',
            'email' =>'required',
            'phone' =>'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->with('error', ' Select Packages of CoWork Space !!!')->with('current_tab','package');
        }

        if(CwsPackage::where('cws_id',$request->coWorkSpaceId)->first()){
            $coWorkSpacePackage = CwsPackage::where('cws_id',$request->coWorkSpaceId)->first()->delete();
        }
        $coWorkSpacePackage = new CwsPackage;
        $coWorkSpacePackage->cws_id = $request->coWorkSpaceId;
        $coWorkSpacePackage->package_id = $request->selectedPackageId;
        
        if($coWorkSpacePackage->save()){
           
            $completed_tab = CompletedTab::where('cws_id',$request->coWorkSpaceId)
                                     ->where('tab_name','package')->first();
            if($completed_tab){
                $completed_tab->value = $completed_tab->value ;
            }
            else{
                $completed_tab = new CompletedTab;
                $completed_tab->cws_id = $request->coWorkSpaceId;
                $completed_tab->tab_name = 'package';
                $completed_tab->value = 20;
                $completed_tab->save();
                $co_work_space = Cws::findOrFail($request->coWorkSpaceId);
                $co_work_space->progress_percent = $completed_tab->where('cws_id',$request->coWorkSpaceId)
                                                                 ->sum('value');
                 $co_work_space->save();
            }

            return $coWorkSpacePackage;
         
            // if($request->input('save')){
            //     return redirect()->back()->with('message', 'Packages of CoWork Space Added Successfully!!!')->with('current_tab','package');
            // }
            //  elseif($request->input('saveAndSubmit')){               
            //     return redirect()->route('front.dashboard.index');
            // }

        }
    }
}