<?php
namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use File;

class CoverController extends BaseController
{
	public function store(Cws $cws, Request $request){ 
        $oldFile = null;
        if($cws->images != null && $cws->images['cover'] != null){ 
        	$oldFile = public_path('/img/cowork/cover/'.$cws->images['cover']);
        }

        if(File::exists($oldFile)){ 
            unlink($oldFile);
        } 
        $imageArray = $cws->images;
        if($request->image){
            $image = Image::make($request->image);
            $fileName = time().Str::random(5).'.'.'jpeg';
            $image->save(public_path('/img/cowork/cover/'.$fileName));
	        $imageArray['cover'] = $fileName;
        } 
        $cws->images = $imageArray;
        $cws->save();
        return response()->json(['success' => 'true', 'status' => 'success', 'message' => 'Cover image uploaded successfully!!!' , 'cover' => $cws->images['all']]);
	}
}