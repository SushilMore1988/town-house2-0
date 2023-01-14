<?php

namespace App\Http\Controllers\Front\CoLiveSpace;
use Session;
use \App\Http\Controllers\Controller;
/*
    Name:Varsha
    Date:05/1/2020
    Description: The HomeController class is used to show co live home page
*/

class HomeController extends Controller
{
	public function __construct(){
		Session::put('active_page', 'co-live');
	}
	/**
	*	
	*	return - returns view for the co live home page. this page will gets display without 
	*	login authentication is not required.
	**/
	public function index(){
		Session::put('active_page', 'co-live');
		return view('front.colive.home');
	}

	public function personalise(){
		return view('front.colive.personalise.index');
	}
}