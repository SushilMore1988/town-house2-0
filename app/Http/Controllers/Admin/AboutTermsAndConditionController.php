<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutTermsAndConditionController extends BaseController
{
    public function index(){
    	$terms = About::where('type', 'TERMS & CONDITIONS')->get();
    	return view('admin.about.terms.index', compact('terms'));
    	// dd($blogSpots);
    }

    public  function create(){
    	return view('admin.about.terms.create');
    }

    public function store(Request $request){
	    $validator = Validator::make($request->all(), [
		    'title' => 'required|max:55',
		    'category' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $blogSpot = new About;
	    $blogSpot->type = 'TERMS & CONDITIONS';
	    $blogSpot->title = $request->title;
	    $blogSpot->category = $request->category;

	    if($blogSpot->save()){
	        toastr()->success('Terms and condition created successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in creating terms and condition!');                 

	    	return redirect()->back();
	    }
    }

    public function edit($id){
    	$term = About::findOrFail($id);
    	return view('admin.about.terms.edit', compact('term'));
    }

    public function update(Request $request, $id){
	    $validator = Validator::make($request->all(), [
		    'title' => 'required|max:55',
		    'category' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $term = About::findOrFail($id);
	    $term->type = 'TERMS & CONDITIONS';
	    $term->title = $request->title;
	    $term->category = $request->category;

	    if($term->save()){
	        toastr()->success('Terms and condition updated successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in updating Terms and condition!');                 

	    	return redirect()->back();
	    }
    } 

    public function destroy($id){
    	$term = About::findOrFail($id);
    	if($term->delete()){
	        toastr()->success('Terms and condition deleted successfully!');                 
	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in deleting Terms and condition!');                 
	    	return redirect()->back();
	    }
    }
}
