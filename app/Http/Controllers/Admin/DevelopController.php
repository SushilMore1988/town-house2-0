<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DevelopYourProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DevelopController extends BaseController
{
    public function index(){
    	$develops = DevelopYourProperty::all();
    	return view('admin.develop.index', compact('develops'));
    }

    public function feedback(Request $request){
		$validator = Validator::make($request->all(), [
            'feedback'  => 'required|max:500'
        ]);

        if ($validator->fails()) {
        	$validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $develop = DevelopYourProperty::findOrFail($request->develop_id);

        $feedbackArray = $develop->feedback;

        // $feedbackArray['feedback'] = $request->feedback;
        // $feedbackArray['date'] = date('d-m-yy');

        array_push( $feedbackArray['feedback'],  $request->feedback);
        array_push( $feedbackArray['date'], date('d-m-yy'));


        $develop->feedback = $feedbackArray;
        if($develop->save()){
        	return redirect()->back()->with('message', 'Feedback added successfully');
        }
    }
}
