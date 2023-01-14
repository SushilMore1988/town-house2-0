<?php

namespace App\Http\Controllers\Front\CoLiveSpace;

use App\Models\Cls;
use App\Models\ClsAmenities;
use App\Models\ClsValue;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/*
    Name:Varsha
    Date:27/12/2019
    Description: The AboutClsController class is used for getting the details and 
                 description for Cls.
*/
                 
class AboutCoLiveSpaceController extends BaseController
{
    public function __construct(){
        \Session::put('active_page', 'co-live');
    }
    /*
        Description: This is the store function used for storing the basic information 
                     related to the co-live-space. It stores CwsName,countryId,
                     stateId,cityId,userRole
                     This data is stored in co_work_spaces table.
        Params:     Request $request

    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'coLiveSpaceName'  =>    'required',
            'email'        =>    'required',
            'phone'          =>    'required',
            'city'           =>    'required',
            'userRole'         =>    'required',
                    
        ]);
         if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }
        $coLiveSpace = new Cls();
        $coLiveSpace->user_id = Auth::user()->id;
        $coLiveSpace->name = $request->coLiveSpaceName;
        $coLiveSpace->email_id = $request->email;
        $coLiveSpace->phone = $request->phone;
        $coLiveSpace->city = $request->city;
        $coLiveSpace->user_role = $request->userRole;

        if($coLiveSpace->save()){
           $current_tab="about";
            return redirect()->route('front.colive.edit',$coLiveSpace->id)->with(compact('current_tab'));
        }
        else{
            return redirect()->back()->with('msg', 'Error in adding your colive space!!!');
        }
    }


    /*
        Description: This is the edit function used for editing the information 
                     related to the co-work-space. It takes the id & checks co_work_spaces
                     table to find the co_work_space_id is available or not.Then pass the data 
                     for updating. 
        Params:      $id

    */

    public function edit($id){
        if(session('current_tab')==null){
            $current_tab = 'about';
        }
        else{
            $current_tab = session('current_tab');
        }
        $coLiveSpace = Cls::findOrFail($id);
        $amenities = ClsAmenities::all();
        $packages = Package::all();
        $days = Day::all();
        return view('front.colive.add-colive-space-details',compact('coLiveSpace','amenities','current_tab','days','packages'));
    }


    /*
        Description: This is the update function used for updating the about information 
                     related to the co-work-space.This data is updated in co_work_spaces table.
        Params:      Request $request

    */

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'email_id' => 'required|email',
            'phone' => 'required',
            'website' => 'nullable',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
            'space_information' => 'nullable',
            'notification_email' => 'nullable|email',
            'amenities'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $co_live_space = Cls::findOrFail($request->id);
        $co_live_space->name = $request->name;
        $co_live_space->description = $request->description;
        $co_live_space->email_id = $request->email_id;
        $co_live_space->phone = $request->phone;
        $co_live_space->website = $request->website;
        $co_live_space->facebook_url = $request->facebook_url;
        $co_live_space->twitter_url = $request->twitter_url;
        $co_live_space->instagram_url = $request->instagram_url;
        $co_live_space->space_information = $request->space_information;
        $co_live_space->notification_email = $request->notification_email;
        
        if($co_live_space->save())
           {
                $co_live_amenities = ClsValue::where('co_live_space_id',$co_live_space->id)->get();
                foreach($co_live_amenities as $co_live_amenitiy){
                    $co_live_amenitiy->delete();
                }
                foreach($request->amenities as $amenitiy){
                    $co_live_amenitiy = new ClsValue;
                    $co_live_amenitiy->co_live_space_id = $co_live_space->id;
                    $co_live_amenitiy->co_live_space_amenities_value_id = $amenitiy;
                    $co_live_amenitiy->save();
                }
                if($request->input('save')){
                    return redirect()->back()->with('message', 'About CoLive Space Added Successfully!!!')->with('current_tab','about');
                }
                 elseif($request->input('saveAndSubmit')){
                   return redirect()->back()->with('current_tab','accomodation');
                }
            }
            else{
                 return redirect()->back()->with('error', 'Error Occur!!!');
            }
        }
    }