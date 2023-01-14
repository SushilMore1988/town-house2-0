<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClsAmenityCategory;
use App\Models\ClsAmenityValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmenityCategoryController extends BaseController
{
    public function index()
    {
        $categories = ClsAmenityCategory::all();
        return view('admin.amenity-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.amenity-category.create');
    }

    public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50|unique:cls_amenity_categories',
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','amenity not created, error occur');
        }

		$clsAmenityCategory = new ClsAmenityCategory();
		$clsAmenityCategory->name = $request->name;
        if($clsAmenityCategory->save()){
			return redirect()->back()->with('message','Amenity created successfully');
		}
		else{
			return redirect()->back()->with('error','Amenity not created, error occur');
		}
	}

    public function edit(ClsAmenityCategory $clsAmenityCategory)
    {
        return view('admin.amenity-category.edit', compact('clsAmenityCategory'));
    }

    public function update(Request $request, ClsAmenityCategory $clsAmenityCategory){
		$validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50|unique:cls_amenity_categories,name,'.$clsAmenityCategory->id,
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput()->with('error','amenity not created, error occur');
        }

		$clsAmenityCategory->name = $request->name;
        if($clsAmenityCategory->save()){
			return redirect()->back()->with('message','Amenity updated successfully');
		}
		else{
			return redirect()->back()->with('error','Amenity not updated, error occur');
		}
	}

    public function destroy(ClsAmenityCategory $clsAmenityCategory){
        ClsAmenityValue::where('cls_amenity_category_id', $clsAmenityCategory->id)->delete();
        if($clsAmenityCategory->delete()){
            return redirect()->back()->with('message','Amenity deleted successfully');
        }else{
            return redirect()->back()->with('error','Amenity not deleted, error occur');
        }
    }
}