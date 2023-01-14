<?php

namespace App\Http\Controllers\Front\CoLiveSpace;

use App\Models\Cls;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CoLiveSpaceController extends BaseController
{
	public function index()
	{
		
		return view('front.colive.list-colive-space-type');
	}
	
	public function colivefrom()
	{

		return view('front.colive.list-colive-space');
	}
	
	public function create(Request $request)
	{
		$type = $request->type;
      	$countries = Country::pluck('name', 'id');
      	return view('front.colive.create-listing.list-your-space',compact('countries','type'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'coLiveSpaceName'  =>    'required|max:55',
            'coLiveSpaceType'  =>    'required',
            'country'          =>    'required',
            'state'            =>    'required',
            'city'             =>    'required',
            'userRole'         =>    'required'         
        ]);

        if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator)->with(['type', $request->coLiveSpaceType]);
        }

		$cls = new Cls();
		$cls->user_id = Auth::id();
		$cls->name = $request->coLiveSpaceName;
		$cls->unique_name = $this->getUniqueName($request->coLiveSpaceName);
		$cls->slug = $this->getSlug($request->coLiveSpaceName);
		$cls->cls_type = $request->coLiveSpaceType;
		$cls->location = [
			'country' => $request->country,
			'state' => $request->state,
			'city' => $request->city,
			'lat' => null,
			'lng' => null,
		];
		if($cls->save()){
			return redirect()->route('co-live-space.edit', [$cls->slug]);
		}else{
			return redirect()->back()->with(['error' => 'Error in creating new space. Please try again.']);
		}
	}

	public function getUniqueName($name)
	{
		$unique_name = ('th2-0-cls-').strtolower(Str::slug($name,'-'));
        $cls = Cls::where('unique_name', $unique_name)->first();

        if($cls) {
            $name_avail = $name.rand(1000, 9999);
            $unique_name = $this->getUniqueName($name_avail);
        }
         
        return $unique_name;
	}

	public function getSlug($name)
    {
        $slug = strtolower(Str::slug($name,'-'));
        $cls = Cls::where('slug', $slug)->first();

        if($cls) {
            $name_avail = $name.rand(1000, 9999);
            $slug = $this->getSlug($name_avail);
        }
         
        return $slug;
    }

	public function edit($slug)
	{
		$cls = Cls::where('slug', $slug)->firstOrFail();
		return view('front.colive.create-listing.add-co-live-space-details', compact('cls'));
	}
}