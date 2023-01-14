<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class TownHouseController extends Controller
{
	public function index(){
		Session::put('active_page', 'th2.0');
		return view('errors.404');
	}
}
