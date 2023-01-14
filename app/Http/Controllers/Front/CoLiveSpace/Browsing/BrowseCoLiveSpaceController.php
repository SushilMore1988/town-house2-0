<?php

namespace App\Http\Controllers\Front\CoLiveSpace\Browsing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cws;
use App\Models\CwsAlgorithm;

class BrowseCoLiveSpaceController extends Controller
{
	public function index($viewType){
		if($viewType == 'map'){
			return $this->mapView();
		}else{
			return $this->listView();
		}
		// $currentButton ="list-view";
		// return view('front.cowork.browse.list-view',compact('currentButton'));
	}
	
	public function listView(){
		$currentButton="list_view";
		$coWorkSpaces = Cws::where('status',config('constant.CO_WORK.STATUS.PUBLISED'))->where('is_approved', 1)->where('admin_status', 'Active')->get();
		return view('front.cowork.browse.list-view',compact('coWorkSpaces','currentButton'));
	}

	public function mapView(){
		$currentButton="map_view";
		$coWorkSpaces = Cws::where('status',config('constant.CO_WORK.STATUS.PUBLISED'))->where('is_approved', 1)->get();
		return view('front.cowork.browse.map-view',compact('coWorkSpaces','currentButton'));
	}

	public function ajaxGetCoWorkSpaceDetail($id){ 
		$coWorkSpace = Cws::findOrFail($id);
		$sharedDesk = null;
		$location = null;
		$dedicatedDesk = null;
		$privateOffice = null;
		$meetingRoom = null;
		$rating = 0;
		$slug = null;

		$slug = $coWorkSpace->slug;
		if(!empty($coWorkSpace->address)){
			$location = $coWorkSpace->address['address'];
		}

		if( $coWorkSpace->size){
			if( $coWorkSpace->size['shared_desk']['for_listing'] != null || $coWorkSpace->size['shared_desk']['for_listing'] > 0) {
				if(!empty($coWorkSpace->size['shared_desk']['pricing'])){
			 		$sharedDesk = $coWorkSpace->size['shared_desk']['pricing']['1 Month'];
				}
			}
		}

		if( $coWorkSpace->size){
			if( $coWorkSpace->size['dedicated_desk']['for_listing'] != null || $coWorkSpace->size['dedicated_desk']['for_listing'] > 0) {
				if(!empty($coWorkSpace->size['dedicated_desk']['pricing'])){
			 		$dedicatedDesk = 	$coWorkSpace->size['dedicated_desk']['pricing']['1 Month'];
				}
			}
		}

		if(!empty($coWorkSpace->size['private_offices']['private_offices'][1]['capacity'])){
			if($coWorkSpace->size['private_offices']['private_offices'][1]['pricing']){
				$privateOffice = $coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month'];
			}
		}

		if(!empty($coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['capacity'])){
			if($coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['pricing']){
				$meetingRoom =$coWorkSpace->size['meeting_rooms']['meeting_rooms'][1]['pricing']['1 Month'];
			}
		}

		$bronze = CwsAlgorithm::where('category','Bronze')->first();
		$silver = CwsAlgorithm::where('category','Silver')->first();
		$gold	= CwsAlgorithm::where('category','Gold')->first();

	 	if($coWorkSpace->total_points > $bronze->range_from && $coWorkSpace->total_points <= $bronze->range_to){
			if($coWorkSpace->admin_rating > 0 ){
				$rating = round($coWorkSpace->admin_rating, 1);
				$color = 'bronze';
			}
			else{
				$rating = 0; 
				$color = 'bronze';
			}
		}
		elseif($coWorkSpace->total_points > $silver->range_from && $coWorkSpace->total_points <= $silver->range_to){
			if($coWorkSpace->admin_rating > 0 ){
				$rating = round($coWorkSpace->admin_rating, 1);
				$color = 'silver';
			}
			else{
				$rating = 0; 
				$color = 'silver';
			}
		}
		elseif($coWorkSpace->total_points > $gold->range_from ){
			if($coWorkSpace->admin_rating > 0 ){
				$rating = round($coWorkSpace->admin_rating, 1);
				$color = 'gold';
			}
			else{
				$rating = 0; 
				$color = 'gold';
			}
		}
																	
		$coWorkSpaceArray[] = array('coWorkSpaceName'=>$coWorkSpace->name,
									'coWorkSpaceImage'=>$coWorkSpace->images['cover'], 
									'location'=>$location,
									'sharedDesk'=>$sharedDesk,
									'dedicatedDesk'=>$dedicatedDesk,
									'privateOffice'=>$privateOffice,
									'meetingRoom' =>$meetingRoom,
									'rating'=>$rating,
									'currency'=>$coWorkSpace->size['currency'],
									'colorCategory'=>$color,
									'total_points'=>$coWorkSpace->total_points,
									'slug'=>$slug);
		$coWorkSpaceArray['success'] = 'true';
		return response()->json($coWorkSpaceArray);

	}
}