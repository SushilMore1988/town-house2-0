<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DevelopYourProperty;

class DevelopController extends BaseController
{
    public function index(){
        \Session::put('active_page', 'develop');
    	return view('front.develop.index');
    }

    public function create(){
        \Session::put('active_page', 'develop');
    	return view('front.develop.create');
    }

    public function store(Request $request){
        \Session::put('active_page', 'develop');
    	$validator = Validator::make($request->all(), [
    	    'name' => 'required',
    	    'email' => 'required',
    	    'phone' => 'required|numeric',
    	    'city' => 'required',
    	    'role' => 'required',
    	    'service' => 'required',
    	    'address' => 'required',
    	    'pincode' => 'required|numeric|digits:6', 
    	]);
    	if ($validator->fails()) {
    	    return redirect()->back()->withInput()->withErrors($validator);
    	} 

        

    	$property = new DevelopYourProperty;
    	$property->name = $request->name;
    	$property->email = $request->email;
    	$property->phone = $request->phone;
    	$property->city = $request->city;
    	$property->role = $request->role;
        $property->feedback = [ 'feedback' => [], 'date' => []];
        
    	$property->service = $request->service;
    	$property->address = $request->address;
    	$property->pincode = $request->pincode;

    	if($property->save()){
    	    return view('front.develop.thank-you');
    	}else{
    	    return redirect()->back()->with('error','true')->with('msg', 'Error in adding property!');
    	}

    }

    public function thankYou(){
        \Session::put('active_page', 'develop');
        return view('front.develop.thank-you');
    }
}
