<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClsAmenityCategory;
use App\Models\ClsAmenityValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\FuncCall;

class AmenityController extends BaseController
{
    public function index()
    {
        $amenities = ClsAmenityValue::all();
        return view('admin.amenity.index', compact('amenities'));
    }

    public function create()
    {
        $clsAmenityCategories = ClsAmenityCategory::all();
        return view('admin.amenity.create', compact('clsAmenityCategories'));
    }

    public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'amenity_category' => 'required|exists:cls_amenity_categories,id',
            'amenity_name' => 'required|min:2|max:50',
            'rating_category' => 'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','amenity not created, error occur');
        }

		$amenity = new ClsAmenityValue();
		$amenity->cls_amenity_category_id = $request->amenity_category ;
		$amenity->value = $request->amenity_name ;
		$amenity->rating_category = $request->rating_category ;

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
        	if (!in_array($fileMimeType, $resizableMimeTypes)) {
	            $file->move(public_path('/img/amenity/'),$fileName);
	        } else {
            	$image = Image::make($file);
        		$image->save(public_path('/img/amenity/'.$fileName));
            }
        	$amenity->icon_image = $fileName;  
    	}
        if($amenity->save()){
			return redirect()->back()->with('message','Amenity created successfully');
		}else{
			return redirect()->back()->with('error','Amenity not created, error occur');
		}
	}

    public function edit(ClsAmenityValue $clsAmenityValue)
    {
        $clsAmenityCategories = ClsAmenityCategory::pluck('name', 'id');
        return view('admin.amenity.edit', compact('clsAmenityValue', 'clsAmenityCategories'));
    }

    public function update(Request $request, ClsAmenityValue $clsAmenityValue){
		$validator = Validator::make($request->all(), [
            'amenity_category' => 'required|exists:cls_amenity_categories,id',
            'amenity_name' => 'required|min:2|max:50',
            'rating_category' => 'required',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','amenity not updated, error occur');
        }

		$clsAmenityValue->cls_amenity_category_id = $request->amenity_category ;
		$clsAmenityValue->value = $request->amenity_name ;
		$clsAmenityValue->rating_category = $request->rating_category ;

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
        	if (!in_array($fileMimeType, $resizableMimeTypes)) {
	            $file->move(public_path('/img/amenity/'),$fileName);
	        } else {
            	$image = Image::make($file);
        		$image->save(public_path('/img/amenity/'.$fileName));
            }
        	$clsAmenityValue->icon_image = $fileName;  
    	}
        if($clsAmenityValue->save()){
			return redirect()->back()->with('message','Amenity updated successfully');
		}else{
			return redirect()->back()->with('error','Amenity not updated, error occur');
		}
	}

    public function destroy(ClsAmenityValue $clsAmenityValue){
        if($clsAmenityValue->delete()){
            return redirect()->back()->with('message','Amenity deleted successfully');
        }else{
            return redirect()->back()->with('error','Amenity not deleted, error occur');
        }
    }
}