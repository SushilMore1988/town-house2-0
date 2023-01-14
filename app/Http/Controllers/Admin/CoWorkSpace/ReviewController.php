<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\Cws;

class ReviewController extends BaseController
{
	public function index($id)
	{
		$coWorkSpace = Cws::findOrFail($id);
		$coWorkSpaceId = $coWorkSpace->id;
		return view('admin.cowork.review',compact('coWorkSpaceId'));
	}

	public function store(Request $request)
	{
		dd($request->all());
	}
}