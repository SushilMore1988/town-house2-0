<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfessionalInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfessionalInterestController extends BaseController
{
    public function index()
    {
        $professionalInterests = ProfessionalInterest::all();
        return view('admin.professional-interest.index', compact('professionalInterests'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50|unique:professional_interests'
        ]);
        if ($validator->fails()) { 
            $validator->errors()->add('from', 'createModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $professionalInterest = new ProfessionalInterest();
        $professionalInterest->name = $request->name;
        if($professionalInterest->save()){
            return redirect()->back()->with('success', 'Professional Interest created successfully.');
        }else{
            return redirect()->back()->with('error', 'Error in creating Professional Interest.')->with('createModal', true);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professional_interest_id' => 'required|exists:professional_interests,id',
            'name' => 'required|min:2|max:50|unique:professional_interests,name,'.$request->professional_interest_id
        ]);
        if ($validator->fails()) { 
            $validator->errors()->add('from', 'editModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $professionalInterest = ProfessionalInterest::findOrFail($request->professional_interest_id);
        $professionalInterest->name = $request->name;
        if($professionalInterest->save()){
            return redirect()->back()->with('success', 'Professional Interest updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Error in updating Professional Interest.')->with('editModal', true);
        }
    }
}