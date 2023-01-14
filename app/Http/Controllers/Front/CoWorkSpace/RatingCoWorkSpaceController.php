<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsRating;
use App\Models\CwsRatingType;
use App\Models\CwsExperience;
use Illuminate\Support\Facades\Validator;

class RatingCoWorkSpaceController extends BaseController
{
	public function store(Request $request){ 
		
        $validator = Validator::make($request->all(),[
			'coWorkSpaceId' => 'required',
			'userId'		=> 'required',
			'experience'	=> 'nullable',
        ]);
        if ($validator->fails()) {
            $validator->errors();
            return response()->json($validator->errors());
        }
        $sum_rating = 0;
		$experienceOfCoWorkSpace = new CwsExperience;
		$experienceOfCoWorkSpace->user_id = $request->userId;
		$experienceOfCoWorkSpace->cws_id 	= $request->coWorkSpaceId;
		$experienceOfCoWorkSpace->experience = $request->experience;
		$experienceOfCoWorkSpace->save();

		for( $i = 0; $i < count($request->ratingType_ids); $i++){
			$coWorkSpaceRating = new CwsRating;
			$coWorkSpaceRating->experience_of_cws_id = $experienceOfCoWorkSpace->id;
			$coWorkSpaceRating->rating_type	= $request->ratingType_ids[$i];
			$coWorkSpaceRating->rating = $request->rating_value[$i];
			$sum_rating +=  $request->rating_value[$i];
			$coWorkSpaceRating->save();
		}

		$coWorkSpaceRatingType = CwsRatingType::get();
		$average_rating = round($sum_rating/count($coWorkSpaceRatingType),1) ;
		$experienceOfCoWorkSpace->average_rating = $average_rating;
		$experienceOfCoWorkSpace->save();

		if($coWorkSpaceRating){
			return response()->json(['message'=>'Rated Successfully!!!','lastInsertedReview'=>$coWorkSpaceRating->id,'status'=>true]);
		}
		else{
			return response()->json(['error'=>'Error occured while rating!!!','status'=>false]);
		}

	}
}
