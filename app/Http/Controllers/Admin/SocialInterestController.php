<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialInterestController extends BaseController
{
    public function index()
    {
        $professionalInterests = SocialInterest::all();
        return view('admin.social-interest.index', compact('professionalInterests'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50|unique:social_interests'
        ]);
        if ($validator->fails()) { 
            $validator->errors()->add('from', 'createModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $professionalInterest = new SocialInterest();
        $professionalInterest->name = $request->name;
        if($professionalInterest->save()){
            return redirect()->back()->with('success', 'Social Interest created successfully.');
        }else{
            return redirect()->back()->with('error', 'Error in creating Social Interest.')->with('createModal', true);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professional_interest_id' => 'required|exists:social_interests,id',
            'name' => 'required|min:2|max:50|unique:social_interests,name,'.$request->professional_interest_id
        ]);
        if ($validator->fails()) { 
            $validator->errors()->add('from', 'editModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $professionalInterest = SocialInterest::findOrFail($request->professional_interest_id);
        $professionalInterest->name = $request->name;
        if($professionalInterest->save()){
            return redirect()->back()->with('success', 'Social Interest updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Error in updating Social Interest.')->with('editModal', true);
        }
    }
}