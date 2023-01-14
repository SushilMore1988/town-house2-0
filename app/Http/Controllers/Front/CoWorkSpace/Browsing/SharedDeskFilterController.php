<?php

namespace App\Http\Controllers\Front\CoWorkSpace\Browsing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\CwsPrice;

class SharedDeskFilterController extends Controller
{
	public function sharedDeskFilter()
	{
		$coWorkSpaces = [];
		$sharedDesks = Cws::where('desk_type',config("constant.CO_WORK.SIZE.DESK_TYPE.SHARED"))->get();
		foreach($sharedDesks as $sharedDesk){
			$coWorkSpaces[] = $sharedDesk->coWorkSpace;
		}
		return view('front.cowork.browse.list-view',compact('coWorkSpaces'));
	}

	public function sharedDeskFilterHighToLow()
	{
		$coWorkSpaces = [];
		$sharedDesks = CwsPrice::where('desk_type',config("constant.CO_WORK.SIZE.DESK_TYPE.SHARED"))->get()->sortByDesc('one_month');
		foreach($sharedDesks as $sharedDesk){
			$coWorkSpaces[] = $sharedDesk->coWorkSpace;
		}
		return view('front.cowork.browse.list-view',compact('coWorkSpaces'));
	}

	public function sharedDeskFilterLowToHigh()
	{
		$coWorkSpaces = [];
		$sharedDesks = CwsPrice::where('desk_type',config("constant.CO_WORK.SIZE.DESK_TYPE.SHARED"))->get()->sortBy('one_month');
		foreach($sharedDesks as $sharedDesk){
			$coWorkSpaces[] = $sharedDesk->coWorkSpace;
		}
		return view('front.cowork.browse.list-view',compact('coWorkSpaces'));
	}
	
}