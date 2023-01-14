<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends BaseController
{
    public function profileImage(Request $request){
        $profileImage = null;
        $oldFile = null;
        $imageArray = array();
        $user = User::where('id', Auth::id())->first();
        if($user->images != null){
            $profileImage = $user->images['profile_image']['name'];
            $imageArray = $user->images;
        }
        if(!empty($profileImage)){
            $oldFile = public_path('/img/user/profile-image/'.$profileImage); 
        }
        if($request->file('profile-image')){
            $image = $request->file('profile-image');
            $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/profile-image/'), $new_name);
            $imageArray['profile_image']['name'] = $new_name;
            $user->images = $imageArray;
            if(File::exists(public_path('img/user/profile-image/'.$new_name))) {
                if($oldFile != null && File::exists($oldFile)){
                    File::delete($oldFile);
                }
                $user->save();
                return response()->json(['success' => 'true', 'status' => 'success']);
            }else{
                return response()->json(['success' => 'false', 'status' => 'success']);
            }
        }
    }

    public function selfieImage(Request $request){
        $oldFile = null;
        $user = User::where('id', Auth::id())->first();
        $selfieImage = $user->images['selfie']['name'];
        // $selfieImage = $user->selfie_image;
        $imageArray = $user->images;
        if($selfieImage){
            $oldFile = public_path('/img/user/selfie/'.$selfieImage); 
        }
        if($request->file('selfie-image')){
            $image = $request->file('selfie-image');
            $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/selfie/'), $new_name);
            $imageArray['selfie']['name'] = $new_name;
            $imageArray['selfie']['is_approved'] = "Pending Approval";
            $user->images = $imageArray;
            // $user->selfie_image = $new_name;
            if(File::exists(public_path('img/user/selfie/'.$new_name))) {
                if($oldFile != null && File::exists($oldFile)){
                    File::delete($oldFile);
                }
                $user->save();
                return response()->json(['success' => 'true', 'status' => 'success']);
            }else{
                return response()->json(['success' => 'false', 'status' => 'success']);
            }
        }
    }

    public function governmentId(Request $request){
        $oldFile1 = $oldFile2 = null;
        $user = User::where('id', Auth::id())->first();
        $governmentId0 = empty($user->images['government_id'][0]['name']) ? '' : $user->images['government_id'][0]['name'];
        $governmentId1 = empty($user->images['government_id'][1]['name']) ? '' : $user->images['government_id'][1]['name'];
        $imageArray = $user->images;
        if($governmentId0){
            $oldFile1 = public_path('/img/user/government-id/'.$governmentId0); 
        }
        if($governmentId1){
            $oldFile2 = public_path('/img/user/government-id/'.$governmentId1); 
        }

        //upload first document
        if($request->file('government-id1')){
            $image = $request->file('government-id1');
            $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/government-id/'), $new_name);
            $imageArray['government_id'][0]['name'] = $new_name;
            $imageArray['government_id'][0]['is_approved'] = "Pending Approval";
            $user->images = $imageArray;
            // $user->government_id = $new_name;
            if(File::exists(public_path('img/user/government-id/'.$new_name))) {
                if($oldFile1 != null && File::exists($oldFile1)){
                    File::delete($oldFile1);
                }
                $user->save();
                return response()->json(['success' => 'true', 'status' => 'success']);
            }else{
                return response()->json(['success' => 'false', 'status' => 'success']);
            }
        }

         //upload second document
         if($request->file('government-id2')){
            $image = $request->file('government-id2');
            $new_name = time().Auth::id() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/government-id/'), $new_name);
            $imageArray['government_id'][1]['name'] = $new_name;
            $imageArray['government_id'][1]['is_approved'] = "Pending Approval";
            $user->images = $imageArray;
            // $user->government_id = $new_name;
            if(File::exists(public_path('img/user/government-id/'.$new_name))) {
                if($oldFile2 != null && File::exists($oldFile2)){
                    File::delete($oldFile2);
                }
                $user->save();
                return response()->json(['success' => 'true', 'status' => 'success']);
            }else{
                return response()->json(['success' => 'false', 'status' => 'success']);
            }
        }
    }

    public function ajaxDeleteGovernmentId(Request $request){
        $user = User::where('id', Auth::id())->first();
        $govDocNo = $request->govDocNo;
        $governmentId = $user->images['government_id'][$govDocNo]['name'];

        $imageArray = $user->images;
        $imageArray['government_id'][$govDocNo]['name'] = null;
        $imageArray['government_id'][$govDocNo]['is_approved'] = null;

        $user->images = $imageArray;
        if($governmentId){
            $oldFile = public_path('/img/user/government-id/'.$governmentId); 
        }
        
        $user->save();

        if($oldFile != null && File::exists($oldFile)){
            File::delete($oldFile);
            
            return response()->json(['success' => 'true', 'status' => 'success']);
        }
        else{
            return response()->json(['success' => 'false', 'status' => 'success']);
        }
    }

    public function ajaxDeletePhotoId(Request $request){
        $user = User::where('id', Auth::id())->first();
        $photoId = $user->images['selfie']['name'];

        $imageArray = $user->images;
        $imageArray['selfie']['name'] = null;
        $imageArray['selfie']['is_approved'] = null;

        $user->images = $imageArray;
        if($photoId){
            $oldFile = public_path('/img/user/government-id/'.$photoId); 
        }
        
        $user->save();

        if($oldFile != null && File::exists($oldFile)){
            File::delete($oldFile);
            
            return response()->json(['success' => 'true', 'status' => 'success']);
        }
        else{
            return response()->json(['success' => 'false', 'status' => 'success']);
        }
    }
}
