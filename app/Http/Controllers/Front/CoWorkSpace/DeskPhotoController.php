<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Http\Controllers\Controller;
use App\Models\Cws;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class DeskPhotoController extends BaseController
{
    public function store(Cws $cws, Request $request){
    	$imageArray = $cws->images;
        if($request->image){
            $image = Image::make($request->image);
            $fileName = time().Str::random(5).'.'.'jpeg';
            $image->save(public_path('/img/cowork/'.$fileName));
            array_push($imageArray['desk'], $fileName);
        } 
        $cws->images = $imageArray;
        $cws->save();
        return response()->json(['success' => 'true', 'status' => 'success', 'desk' => $cws->images['desk']]);
    }
}
