<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Cws;
use App\Models\CwsFacilityCategory;
use App\Models\Package;
use App\Models\CompletedTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Str;


class AboutCoWorkSpaceController extends BaseController
{
    

    

    /**
    * This function checks session() and return current tab.
    *
    * @param void
    *
    * @return $current_tab
    *
    */
    public function checkSessionData()
    {
        if(session('current_tab') == null){
            $current_tab = 'about';
        }
        else{
            $current_tab = session('current_tab');
        }

        return $current_tab;
    }

     /**
     * This function is used for creating Cws
     *
     * @param   \Illuminate\Http\Request  $request
     * @return  $slug
     *
     */
     public function createCoWorkSpace(Request $request)
     {
        $coWorkSpace =  new Cws();
        $coWorkSpace->user_id =  Auth::user()->id;
        $coWorkSpace->name =  $request->coWorkSpaceName;
        $coWorkSpace->type =  $request->coWorkSpaceType;
        $coWorkSpace->country_id =  $request->country;
        $coWorkSpace->state_id =  $request->state;
        $coWorkSpace->city_id  =  $request->city;
        $coWorkSpace->user_role=  $request->userRole;
        $coWorkSpace->slug   =  $this->getUniqueSlug($request->coWorkSpaceName);
        $coWorkSpace->unique_name  = ('th2-0-').($this->getUniqueSlug($request->coWorkSpaceName));

        $coWorkSpace->save();

        return $coWorkSpace;
     }

     /**
     * This function is used for creating profile tab in CompletedTab.
     *
     * @param   \Illuminate\Http\Request  $request, $coWorkSpace
     * 
     * @return void
     *
     *  
     */
     public function createCompletedTabProfile(Request $request,$coWorkSpace)
     {
        $completed_tab                      = new CompletedTab;
        $completed_tab->cws_id    = $coWorkSpace->id;
        $completed_tab->tab_name            = 'Profile';
        $completed_tab->value               = 10;
        $completed_tab->save();
        $this->percentageSum($request,$completed_tab,$coWorkSpace);
     }

     /**
     * This function is used for adding percentage total And also status is updated
     *
     * @param   \Illuminate\Http\Request  $request, $completed_tab, $coWorkSpace
     * @return  void
     *
     */
    public function percentageSum(Request $request,$completed_tab,$coWorkSpace)
     {
        $coWorkSpace->progress_percent = $completed_tab->where('cws_id',$coWorkSpace->id)->sum('value');
        $coWorkSpace->status = config("constant.CO_WORK.STATUS.PROGRESS");
        $coWorkSpace->save();  
     }

     /**
     * This function is used for updating CoWorkSpace 
     *
     * @param   \Illuminate\Http\Request
     *
     * @return  $co_work_space object
     *
     */
     public function updateCoWorkSpace($request)
     {
        $co_work_space = Cws::findOrFail($request->id);
        
        if($co_work_space->name != $request->name) { //dd($request->name);
            //$co_work_space->slug =  $this->getUniqueSlug($request->name);
        }
        else {
            //$co_work_space->slug = $co_work_space->slug;
            //$co_work_space->unique_name = $co_work_space->unique_name;

        }

        $co_work_space->name               = $request->name;
        $co_work_space->description        = $request->description;
        $co_work_space->email_id           = $request->email_id;
        $co_work_space->phone              = $request->phone;
        $co_work_space->website            = $request->website;
        $co_work_space->facebook_url       = $request->facebook_url;
        $co_work_space->twitter_url        = $request->twitter_url;
        $co_work_space->instagram_url      = $request->instagram_url;
        $co_work_space->space_information  = $request->space_information;
        $co_work_space->notification_email = $request->notification_email;
        $co_work_space->save();

        return $co_work_space;

     }

     

      /**
     * This function is used for generating and checking the Slug uniquely
     *
     * @param  \Illuminate\Http\Request
     * 
     *
     */
     public function redirectTab(Request $request,$co_work_space)
     {
         if($request->input('save')){
            toastr()->success('About CoWork Space Added Successfully!!!');                 
            return redirect()->route('co-work.edit',$co_work_space->slug)->with('current_tab','about');
        }
        elseif($request->input('saveAndSubmit')){
            toastr()->error('Error in adding about cowork.');                 
            return redirect()->back()->with('current_tab','facilities');
        }
     }

}