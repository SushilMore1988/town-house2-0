<?php

namespace App\Http\Controllers\Admin;

use App\Models\PriceSetting;
use App\Models\ServiceCharges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tax;

class PriceSettingController extends BaseController
{
    public  function index(){
    	$priceSettings =  PriceSetting::get();
        $taxes = Tax::all();
        $serviceCharges = ServiceCharges::first();
    	return view('admin.price-setting.index', compact('priceSettings', 'taxes', 'serviceCharges'));
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'type' => 'required',
            'price' => 'required'
        ]);
         if ($validator->fails()) { 
         	$validator->errors()->add('from', 'createModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $priceSetting = new PriceSetting;
        $priceSetting->type = $request->type;
        $priceSetting->price = $request->price;

        if($priceSetting->save()){
			return redirect()->back()->with('message','Price added successfully');

    	}else{
			return redirect()->back()->with('error','Error in adding price!');

    	}
    }

    public function update(Request $request){ 
    	$validator = Validator::make($request->all(), [
            'type' => 'required',
            'price' => 'required'
        ]);
         if ($validator->fails()) { 
         	$validator->errors()->add('from', 'editModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $priceSetting = PriceSetting::findOrFail($request->price_setting_id);
        $priceSetting->type = $request->type;
        $priceSetting->price = $request->price;

        if($priceSetting->save()){
			return redirect()->back()->with('message','Price updated successfully');

    	}else{
			return redirect()->back()->with('error','Error in updating price!');

    	}
    }

    public function destroy($id){
    	$priceSetting = PriceSetting::findOrFail($id);
    	if($priceSetting->delete()){
			return redirect()->back()->with('message','Price deleted successfully');

    	}else{
			return redirect()->back()->with('error','Error in deleting price!');

    	}
    } 

}
