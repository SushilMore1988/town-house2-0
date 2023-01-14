<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Explore;

use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\CwsRatingType;
use App\Models\CwsExperience;
use App\Models\Tax;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
	public function index($slug){

		$coWorkSpace = Cws::where('slug',$slug)->first();
		views($coWorkSpace)->unique()->record();
		$ratingTypes = CwsRatingType::all();
		$tax = Tax::where('name', 'GST')->first();
		return view('front.cowork.explore.index',compact('coWorkSpace','ratingTypes', 'tax'));
	}

	public function ajax_like(Request $request,$id){
		$experience = CwsExperience::findOrFail($id);
		$experience->like = $request->like_count;
		$experience->save();
	}

	public function ajax_dislike(Request $request,$id){
		$experience = CwsExperience::findOrFail($id);
		$experience->dislike = $request->dislike_count;
		$experience->save();
	}
	public function availabilitySuccess(){
		return view('front.cowork.explore.availability-success');
	}
}