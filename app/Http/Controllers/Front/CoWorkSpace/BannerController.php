<?php
namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\CwsCompletedTab;
use App\Models\Cws;
use File;
use Illuminate\Http\Request;


class BannerController extends BaseController
{
	public function store(Cws $cws, Request $request){
        $oldFile = null;
        if($cws->images != null && $cws->images['banner'] != null){
        	$oldFile = public_path('/img/cowork/banner/'.$cws->images['banner']);
        }

        if(File::exists($oldFile)){
            File::delete($oldFile);
        }
        $imageArray = $cws->images;
        if($request->file('image')){
            $image = $request->file('image');
            $new_name = 'banner_'.time() . '.jpeg';
            $image->move(public_path('img/cowork/banner/'), $new_name);
	        $imageArray['banner'] = $new_name;
        }
        $cws->images = $imageArray;
        $cws->save(); 

        $completed_tab = CwsCompletedTab::where('cws_id',$cws->id)
                                    ->where('tab_name','photo')->first();
       if($completed_tab){
           $completed_tab->value = $completed_tab->value ;
       }
       else{
           $completed_tab = new CwsCompletedTab;
           $completed_tab->cws_id = $cws->id;
           $completed_tab->tab_name = 'photo';
           $completed_tab->value = 10;
           $completed_tab->save();
           $co_work_space = Cws::findOrFail($cws->id);
           $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws->id)->sum('value');
            $co_work_space->save();
        }             

        return response()->json(['success' => 'true', 'status' => 'success', 'message' => 'Image uploaded successfully.','banner' => $cws->images['banner']]);
	}
}