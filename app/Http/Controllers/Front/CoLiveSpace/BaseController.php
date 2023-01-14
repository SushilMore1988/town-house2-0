<?php

namespace App\Http\Controllers\Front\CoLiveSpace;

use App\Http\Controllers\Controller;
use Session;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	Session::put('active_page', 'about');
         $this->middleware('auth');   
    }

}
