<?php

namespace App\Http\Controllers\Front\CoWorkSpace;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Cws;
use App\Models\CwsFacilityValue;
use App\Models\CwsFacilityCategoryValue;
use App\Models\CwsFacilityCategory;
use App\Models\CwsCompletedTab; 
use App\Models\CwsOtherFacility;

class FacilityController extends BaseController
{
	public function store(Request $request, Cws $cws){
        $validator = Validator:: make($request->all(), [
            'facilities'    => 'required'
        ]);
        if ($validator->fails()) {
            toastr()->error('Error Occur to save your space facilities!!!');  
            return redirect()->back()->with('current_tab','facilities');
        }
        $otherFacilities = [];
        foreach($request->facilities as $facility){
            if( $request->{'otherFacility_'.$facility} != null ) {
                // array_push($otherFacilities, [$facility => $request->{'otherFacility_'.$facility}]);
                $otherFacilities[$facility] = $request->{'otherFacility_'.$facility};
            }
        }

        $cws->facilities = [
            'facilities' => $request->facilities,
            'other_facilities' => $otherFacilities
        ];
        // dd($request->all());
        //  Checking the table having first entries if yes delete it and then saving new ones
        // $this->facilityValueExits($request);

        // //  Entering new entries to the database 
        // $coWorkSpaceFacilityValue = $this->updateNewFacilities($request);

        // // Code for progress bar percentage
        // $this->updateCompltedTab($request);

        //  Checking wether we have clicked save button or saveAndSubmit button,
        //  if save clicked data is saved to database and saveAndSubmit saves data and redirect to next tab 
        if($cws->save())   {
            $this->completeTabFacility($request, $cws->id);

            return $this->redirectTab($request);
        }
        else {
            toastr()->error('Error Occur to save your space facilities!!!');  
            return redirect()->back()->with( 'current_tab', 'facilities');
        }
    }
    
    /**
     * Check facility Value Exits.
     * If Exits function delete the values.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  null
     *
     */
    public function facilityValueExits(Request $request)
    {
        $coWorkSpaceFacilityValues = CwsFacilityValue::where('cws_id',$request->coWorkSpaceId)->get();

        foreach( $coWorkSpaceFacilityValues as $coWorkSpaceFacilityValue ) {
            $coWorkSpaceFacilityValue->delete();
        }
    }
    
    /**
     * Update facility Value .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return object of CoWorkSpaceFacilityValue Class
     *
     */
    public function updateNewFacilities(Request $request)
    {
        foreach( $request->facilities as $facility ) {
            $coWorkSpaceFacilityValue = new CwsFacilityValue;
            $coWorkSpaceFacilityValue->cws_id = $request->coWorkSpaceId;
            $coWorkSpaceFacilityValue->cws_facility_category_value_id = $facility;
            $coWorkSpaceFacilityValue->save();
        }
        $this->updateOtherFacilities($request);
        return  $coWorkSpaceFacilityValue;
    }

    /**
     * Check facility Value Exits.
     * If Exits function delete the values.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  null
     *
     */
    public function otherFacilityValueExits(Request $request)
    {
        $coWorkSpaceOtherFacilities = CwsOtherFacility::where('cws_id',$request->coWorkSpaceId)->get();

        foreach($coWorkSpaceOtherFacilities as $coWorkSpaceOtherFacility){
            $coWorkSpaceOtherFacility->delete();
        }
    }

    /**
     * Update Other facility Value.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return object of CoWorkSpaceFacilityValue Class
     *
     */
    public function updateOtherFacilities(Request $request)
    {
        $this->otherFacilityValueExits($request);
        foreach($request->facilities as $facility){
            if( $request->{'otherFacility_'.$facility} != null ) {
                $coWorkSpaceOtherFacility = new CwsOtherFacility;
                $coWorkSpaceOtherFacility->cws_id = $request->coWorkSpaceId;
                $coWorkSpaceOtherFacility->cws_facility_category_value_id = $facility;
                $coWorkSpaceOtherFacility->other_facility = $request->{'otherFacility_'.$facility};
                $coWorkSpaceOtherFacility->save();
            }
        }
    }
    
    /**
     * Update Completed Tab.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  void
     *
     * As there is one required feild tab, value is 1*4 as we want 100% and 25 feilds are 
     * required so 100/25 is 4 so multiplied by 4 with every feild 
     */
    
    /**
     * Creating new completed_tabs entry if it is not avaliable in the table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     *
     */
    /**
     * Doing the sum of all percentage values from table in completed_tabs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     *
     */

    public function completeTabFacility(Request $request, $cws)
    { 
        $completed_tab = CwsCompletedTab::where('cws_id', $cws)
                                     ->where('tab_name','facility')->first();
        if($completed_tab){
            $completed_tab->value = $completed_tab->value ;
        }
        else{
            $completed_tab = new CwsCompletedTab;
            $completed_tab->cws_id = $cws;
            $completed_tab->tab_name = 'facility';
            $completed_tab->value = 10;
        }
        $completed_tab->save();
        $co_work_space = Cws::findOrFail($cws);
        $co_work_space->progress_percent = $completed_tab->where('cws_id',$cws)->sum('value');
        $co_work_space->save();
    }
    
    /**
     * Redirect Tab to next tab or to keep on the same tab.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     *
     */
    public function redirectTab(Request $request)
    {
        toastr()->success('Facilities completed Successfully!!!', 'List your space');  
        if($request->input('save')) {
            return redirect()->back()->with('current_tab','facilities');
        }
        elseif($request->input('saveAndSubmit')) {
            return redirect()->back()->with('current_tab','location');
        }
    }
} 