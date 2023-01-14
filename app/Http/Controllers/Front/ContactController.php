<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\ContactMail;
use App\Models\user	;
use Session;

class ContactController extends Controller
{
    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
    	    'name' => 'required',
    	    'email' => 'required',
    	    'phone' => 'required|numeric',
    	    'city' => 'required',
    	    'service' => 'required',
    	]);
    	if ($validator->fails()) { 
    	    return redirect()->route('not.found')->withInput()->withErrors($validator->errors());
    	}
    	$contact = new Contact;
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->phone = $request->phone;
    	$contact->city = $request->city;
    	$contact->service = $request->service;
    	if($contact->save()){
			$contact = [
                        'name' => $request->name, 
                        'city' => $request->city, 
                        'phone' => $request->phone,
                        'email' => $request->email, 
                        'service' => $request->service
                    ];
			User::find(1)->notify(new ContactMail($contact));
    		return redirect()->route('not.found')->with('success', ' Message sent successfully.');
    	}
    	else{
    		return redirect()->route('not.found')->withInput()->with('error', 'Error in sending message!');
    	}
    }

    public function notFound(){
        Session::put('active_page', 'about');
    	return view('errors.404');
    }
}
