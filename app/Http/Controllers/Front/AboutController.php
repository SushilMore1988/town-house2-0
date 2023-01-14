<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Session;

class AboutController extends Controller
{
    public function index(){
    	$blogSpots = About::where('type', 'TH2-0 BLOGSPOT')->get();
    	$teams = About::where('type', 'TEAM TH2-0')->get();
    	$stories = About::where('type', 'THE STORY BEHIND')->get();
    	$terms = About::where('type', 'TERMS & CONDITIONS')->get();
		Session::put('active_page', 'about');
    	return view('front.about.index', compact('blogSpots', 'teams', 'stories', 'terms'));
    }
}
