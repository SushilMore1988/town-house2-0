<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\Cws;
use App\Models\AdminCwsRating;
use App\Models\CwsRatingType;
use Illuminate\Support\Facades\Validator;

class RatingController extends BaseController
{
	public function store(Request $request){
		
        $validator = Validator::make($request->all(),[
			'coWorkSpaceId' => 'required',
        ]);
        if ($validator->fails()) {
            $validator->errors();
            return response()->json($validator->errors());
        }

        $admin_rating = 0;

        $ratings = AdminCwsRating::where('cws_id',$request->coWorkSpaceId)->get();
        foreach($ratings as $rating)
        {
        	$rating->delete();
        }
		for( $i = 0; $i < count($request->ratingType_ids); $i++){
			$coWorkSpaceRating 						= new AdminCwsRating;
			$coWorkSpaceRating->cws_id 	= $request->coWorkSpaceId;
			$coWorkSpaceRating->rating_type			= $request->ratingType_ids[$i];
			$coWorkSpaceRating->rating 				= $request->rating_value[$i];
			$coWorkSpaceRating->save();

			$admin_rating +=  $request->rating_value[$i];
		}
		if($coWorkSpaceRating){
			$coWorkSpaceRatingType = CwsRatingType::get();
			$admin_rating = round(($admin_rating/count($coWorkSpaceRatingType) / 2),1);
			$coWorkSpace = Cws:: findOrFail($request->coWorkSpaceId);
			$coWorkSpace->admin_rating = $admin_rating ; 
			$coWorkSpace->save();
			return response()->json(['message'=>'Rated Successfully!!!','status'=>true]);
		}
		else{
			return response()->json(['error'=>'Error occured while rating!!!','status'=>false]);
		}
	}
}