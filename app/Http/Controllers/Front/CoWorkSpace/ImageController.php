<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsPhoto;
use App\Models\Cws;
use App\Models\CwsCompletedTab;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class ImageController extends BaseController
{
	public function store(Cws $cws, Request $request){  


        $image_name = '';
        
        $fileName = time().Str::random(5).'.'.'jpeg';
        //Upload images
        $imageArray = $cws->images;
        if($request->image){
            $image = Image::make($request->image);
            $image->save(public_path('/img/cowork/'.$fileName));
            array_push($imageArray['all'], $fileName);
        } 
        $cws->images = $imageArray;
        $cws->save();
        return response()->json(['success' => 'true', 'status' => 'success', 'coWorkSpacePhotoId' => $fileName, 'photoType' => 'all', 'all' => $cws->images['all']]);
        //End of uploading images

        // $images = $cws->images;
        // if($request->type == 'cover'){
        // 	$images['cover'] = $image_name;
        // }elseif($request->type == 'banner'){
        // 	$images['banner'] = $image_name;
        // }elseif($request->type == 'all'){
        // 	$images['all'] = $images['all'].','.$image_name;
        // }elseif($request->type == 'desk'){
        // 	$images['desk'] = $images['desk'].','.$image_name;
        // }elseif($request->type == 'meeting_room'){
        // 	$images['meeting_room'] = $images['meeting_room'].','.$image_name;
        // }elseif($request->type == 'private_office'){
        // 	$images['private_office'] = $images['private_office'].','.$image_name;
        // }
	}
}