<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

}