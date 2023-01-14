<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use App\Models\Package;
use App\Models\PackagePoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends BaseController
{
    public function index(){
    	
        $packages = Package::orderBy('created_at', 'desc')->get();
    	return view('admin.packages.cws.index', compact('packages'));
    }

    public function create(){
        $fields = PackagePoint::where('package_type', 'Listing')->get();
    	return view('admin.packages.cws.create', compact('fields'));
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'amount_text' => 'required',
            // 'color' => 'required',
            // 'description' => 'required',
            'package_type' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rentPackage = new Package;
        $rentPackage->name = $request->name;
        $rentPackage->package_type = $request->package_type;
        $rentPackage->description = $request->description;
        $rentPackage->text_below_name = $request->text_below_name;
        $rentPackage->is_popular = $request->is_popular;
        $rentPackage->order_number = $request->order_number;
        $rentPackage->amount = $request->amount;
        $rentPackage->currency = "INR";
        $rentPackage->amount_text = $request->amount_text;
        $rentPackage->color = $request->color;
        $rentPackage->status = $request->status;
        
        if($rentPackage->save()){
            // $fields = PackagePoint::where('package_type', ucfirst($request->package_type))->get();
            // foreach($fields as $field)
            // {
            //     $rentPackageFieldValue = new RentPackageFieldValue();
            //     $rentPackageFieldValue->rent_package_id = $rentPackage->id;
            //     $rentPackageFieldValue->rent_package_field_id = $field->id;
            //     $rentPackageFieldValue->value = $request->{'field_'.$field->id};
            //     $rentPackageFieldValue->save();
            // }
        	return redirect()->back()->with('success','true')->with('msg', 'Package added successfully!');
        }else{
        	return redirect()->back()->with('error','true')->with('msg', 'Error in adding package!');
        }
    }

    public function edit(Request $requset, $id){
    	$rentPackage = Package::findOrFAil($id);
        $fields = PackagePoint::where('package_type', $rentPackage->package_type)->get();
    	return view('admin.packages.cws.edit', compact('rentPackage', 'fields'));
    }

    public function update(Request $request, $id){
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'amount_text' => 'required',
            // 'color' => 'required',
            // 'description' => 'required',
            'package_type' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$rentPackage = Package::findOrFAil($id);
    	$rentPackage->name = $request->name;
        $rentPackage->amount = $request->amount;
        $rentPackage->duration = $request->duration;
        $rentPackage->text_below_name = $request->text_below_name;
        $rentPackage->is_popular = $request->is_popular;
        $rentPackage->currency = "INR";
        $rentPackage->amount_text = $request->amount_text;
        $rentPackage->order_number = $request->order_number;
        // $rentPackage->color = $request->color;
        $rentPackage->package_type = $request->package_type;
        // $rentPackage->description = $request->description;
        $rentPackage->status = $request->status;
        
        if($rentPackage->save()){

            // $fields = RentPackageField::where('package_type', ucfirst($request->package_type))->get();
            // foreach($fields as $field)
            // {
            //     $rentPackageFieldValue = RentPackageFieldValue::where('rent_package_id', $rentPackage->id)->where('rent_package_field_id', $field->id)->first();
            //     if(!$rentPackageFieldValue){
            //         $rentPackageFieldValue = new RentPackageFieldValue();
            //     }
            //     $rentPackageFieldValue->rent_package_id = $rentPackage->id;
            //     $rentPackageFieldValue->rent_package_field_id = $field->id;
            //     $rentPackageFieldValue->value = $request->{'field_'.$field->id};
            //     $rentPackageFieldValue->save();
            // }


        	return redirect()->back()->with('success','true')->with('msg', 'Package updated successfully!');
        }else{
        	return redirect()->back()->with('error','true')->with('msg', 'Error in updating package!');
        }

    }

     public function destroy($id){
        $rentPackage = Package::findOrFAil($id);

        if($rentPackage->delete()){
            return redirect()->back()->with('success','true')->with('msg', 'Package deleted successfully!');
        }else{
            return redirect()->back()->with('error','true')->with('msg', 'Error in deleted package!');
        }
    }
}