<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use App\Http\Controllers\Controller;
use App\Models\CwsAlgorithm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlgorithmController extends BaseController
{
    public function index(Request $request){
    	$algorithms = CwsAlgorithm::all();
    	return view('admin.algorithm.index',compact('algorithms'));
    }

    public function edit($id){
    	$algorithm = CwsAlgorithm::findOrFail($id);
    	return view('admin.algorithm.edit', compact('algorithm'));
    }

   public function update(Request $request, $id)
   	{
   		$validator = Validator::make($request->all(), [
   			'category'			=>    'required',
            'range_from'   	=>    'required',
            'range_to'    =>    'required'
           ]);
            if ($validator->fails()) {
               $validator->errors();
               return redirect()->back()->withErrors($validator)->withInput()->with('error','error in updating algorithm');
           }

           $algorithm = CwsAlgorithm::findOrFail($id);
           $algorithm->category = $request->category;
           $algorithm->range_from = $request->range_from;
           $algorithm->range_to = $request->range_to;
	   		if($algorithm->save()){ 
	            //toastr()->success('Algorithm updated successfully.');                 
	   			return redirect()->back();
	   		}else{
	            //toastr()->success('Error in updating algorithm.');                 

	   			return redirect()->back();
	   		}
	   	}
}
