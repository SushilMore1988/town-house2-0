<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends BaseController
{
    public function show($code){
    	$promoCode = PromoCode::whereRaw('UPPER(`code`) LIKE ?', $code)->where('status', 'Active')->where('code_for', 'cws_booking')->first();
    	if($promoCode){
    		return response()->json(['status' => 'success', 'msg' => 'Promo code matched successfully!', 'discount_type' => $promoCode->discount_type, 'discount' => $promoCode->discount, 'code' => $promoCode->code]);
    	}else{
    		return response()->json(['status' => 'error', 'msg' => 'Promo code does not match!']);
    	}
    }
}
