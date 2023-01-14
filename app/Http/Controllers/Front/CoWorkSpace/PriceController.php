<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Models\PriceSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PriceController extends BaseController
{
	public function store(Cws $cws, Request $request){
		$validator = Validator::make($request->all(), [
 			'coWorkSpaceId'    => 'required',
            'currency'         => 'required'
        ]);
	 	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('current_tab','pricing');
        }
        

        $size = $cws->size;

        $priceSetting = PriceSetting::first();
        
        $size['service_charges'] = ['type' => 'percentage', 'price' => '15'];
        
        if($priceSetting){
            $size['service_charges'] = ['type' => $priceSetting->type, 'price' => $priceSetting->price];
        }

        /**Set currency**/
        $size['currency'] = $request->currency;

        /**Set service fee**/
        $size['service_fee_type'] = $request->service_fee_type;
        $size['service_fee'] = $request->service_fee;

        /*--add shared desk price--*/
        if($cws->size['shared_desk']['for_listing'] > 0){
            foreach($cws->size['shared_desk']['pricing'] as $key => $value){
                $name = 'shared_desk_'.str_replace(' ','_',$key);
                $size['shared_desk']['pricing'][$key] = $request->{$name};
            }
        }

        /*--add dedicated desk price--*/
        if($cws->size['dedicated_desk']['for_listing'] > 0){
            foreach($cws->size['dedicated_desk']['pricing'] as $key => $value){
                $name = 'dedicated_desk_'.str_replace(' ','_',$key);
                $size['dedicated_desk']['pricing'][$key] = $request->{$name};
            }
        }
        
        /*--add private office price--*/
        if($cws->size['private_offices']['for_listing'] > 0){
            foreach($cws->size['private_offices']['private_offices'] as $private_office_number => $private_office){
                foreach($cws->size['private_offices']['private_offices'][$private_office_number]['pricing'] as $key => $value){
                    $name = 'private_office_'.$private_office_number.'_'.str_replace(' ','_',$key);
                    $size['private_offices']['private_offices'][$private_office_number]['pricing'][$key] = $request->{$name};
                }
            }
        }
        
        /*--add meeting room price--*/
        if($cws->size['meeting_rooms']['for_listing'] > 0){
            foreach($cws->size['meeting_rooms']['meeting_rooms'] as $meeting_room_number => $meeting_room){
                foreach($cws->size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'] as $key => $value){
                    $name = 'meeting_room_'.$meeting_room_number.'_'.str_replace(' ','_',$key);
                    $size['meeting_rooms']['meeting_rooms'][$meeting_room_number]['pricing'][$key] = $request->{$name};
                }
            }
        }

        $cws->size = $size;
        $cws->gst = $request->gst;
        // dd($cws->size);
        if($cws->save()){
            
            //Completed price tab
            $this->completedTabPrice($cws);
            toastr()->success('Pricing completed Successfully!!!', 'List your space');                 
            if($request->input('save')){
                return redirect()->back()->with('current_tab','pricing');
            }elseif($request->input('saveAndSubmit')){
                return redirect()->back()->with('current_tab','photo');
            }
        }else{
            toastr()->error('Error Occur to save your space price!!!');                 
            return redirect()->back()->with('current_tab','pricing');
        }
    }

     /**
     * This function is used for creating completedTab for pricing tab_name
     *
     * @param  $cws
     * 
     * @return void
     *
     */
     public function completedTabPrice($cws)
     {
        $completed_tab = CwsCompletedTab::where('cws_id',$cws->id)
                                            ->where('tab_name','pricing')->first();
        if($completed_tab) {
            $completed_tab->value = $completed_tab->value ;
        }
        else {
            $completed_tab                      = new CwsCompletedTab;
            $completed_tab->cws_id              = $cws->id;
            $completed_tab->tab_name            = 'pricing';
            $completed_tab->value               = 10;
        }
        $completed_tab->save();
        $cws->progress_percent    = $completed_tab->where('cws_id',$cws->id)
                                                            ->sum('value');
        $cws->save();
     }
     
    public function ajax_get_private_office_detail($id, $office_id)
    {
        $coWorkSpace = Cws::where('id',$id)->first(); 
        $coWorkSpacePrivateOfficeCapacity = $coWorkSpace->size['private_offices']['private_offices'][$office_id]['capacity']; 
        if($coWorkSpacePrivateOfficeCapacity){
            return response()->json(['coWorkSpacePrivateOfficePricing' => $coWorkSpace->size['private_offices']['private_offices'][$office_id]['pricing'], 'status' => 'true']);
       }
       else{
         return response()->json(['coWorkSpacePrivateOfficePricing' => null, 'status' => 'false']);
       }
    }

    public function ajax_get_meeting_room_detail($id, $room_id)
    {
        $coWorkSpace = Cws::where('id',$id)->first();
        $coWorkSpaceMeetingRoomCapacity = $coWorkSpace->size['meeting_rooms']['meeting_rooms'][$room_id]['capacity'];
      if($coWorkSpaceMeetingRoomCapacity){
         return response()->json(['coWorkSpaceMeetingRoomPricing' =>  $coWorkSpaceMeetingRoomCapacity = $coWorkSpace->size['meeting_rooms']['meeting_rooms'][$room_id]['pricing'], 'status' => 'true']);
       }
       else{
         return response()->json(['coWorkSpaceMeetingRoomPricing' => null, 'status' => 'false']);
       }
    }
}