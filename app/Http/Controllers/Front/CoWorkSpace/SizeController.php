<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\CoWorkSpaceAlgorithm;
use App\Models\Cws;
use App\Models\CwsAlgorithm;
use App\Models\CwsCompletedTab;
use App\Models\CwsFacilityCategoryValue;
use App\Models\CwsMeetingRoomCapacity;
use App\Models\CwsPrivateOfficeCapacity;
use App\Models\PriceSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SizeController extends BaseController
{
	public function store(Cws $cws, Request $request){ 
		$validator = Validator::make($request->all(), [
 			'coWorkSpaceId' => 'required',
            'size_in_sqft' => 'required|numeric',
            'seating_capacity' => 'required|numeric',
            'shared_desk_available' => 'nullable',
            'shared_desk_for_listing' => 'nullable',
            'dedicated_desk_available' => 'nullable',
            'dedicated_desk_for_listing' => 'nullable',
            'meeting_rooms_available' => 'nullable',
            'meeting_rooms_for_listing' => 'nullable',
        ]);
	 	if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->with('current_tab','size');
      }
        
        $shared_desk_prices = null;
        foreach(config('constant.CO_WORK_SIZE.shared_desk') as $key){
            $shared_desk_prices[$key] = null;
        }

        $dedicated_desk_prices = null;
        foreach(config('constant.CO_WORK_SIZE.dedicated_desk') as $key){
            $dedicated_desk_prices[$key] = null;
        }

        $private_office_prices = null;
        foreach(config('constant.CO_WORK_SIZE.private_office') as $key){
            $private_office_prices[$key] = null;
        }

        $meeting_room_prices = null;
        foreach(config('constant.CO_WORK_SIZE.meeting_room') as $key){
            $meeting_room_prices[$key] = null;
        }

        /**
         * Meeting rooms capacity & pricing store for each single room
         */
        $meetingRoomsSizeAndPriceArray = null; 

        for($i = 0; $i < $request->meeting_rooms_for_listing; $i++ ){ 
            $meetingRoomsSizeAndPriceArray[$i+1]['name'] = $request->{'meetingRoomName_'.($i+1)};
            $meetingRoomsSizeAndPriceArray[$i+1]['capacity'] = $request->{'meetingRoomCapacity_'.($i+1)};
            $meetingRoomsSizeAndPriceArray[$i+1]['pricing'] = $meeting_room_prices;
        }

        /**
         * Private office capacity & pricing store for each single office
         */
        $privateOfficesSizeAndPriceArray = null;

        for($i = 0; $i < $request->private_offices_for_listing; $i++ ){
            $privateOfficesSizeAndPriceArray[$i+1]['name'] = $request->{'privateOfficeName_'.($i+1)};
            $privateOfficesSizeAndPriceArray[$i+1]['capacity'] = $request->{'privateOfficeCapacity_'.($i+1)};
            $privateOfficesSizeAndPriceArray[$i+1]['pricing'] = $private_office_prices;
        }

        $priceSetting = PriceSetting::first();
        $service_charges = ['type' => 'percentage', 'price' => '15'];
        if($priceSetting){
            $service_charges = ['type' => $priceSetting->type, 'price' => $priceSetting->price];
        }

        $cws->size = [
            'currency' => 'INR',
            'service_charges' => $service_charges,
            'seating_capacity' => $request->seating_capacity,
            'size_in_sqft' => $request->size_in_sqft,

            'shared_desk'=> [
                'available' => $request->shared_desk_available,
                'for_listing' => $request->shared_desk_for_listing,
                'pricing' => $shared_desk_prices
            ],
            'dedicated_desk'=> [
                'available' => $request->dedicated_desk_available,
                'for_listing' => $request->dedicated_desk_for_listing,
                'pricing' => $dedicated_desk_prices
            ],
            'private_offices'=> [
                'available' => $request->private_offices_available,
                'for_listing' => $request->private_offices_for_listing,
                'private_offices' => $privateOfficesSizeAndPriceArray
            ],
            'meeting_rooms'=> [
                'available' => $request->meeting_rooms_available,
                'for_listing' => $request->meeting_rooms_for_listing,
                'meeting_rooms' => $meetingRoomsSizeAndPriceArray
            ],
        ];

        if( $cws->save()){
          
           $completed_tab = CwsCompletedTab::where('cws_id',$cws->id)->where('tab_name','size')->first();

            if($completed_tab){

                $completed_tab->value = $completed_tab->value ;

            }else{

                $completed_tab = new CwsCompletedTab;
                $completed_tab->cws_id = $request->coWorkSpaceId;
                $completed_tab->tab_name = 'size';
                $completed_tab->value = 20;
            }
            $completed_tab->save();

            $cws->progress_percent = $completed_tab->where('cws_id',$cws->id)->sum('value');
            $cws->save();

            // Points Assignment
            $this->pointAssignment($cws);
            toastr()->success('Size completed successfully!!!', 'List your space');                 
            if($request->input('save')){
              return redirect()->back()->with('current_tab','size');
            }elseif($request->input('saveAndSubmit')){
              return redirect()->back()->with('current_tab','pricing');
            }
            
	 	}

        toastr()->error('Error Occur to save your space Size!!!');                 
        return redirect()->back()->with('current_tab','size');
	}

   

    public function pointAssignment(Cws $cws){
      $total_points = 0;

      /** step 1: code for checking the total area */
      if( $cws->size['size_in_sqft'] > 1 && $cws->size['size_in_sqft'] <= 1500 ){
        $total_points += 10;
      }
      else if( $cws->size['size_in_sqft'] > 1500 && $cws->size['size_in_sqft'] <= 10000 ){
        $total_points += 20;
      }
      else if($cws->size['size_in_sqft'] > 10000 ){
        $total_points += 30;
      }
      else{
        $total_points += 0;
      }
      
      /** step 2: code for seating*/
      if( $cws->size['shared_desk']['for_listing'] > 0 ){
        $total_points += 30;
      }
      if( $cws->size['dedicated_desk']['for_listing'] > 0 ){
        $total_points += 10;
      }
      if($cws->size['private_offices']['for_listing'] > 0 ){
        $total_points += 20;
      }

      $facilities = $cws->facilities['facilities']; 
      // $cwsFacilityCategoryValue = CwsFacilityCategoryValue::all();

      foreach($facilities as $facility){  
        $cwsFacilityCategoryValue = CwsFacilityCategoryValue::where('id', $facility)->first(); 
        if($cwsFacilityCategoryValue->rating_category == 0)
        {
         $total_points += 0;
        }
        else{
          $total_points += (int)$cwsFacilityCategoryValue->rating_category;
        }
      }

      
      $colorCategory = $this->colorAssignment($total_points);
      $cws->total_points = $total_points;
      $cws->color_category = $colorCategory;

      $cws->save();
    }

    function colorAssignment($total_points)
    {
       // $bronze = CwsAlgorithm::where('category','Bronze')->first();
       // $silver = CwsAlgorithm::where('category','Silver')->first();
       // $gold = CwsAlgorithm::where('category','Gold')->first();
       
       if($total_points > 0 && $total_points <= 140){
           $colorCategory = 'bronze';
       }
       elseif($total_points > 140 && $total_points <= 400){
         $colorCategory = 'silver';
       }
       elseif($total_points > 401 ){
           $colorCategory = 'gold';
       }

       return $colorCategory;
    }
}