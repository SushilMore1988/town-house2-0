<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutTeamController extends BaseController
{
    public function index(){
    	$team = About::where('type', 'TEAM TH2-0')->get();
    	return view('admin.about.team.index', compact('team'));
    	// dd($blogSpots);
    }

    public  function create(){
    	return view('admin.about.team.create');
    }

    public function store(Request $request){
	    $validator = Validator::make($request->all(), [
		    'name' => 'required|max:55',
		    'attribute' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $member = new About;
	    $member->type = 'TEAM TH2-0';
	    $member->name = $request->name;
	    $member->attribute = $request->attribute;

	    if($member->save()){
	        toastr()->success('Team member added successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in adding team member!');                 

	    	return redirect()->back();
	    }
    }

    public function edit($id){
    	$member = About::findOrFail($id);
    	return view('admin.about.team.edit', compact('member'));
    }

    public function update(Request $request, $id){
	    $validator = Validator::make($request->all(), [
		    'name' => 'required|max:55',
		    'attribute' => 'required:max:55',
		]);
		if ($validator->fails()) {
	        return redirect()->back()->withInput()->withErrors($validator);
	    }

	    $blogSpot = About::findOrFail($id);
	    $blogSpot->type = 'TEAM TH2-0';
	    $blogSpot->name = $request->name;
	    $blogSpot->attribute = $request->attribute;

	    if($blogSpot->save()){
	        toastr()->success('Team member updated successfully!');                 

	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in updating team member!');                 

	    	return redirect()->back();
	    }
    } 

    public function destroy($id){
    	$blogSpot = About::findOrFail($id);
    	if($blogSpot->delete()){
	        toastr()->success('Team member deleted successfully!');                 
	    	return redirect()->back();
	    }else{
	        toastr()->error('Error in deleting team member!');                 
	    	return redirect()->back();
	    }
    }
}
