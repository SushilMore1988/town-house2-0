<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserVerificationController extends BaseController
{
    public function index(){
    	$userVerifications =  User::all();
    	return view('admin.user.verification',compact('userVerifications'));
    }

    public function changeStatus(Request $request, $status, $id, $type){
    	$user = User::findOrFail($id);
		$imageArray =$user->images;
		if($type == 'selfie'){
			//modify selfie status
			$imageArray[$type]['is_approved'] = $status;
    		$user->images = $imageArray;
		}
		else if($type == 'government_id1'){
			//modify gov id 1 status
			$imageArray['government_id'][0]['is_approved'] = $status;
    		$user->images = $imageArray;
		}
    	else if($type == 'government_id2'){
			//modify gov id 2 status
			$imageArray['government_id'][1]['is_approved'] = $status;
    		$user->images = $imageArray;
		}
		
    	$user->save();

    	return response()->json(['success' => true, 'message' => 'success']);
    }
}
