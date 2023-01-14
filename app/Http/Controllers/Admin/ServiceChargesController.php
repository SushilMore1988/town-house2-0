<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceCharges;
use Illuminate\Support\Facades\Validator;

class ServiceChargesController extends BaseController
{
    public function update(Request $request, ServiceCharges $serviceCharges)
    {
        $validator = Validator::make($request->all(), [
            'charges' => 'required'
        ]);
         if ($validator->fails()) { 
         	$validator->errors()->add('from', 'editServiceChargesModal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $serviceCharges->update(['charges' => $request->charges]);

        return redirect()->back()->with(['success' => true, 'message' => 'Service charges updated successfully.']);
    }
}