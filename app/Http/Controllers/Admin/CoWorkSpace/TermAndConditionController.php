<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\Setting;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TermAndConditionController extends BaseController
{
    public function index(){
    	$customizedUsers = Cws::where('customized', 1)->get();
    	return view('admin.terms-condition.index', compact('customizedUsers'));
    }

    public function store(Request $request){
    	$oldFile = null;
    	$cws = Cws::findOrFail($request->cws_id);
    	if($cws->agreement){
    	    $oldFile = public_path('/img/cowork/agreement/'.$cws->agreement); 
    	}

    	if($request->file('agreement')){
    	    $image = $request->file('agreement');
    	    $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
    	    $image->move(public_path('img/cowork/agreement/'), $new_name);
    	    $cws->agreement = $new_name;
    	    if(File::exists(public_path('img/cowork/agreement/'.$new_name))) {
    	        if($oldFile != null && File::exists($oldFile)){
    	            File::delete($oldFile);
    	        }
    	        $cws->save();
    	        return response()->json(['success' => 'true', 'status' => 'success']);
    	    }else{
    	        return response()->json(['success' => 'false', 'status' => 'success']);
    	    }
    	}
    }

    public function show(){
        $setting = Setting::where('name', 'terms')->first();
        return view('admin.terms-condition.edit', compact('setting'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'content'   =>    'required'
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }  

        $setting = Setting::where('name', 'terms')->first();
        $setting->content = $request->content;
        if($setting->save()){
            toastr()->success('Terms and condition updated successfully');                 
            return redirect()->back();
        }       
    }
}
