<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsPhoto;
use App\Models\Cws;
use App\Models\CompletedTab;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class PhotoCoWorkSpaceController extends BaseController
{
	public function store(Request $request)
	{ 
		$validator = Validator::make($request->all(), [
            'image'  =>    'required',
            //'fileName'     =>    'required',
            'photoType'    =>    'required',
            'id'=>     'required'          
        ]);

        if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }

        $photo = new CwsPhoto;
        $photo->co_work_space_id = $request->id;
        $image = Image::make($request->image);
        $fileName = time().Str::random(5).'.'.'jpeg';
        $image->save(public_path('/img/cowork/'.$fileName));
        $photo->photo = $fileName;  
        $photo->type = $request->photoType;
        $photo->save();

         $completed_tab = CompletedTab::where('co_work_space_id',$request->id)
                                     ->where('tab_name','photo')->first();
        if($completed_tab){
            $completed_tab->value = $completed_tab->value ;
        }
        else{
            $completed_tab = new CompletedTab;
            $completed_tab->co_work_space_id = $request->id;
            $completed_tab->tab_name = 'photo';
            $completed_tab->value = 10;
            $completed_tab->save();
            $co_work_space = Cws::findOrFail($request->id);
            $co_work_space->progress_percent = $completed_tab->where('co_work_space_id',$request->id)->sum('value');
             $co_work_space->save();
         }
		return response()->json(['status'=>'success', 'coWorkSpacePhotoId' => $photo->id]);
	}

	public function destroy(Request $request){ 
        $validator = Validator::make($request->all(), [
            'cws_id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $cws = Cws::findOrFail($request->cws_id);
        $imageArray = [];
        if(!empty($cws->images)){
            $imageArray = $cws->images;
        }
        $newImageArray = array_diff($imageArray[$request->type], [$request->name]);
        $imageArray[$request->type] = $newImageArray;
        $cws->images = $imageArray;

		// $photo =  CwsPhoto::where('id', $req->imageId)->first();
		// unlink(public_path().'/img/cowork/'.$photo->photo);

		if($cws->save()){
            return response()->json(['status'=>'success']);
        }
        else{
           return response()->json(['status'=>'fail']);
        }
	}

    public function storeCoverImage(Request $request){        
        $co_work_space = Cws::findOrFail($request->id);
        if($co_work_space->cover_image != null){
            if(file_exists(public_path().'/img/cowork/cover/'.$co_work_space->cover_image)){
                unlink(public_path().'/img/cowork/cover/'.$co_work_space->cover_image);
            }
        }

        $image = Image::make($request->image);
        $fileName = time().Str::random(5).'.'.'jpeg';
        $image->save(public_path('/img/cowork/cover/'.$fileName));
        $co_work_space->cover_image = $fileName;
        if($co_work_space->save()){
            return response()->json(['status'=>'success']);
        }
        else
            return response()->json(['status'=>'failed']);
    }
}