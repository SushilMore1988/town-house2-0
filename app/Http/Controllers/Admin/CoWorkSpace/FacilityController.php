<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use App\Models\CwsFacilityCategory;
use App\Models\CwsFacilityCategoryValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class FacilityController extends BaseController
{
	/**
	*	This function is used to save CwsFacilityCategory, CwsFacilityCategoryValue
	*
	* @param void
	*
	* @return $mix
	*/
	public function index()
	{
		$cwsFacilityCategories = CwsFacilityCategory::all();
		return view('admin.facility.create' , compact('cwsFacilityCategories'));
	}

	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'facility_category' => 'required',
            'facility_name' => 'required',
            'rating_category' => 'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','facility not created, error occur');
        }

		$facility = new CwsFacilityCategoryValue;
		$facility->cws_facility_category_id = $request->facility_category ;
		$facility->value = $request->facility_name ;
		$facility->rating_category = $request->rating_category ;

		$resizableMimeTypes = [
	            'image/png',
	            'image/x-png',
	            'image/jpg',
	            'image/jpeg',
	            'image/pjpeg',
	            'image/gif',
	            'image/webp',
	            'image/x-webp'
	        ];
		if( $request->file('icon')){
			$file = $request->file('icon');
        	$fileName = time().'.'.$file->getClientOriginalExtension();
            $fileMimeType = $file->getMimeType();
        	// $image = Image::make($file);
        	// $image->save(public_path('/img/cowork/facility-icon/'.$fileName));
        	if (!in_array($fileMimeType, $resizableMimeTypes)) {
	            $file->move(public_path('/img/cowork/facility-icon/'),$fileName);
	        } else {
            	$image = Image::make($file);
        		$image->save(public_path('/img/cowork/facility-icon/'.$fileName));
            }
        	$facility->icon_image = $fileName;  
    	}
    	else{
    		$facility->icon_image = $facility->icon_image ;
    	}
        $facility->save();

		if($facility){
			return redirect()->back()->with('message','facility created successfully');
		}
		else{
			return redirect()->back()->with('error','facility not created, error occur');
		}
	}

	/**
	*	This function is used to save CwsFacilityCategory, CwsFacilityCategoryValue
	*
	* @param Illuminate\Http\Request
	*
	* @return $mix
	*/
	public function update(Request $request)
	{

		$validator = Validator::make($request->all(), [
			// 'category'			=>    'required',
            'facility_name'   	=>    'required',
            'rating_category'    =>    'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','facility not created, error occur');
        }

		$facility = $this->createFacility($request);

		if($facility){
			return redirect()->back()->with('message','facility created successfully');
		}
		else{
			return redirect()->back()->with('error','facility not created, error occur');
		}
	}
	
	/**
	*	This function is used to save CwsFacilityCategory, CwsFacilityCategoryValue
	*
	* @param Illuminate\Http\Request
	*
	* @return $facility,null
	*/
	public function createFacility(Request $request)
	{
			$facility = CwsFacilityCategoryValue::findOrFail($request->facility_id);
			$facility->value 			= $request->facility_name ;
			$facility->rating_category		= $request->rating_category ;
			$resizableMimeTypes = [
	            'image/png',
	            'image/x-png',
	            'image/jpg',
	            'image/jpeg',
	            'image/pjpeg',
	            'image/gif',
	            'image/webp',
	            'image/x-webp'
	        ];
			if( $request->file('icon')){
				$file 						= $request->file('icon');
            	$fileName 					= time().'.'.$file->getClientOriginalExtension();
            	$fileMimeType = $file->getMimeType();
            	if (!in_array($fileMimeType, $resizableMimeTypes)) {
		            $file->move(public_path('/img/cowork/facility-icon/'),$fileName);
		        } else {
	            	$image 						= Image::make($file);
            		$image->save(public_path('/img/cowork/facility-icon/'.$fileName));
	            }
            	$facility->icon_image 		= $fileName;  
        	}
        	else{
        		$facility->icon_image = $facility->icon_image ;
        	}
            $facility->save();
            return $facility;
	}

	/**
	*	This function is used to show the list of CwsFacilityCategoryValue
	*
	* @param void
	*
	* @return $mix
	*/
	public function show()
	{
		$facilities = CwsFacilityCategoryValue::all();
		return view('admin.facility.index',compact('facilities'));
	}

	/**
	*	This function is used to delete CwsFacilityCategoryValue
	*
	* @param $id
	*
	* @return void
	*/
	public function destroy($id)
	{
		$facility = CwsFacilityCategoryValue::findOrFail($id);
		$facility->delete();
		return redirect()->back();
	}

	/**
	*	This function is used to show the list of CwsFacilityCategoryValue
	*
	* @param $id
	*
	* @return $mix
	*/
	public function edit($id)
	{
		$coWorkFacility = CwsFacilityCategoryValue::findOrFail($id);
		return view('admin.facility.edit',compact('coWorkFacility'));
	}



	// public function mainCategoryStore(Request $request)
	// {
	// 	$validator = Validator::make($request->all(), [
	// 		'name'			=>    'required',
 //        ]);
 //         if ($validator->fails()) {
 //            $validator->errors();
 //            return redirect()->back()->withErrors($validator)->withInput()->with('error','facility not created, error occur');
 //        }

 //        $category = new CwsFacilityCategory;
	// 	$category->name = $request->name;
	// 	if($category->save()){
	// 		return redirect()->back()->with('message','Main facility created successfully');
	// 	}
	// 	else{
	// 		return redirect()->back()->with('error','Main facility not created, error occur');
	// 	}
	// }
}