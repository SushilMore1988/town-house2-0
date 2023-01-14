<?php

namespace App\Http\Controllers\Front\CoLiveSpace;

use Illuminate\Http\Request;
use App\Models\ClsPackage;
use Illuminate\Support\Facades\Validator;

class PackageCoLiveSpaceController extends BaseController
{
	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'coLiveSpaceId' 		=>    'required',
            'selectedPackageId'     =>    'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }
        if(ClsPackage::where('co_live_space_id',$request->coLiveSpaceId)->first()){
            $coLiveSpacePackage = ClsPackage::where('co_live_space_id',$request->coLiveSpaceId)->first()->delete();
        }
        $coLiveSpacePackage = new ClsPackage;
        $coLiveSpacePackage->co_live_space_id = $request->coLiveSpaceId;
        $coLiveSpacePackage->package_id = $request->selectedPackageId;
        
        if($coLiveSpacePackage->save()){
            if($request->input('save')){
                return redirect()->back()->with('message', 'Packages of CoWork Space Added Successfully!!!')->with('current_tab','package');
            }
             elseif($request->input('saveAndSubmit')){
               
                return redirect()->route('front.dashboard.index');
            }
        }

    }
}