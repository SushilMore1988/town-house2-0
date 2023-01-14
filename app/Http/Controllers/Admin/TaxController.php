<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Support\Facades\Validator;

class TaxController extends BaseController
{    
    /**
     * store newly created tax in database
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tax' => 'required',
            'name' => 'required'
        ]);
         if ($validator->fails()) { 
         	$validator->errors()->add('from', 'createTaxModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Tax::create([
            'tax' => $request->tax,
            'name' => $request->name
        ]);
        return redirect()->back()->with(['success' => true])->with(['msg' => 'Tax created successfully.']);
    }
    
    /**
     * updates tax record in database
     *
     * @param  mixed $request
     * @param  mixed $tax
     * @return void
     */
    public function update(Request $request, Tax $tax)
    {
        $validator = Validator::make($request->all(), [
            'tax' => 'required',
            'name' => 'required'
        ]);
         if ($validator->fails()) { 
         	$validator->errors()->add('from', 'editTaxModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tax->update([
            'tax' => $request->tax,
            'name' => $request->name
        ]);
        return redirect()->back()->with(['success' => true])->with(['msg' => 'Tax updated successfully.']);
    }
    
    /**
     * delete tax record from database
     *
     * @param  mixed $request
     * @param  mixed $tax
     * @return void
     */
    public function destroy(Request $request, Tax $tax)
    {
        $tax->delete();
        return redirect()->back()->with(['success' => true])->with(['msg' => 'Tax deleted successfully.']);
    }
}