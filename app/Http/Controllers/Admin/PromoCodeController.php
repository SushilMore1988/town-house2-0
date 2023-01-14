<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class PromoCodeController extends BaseController
{
	/**
     * Display a listing of the promo codes.
     *
     * @return view
     */
	public function index(){
		$promoCodes = PromoCode::all();
		return view('admin.promo-code.index', compact('promoCodes'));
	}

	/**
     * Show the form for creating a new promo code.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.promo-code.create');
    }

    /**
     * Store a newly created promo code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
    	    'code' => 'required',
    	    'code_for' => 'required',
            'discount_type' => 'required',
            'discount' => 'required|numeric',
            'status' => 'required',
    	]);
    	if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $promoCode = new PromoCode;
        $promoCode->code = $request->code;
        $promoCode->code_for = $request->code_for;
        $promoCode->discount_type = $request->discount_type;
        $promoCode->discount = $request->discount;
        $promoCode->status = $request->status;
        if($promoCode->save()){
            toastr()->success('Promo code created successfully!');                 

        	return redirect()->back();
        }else{
            toastr()->error('Error in creating promo code!');                 

        	return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified promo code.
     *
     * @param  PromoCode $promoCode
     * @return view
     */
    public function edit(PromoCode $promoCode)
    {
        return view('admin.promo-code.edit', compact('promoCode'));
    }

    /**
     * Update the specified promo code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PromoCode $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'code_for' => 'required',
            'discount_type' => 'required',
            'discount' => 'required|numeric',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $promoCode->code = $request->code;
        $promoCode->code_for = $request->code_for;
        $promoCode->discount_type = $request->discount_type;
        $promoCode->discount = $request->discount;
        $promoCode->status = $request->status;
        if($promoCode->save()){
            toastr()->success('Promo code updated successfully!');                 

            return redirect()->back();
        }else{
            toastr()->error('Error in updating promo code!');                 

            return redirect()->back();
        }
    }

    /**
     * Remove the specified promo code from storage.
     *
     * @param  PromoCode $promoCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoCode $promoCode)
    {
        if($promoCode->delete()){
            toastr()->success('Promo code deleted successfully!');                 

            return redirect()->back();
        }else{
            toastr()->success('Error in deleting promo code!');                 

            return redirect()->back();
        }
    }
}
