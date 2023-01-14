<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Notifications\NewSystemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionController extends BaseController
{
   public function store(Request $request)
   	{ 
   		$validator = Validator::make($request->all(), [
            'cws_id' => 'required',
            'customized' => 'required'
        ]);
   		
   		if ($validator->fails()) {
               return redirect()->back()->withInput()->withErrors($validator)->with('current_tab','term-condition');
        }

        $current_tab = "term-condition";
        $cws = Cws::findOrFail($request->cws_id);
        $cws->customized = $request->customized;
        $cws->terms = 1;

       	if($cws->save()) { 
          $this->completeTabTermsAndCondition($request, $cws->id);

          if($request->customized == 1){
            $data = ['message' => Auth::user()->fname.' applied for customized model ', 'link' => url('/admin/customised-applied')];
            $admin = Admin::first();
            $admin->notify(new NewSystemNotification($data));

          }
       		if($request->input('save')){  
       		      toastr()->success('Terms and condition of CoWork Space Added Successfully!!!');                 
       		      return redirect()->route('co-work-space.edit',$cws->slug)->with('current_tab','term-condition');
       		  }
       		  elseif($request->input('saveAndSubmit')){
       		      return redirect()->route('co-work-space.edit',$cws->slug)->with('current_tab','package');
       		  }
           
       	}
       	else {
           toastr()->error('Error Occur to save your space terms and condition!!!');                 
           return redirect()->back()->with('current_tab','term-condition');
       	}
           	
    }

    public function completeTabTermsAndCondition(Request $request, $cws)
    { 
        $completed_tab = CwsCompletedTab::where('cws_id', $cws)
                                     ->where('tab_name','terms_and_condition')->first();
        if($completed_tab){
            $completed_tab->value = $completed_tab->value ;
        }
        else{
            $completed_tab = new CwsCompletedTab;
            $completed_tab->cws_id = $cws;
            $completed_tab->tab_name = 'terms_and_condition';
            $completed_tab->value = 20;
        }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
    }


}
