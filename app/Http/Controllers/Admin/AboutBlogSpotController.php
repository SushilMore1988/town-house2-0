<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutBlogSpotController extends BaseController
{
    public function index(){
    	$blogSpots = About::where('type', 'TH2-0 BLOGSPOT')->get();
    	return view('admin.about.blogspot.index', compact('blogSpots'));
    	// dd($blogSpots);
    }

    public  function create(){
    	return view('admin.about.blogspot.create');
    }

    public function store(Request $request){
	    $validator = Validator::make($request->all(), [
		    'title' => 'required|max:55',
		    'written_by' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $blogSpot = new About;
	    $blogSpot->type = 'TH2-0 BLOGSPOT';
	    $blogSpot->title = $request->title;
	    $blogSpot->written_by = $request->written_by;

	    if($blogSpot->save()){
	        toastr()->success('Blog spot created successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in creating blog spot!');                 

	    	return redirect()->back();
	    }
    }

    public function edit($id){
    	$blogSpot = About::findOrFail($id);
    	return view('admin.about.blogspot.edit', compact('blogSpot'));
    }

    public function update(Request $request, $id){
	    $validator = Validator::make($request->all(), [
		    'title' => 'required|max:55',
		    'written_by' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $blogSpot = About::findOrFail($id);
	    $blogSpot->type = 'TH2-0 BLOGSPOT';
	    $blogSpot->title = $request->title;
	    $blogSpot->written_by = $request->written_by;

	    if($blogSpot->save()){
	        toastr()->success('Blog spot updated successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in updating blog spot!');                 

	    	return redirect()->back();
	    }
    } 

    public function destroy($id){
    	$blogSpot = About::findOrFail($id);
    	if($blogSpot->delete()){
	        toastr()->success('Blog spot deleted successfully!');                 
	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in deleting blog spot!');                 
	    	return redirect()->back();
	    }
    }
}
