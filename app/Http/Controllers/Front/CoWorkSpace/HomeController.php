<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    public function index()
    {   
        Session::put('active_page', 'co-work');
        $coWorkSpaces = Cws::where('is_approved', 1)->where('status', config('constant.CO_WORK.STATUS.PUBLISED'))->where('admin_status', 'Active')->take(9)->get();
        $coWorkSpaces = $coWorkSpaces->filter(function($model){
            return $model->isPricingSet == true;
        });
        return view('front.cowork.index',compact('coWorkSpaces'));
    }
}