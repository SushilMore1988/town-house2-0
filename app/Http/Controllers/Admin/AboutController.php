<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function index(){
    	$abouts = About::all();
    	return view('admin.about.index');
    }
}
