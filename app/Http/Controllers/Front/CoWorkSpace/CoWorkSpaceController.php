<?php

namespace App\Http\Controllers\Front\CoWorkSpace;

use App\Models\Admin;
use App\Models\Country;
use App\Models\Cws;
use App\Models\CwsCompletedTab;
use App\Models\CwsFacilityCategory;
use App\Models\Package;
use App\Models\PriceSetting;
use App\Models\Setting;
use App\Notifications\ListingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CoWorkSpaceController extends BaseController
{
	public function __construct(){
		Session::put('active_page', 'co-work');
	}
	
	public function index(){ 		
		return view('front.cowork.create-listing.add-co-work-space-details');
	}
	
	public function create(Request $request){
		$type = $request->type;
      	$countries = Country::pluck('name', 'id');
      	return view('front.cowork.create-listing.list-your-space',compact('countries','type'));
	}

	/** 
    * This is the store function used for storing the basic information 
    * related to the co-work-space. It stores coWorkSpaceName,countryId,
    * stateId,cityId,userRole. This data is stored in co_work_spaces table.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return $current_tab 
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coWorkSpaceName'  =>    'required|max:55',
            'coWorkSpaceType'  =>    'required',
            'country'          =>    'required',
            'state'            =>    'required',
            'city'             =>    'required',
            'userRole'         =>    'required'         
        ]);

        if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withErrors($validator);
        }

        // create new CoWorkSpace
        //Store contact details
        $contactDetails = [
            'email_id' => null,
            'phone' => null,
            'website' => null,
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null
        ];

        //Location
        $address = [
            'address' => null,
            'pin_code' => null,
            'latitude' => null,
            'longitude' => null
        ];

        //Size
        $shared_desk_prices = null;
        foreach(config('constant.CO_WORK_SIZE.shared_desk') as $key){
            $shared_desk_prices[$key] = null;
        }

        $dedicated_desk_prices = null;
        foreach(config('constant.CO_WORK_SIZE.dedicated_desk') as $key){
            $dedicated_desk_prices[$key] = null;
        }
        $priceSetting = PriceSetting::first();
        $service_charges = ['type' => 'percentage', 'price' => '15'];
        if($priceSetting){
            $service_charges = ['type' => $priceSetting->type, 'price' => $priceSetting->price];
        }
        $size = [
            'currency' => 'INR',
            'service_charges' => $service_charges,
            'seating_capacity' => null,
            'size_in_sqft' => null,
            // 'service_fee_type' => null,
            // 'service_fee' => null,
            'shared_desk'=> [
                'available' => 0,
                'for_listing' => 0,
                'pricing' => $shared_desk_prices
            ],
            'dedicated_desk'=> [
                'available' => 0,
                'for_listing' => 0,
                'pricing' => $dedicated_desk_prices
            ],
            'private_offices'=> [
                'available' => 0,
                'for_listing' => 0,
                'types_for_listing' => 0,
                'types' => []
            ],
            'meeting_rooms'=> [
                'available' => 0,
                'for_listing' => 0,
                'types_for_listing' => 0,
                'types' => []
            ],
        ];


        //Facilities
        $facilities = [
            'facilities' => [],
            'other_facilities' => []
        ];

        //Opening hours
        $days = config('constant.DAYS');
        $timing = [];
        foreach ($days as $day => $key) {
                $timing[$day]['checked'] = 0;
                $timing[$day]['from'] = null;
                $timing[$day]['to'] = null;
        }
        $opening_hours = [
            'timing' => $timing,
            'specific_time_info' => null
        ];

        $images = [
            'cover' => [],
            'banner' => [],
            'all' => [],
            'desk' => [],
            'meeting_room' => [],
            'private_office' => [],
        ];

        $coWorkSpace = new Cws();
        $coWorkSpace->user_id = Auth::user()->id;
        $coWorkSpace->type = $request->coWorkSpaceType;
        $coWorkSpace->name = $request->coWorkSpaceName;
        $coWorkSpace->country_id = $request->country;
        $coWorkSpace->state_id = $request->state;
        $coWorkSpace->city_id = $request->city;
        $coWorkSpace->user_role = $request->userRole;
        $coWorkSpace->contact_details = $contactDetails;
        $coWorkSpace->progress_percent = 0;
        $coWorkSpace->is_approved = 0;
	    $coWorkSpace->status = config("constant.CO_WORK.STATUS.PROGRESS");
	    $coWorkSpace->admin_status = 'Pending Approval';
        $coWorkSpace->admin_rating = null;
        $coWorkSpace->total_points = 0;
        $coWorkSpace->address = $address;
        $coWorkSpace->gst = null;
        $coWorkSpace->size = $size;
        $coWorkSpace->facilities = $facilities;
        $coWorkSpace->opening_hours = $opening_hours;
        $coWorkSpace->images = $images;
        $coWorkSpace->save();
       
        if($coWorkSpace){
            // After CoWorkSpace is created Tab information is also created for progress bar percentage
            $completed_tab = new CwsCompletedTab;
	        $completed_tab->cws_id = $coWorkSpace->id;
	        $completed_tab->tab_name = 'about';
	        $completed_tab->value = 10;
	        $completed_tab->save();

            $current_tab = "about";
            try {
                $data = [
                            'short_subject' => 'Co-Work Space Registration Successfully', 
                            'message' => $coWorkSpace->user->fname.' added cowork space '.$coWorkSpace->name, 
                            'link' => url('/admin/co-work-space')
                        ];
                Admin::first()->notify(new ListingNotification($data));

                $data = [
                            'short_subject' => 'Co-Work Space Registration Successfully', 
                            'message' => 'Your space '.$coWorkSpace->name.' added successfully ', 
                            'link' => url('/co-work-space/edit/'.$coWorkSpace->slug)
                        ];
                $coWorkSpace->user->notify(new ListingNotification($data));
            } catch (\Exception $e) {
                Log::warning('Error in sending Messages of co-working space stored in db. co-work space name is '.$coWorkSpace->name. ' '.$e);
            }
            
            return redirect()->route('co-work-space.edit',$coWorkSpace->slug)->with(compact('current_tab'));
        
        }else{
            
            return redirect()->back()->with('error','true')->with('msg', 'Error in adding your space!!!');
        
        }
    }

    /** 
     * This function is used for editing the information related to the co-work-space.
     * It takes the slug & checks co_work_spaces table to find the co_work_space is available or 
     * not.Then pass the data for updating. 
     *
     * @param  $slug
     *
     * @return mixed ($coWorkSpace, $coWorkSpaceFacilityCategories, $current_tab, $days, $packages)
     */
    public function edit($slug)
    {
        $coWorkSpace = Cws::where('slug',$slug)->firstOrFail();
        return view('front.cowork.create-listing.add-co-work-space-details', compact('coWorkSpace'));
    }


    public function upgradePackage($slug)
    { 
        $current_tab = 'package';
        if(session('current_tab')){
            $current_tab = session('current_tab');
        }
        $coWorkSpace = Cws::where('slug',$slug)->first();
        $coWorkSpaceFacilityCategories = CwsFacilityCategory::orderBy('id', 'asc')->get();
        $packages = Package::all();
        $days = config('constant:DAYS');
        $priceSetting = PriceSetting::first();
        $terms = Setting::where('name', 'terms')->first();

        // dd($coWorkSpace->facilities);
        return view('front.cowork.create-listing.add-co-work-space-details',compact('coWorkSpace','coWorkSpaceFacilityCategories','current_tab','days','packages', 'priceSetting', 'terms'));
    }

    /** 
     * This is the update function used for updating the about information 
     * related to the co-work-space.This data is updated in co_work_spaces table.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return mixed 
     */
	public function update(Request $request, Cws $cws)
    {
    	$validator = Validator::make($request->all(), [
    		'name'                 => 'required:max55',
            'description'          => 'required',
            'email_id'             => 'required|email|max:55',
            'phone'                => 'required|numeric|digits:10',
            'website'              => 'nullable|url',
            'facebook_url'         => 'nullable|url',
            'twitter_url'          => 'nullable|url',
            'instagram_url'        => 'nullable|url',
            'space_information'    => 'nullable',
            'notification_email'   => 'nullable|email'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        if($cws->user_id != Auth::id()){
        	// echo "You are not the owner of this space.";
        	abort('404');
        }
        
        $cws->name = $request->name;
        $cws->description = $request->description;
        $cws->information = $request->space_information;
        $cws->notify_email = $request->notification_email;

        $contactDetails = [
        	'email_id' => $request->email_id,
        	'phone' => $request->phone,
        	'website' => $request->website,
        	'facebook_url' => $request->facebook_url,
        	'twitter_url' => $request->twitter_url,
        	'instagram_url' => $request->instagram_url
        ];
        $cws->contact_details = $contactDetails;
        // dd($cws);
        if($cws->save()) {
               $this->createCompletedTabAbout($cws);

               return $this->redirectTab($request, $cws);
        }
	    else{
	        return redirect()->back()->with('error', 'Error Occur!!!');
	    }
    }

	public function changeStatus(Request $request, $id){
		$coWorkSpace = Cws::findOrFail($id);
		$coWorkSpace->status = $request->status;

		if($coWorkSpace->save()){
            toastr()->success('Status of your co-work space '. $coWorkSpace->name .' is changed  successfully ', 'About cowork space');
            return back(); 
        }else{
            toastr()->error('Error in changing coWorkSpace status!');
            return redirect()->back();
        }
	}

	public function destroy($id){
		$coWorkSpace = Cws::findOrFail($id);
        $coWorkSpace->delete_request = 1;
        $coWorkSpace->save();
        return response()->json(['success' => true]);
		// $this->deletePackages($coWorkSpace);
        // $this->deletePhotos($coWorkSpace);
        // $this->deletePrice($coWorkSpace);
        // $this->deleteSize($coWorkSpace);
        // $this->deleteOpeningHours($coWorkSpace);
        // $this->deleteLocation($coWorkSpace);
        // $this->deleteFacilities($coWorkSpace);
        // $coWorkSpace->delete();
        // return redirect()->route('front.dashboard.index');
	}

	/**
	 * Delete packages.
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deletePackages($coWorkSpace)
	{
		$coWorkSpace->coWorkSpacePackage->delete();
	}

	/**
	 * Delete photos .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deletePhotos($coWorkSpace)
	{
	    foreach($coWorkSpace->photos as $photo){
	        $photo->delete();
	    }
	}

	 /**
	 * Delete price .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deletePrice($coWorkSpace)
	{
	    if($coWorkSpace->coWorkSpacePrice){
	        if($coWorkSpace->coWorkSpacePriceMaster){
	            $coWorkSpace->coWorkSpacePriceMaster->delete();
	        }
	        $coWorkSpace->coWorkSpacePrice->delete();
	    }
	}

	 /**
	 * Delete size .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deleteSize($coWorkSpace)
	{
	    if( $coWorkSpace->coWorkSpaceSize){
	        foreach($coWorkSpace->coWorkSpaceSize->coWorkSpaceMeetingRoomCapacities as $meetingRoom){
	            $meetingRoom->delete();
	        }
	        foreach($coWorkSpace->coWorkSpaceSize->coWorkSpacePrivateOfficeCapacities as $privateOffice){
	            $privateOffice->delete();
	        }
	        $coWorkSpace->coWorkSpaceSize->delete();
	    }
	}

	 /**
	 * Delete Hours .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deleteOpeningHours($coWorkSpace)
	{
	    foreach($coWorkSpace->coWorkSpaceOpeningHours as $openingHours){
	        $openingHours->delete();
	    }
	}

	 /**
	 * Delete Location .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deleteLocation($coWorkSpace)
	{
	    if( $coWorkSpace->coWorkSpaceLocation){
	        $coWorkSpace->coWorkSpaceLocation->delete();
	    }
	}

	 /**
	 * Delete Facilities .
	 *
	 * @param  $coWorkSpace
	 *
	 */
	public function deleteFacilities($coWorkSpace)
	{
	   foreach($coWorkSpace->coWorkSpaceFacilityValues as $facilities){
	        $facilities->delete();
	    }
	}

	/**
     * This function is used for creating completedTab for about tab_name
     *
     * @param  $co_work_space
     * 
     * @return void
     *
     */
     public function createCompletedTabAbout($co_work_space)
     {
        $completed_tab = CwsCompletedTab::where('cws_id',$co_work_space->id)
                                            ->where('tab_name','about')->first();
        if($completed_tab) {
            $completed_tab->value = $completed_tab->value ;
        }
        else {
            $completed_tab                      = new CwsCompletedTab;
            $completed_tab->cws_id              = $co_work_space->id;
            $completed_tab->tab_name            = 'about';
            $completed_tab->value               = 10;
        }
        $completed_tab->save();
        $co_work_space->progress_percent    = $completed_tab->where('cws_id',$co_work_space->id)
                                                            ->sum('value');
        $co_work_space->save();
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
         //dd($co_work_space);
        toastr()->success('About your space completed successfully!!!', 'List your space');                 
         if($request->input('save')){   
            return redirect()->route('co-work-space.edit',$co_work_space->slug)->with('current_tab','about');
        }
        elseif($request->input('saveAndSubmit')){
           return redirect()->route('co-work-space.edit',$co_work_space->slug)->with('current_tab','facilities');
        }
     }

     public function setName(){
        $coWorkSpaces = Cws::all();
        foreach ($coWorkSpaces as $cws) {
            /**
             * Meeting rooms capacity & pricing store for each single room
             */
            $meetingRoomsSizeAndPriceArray = null; 

            for($i = 0; $i < $cws->size['meeting_rooms']['for_listing']; $i++ ){ 
                $meetingRoomsSizeAndPriceArray[$i+1]['name'] = 'Room No. '.($i+1);
                $meetingRoomsSizeAndPriceArray[$i+1]['capacity'] = $cws->size['meeting_rooms']['meeting_rooms'][$i+1]['capacity'];
                $meetingRoomsSizeAndPriceArray[$i+1]['pricing'] = $cws->size['meeting_rooms']['meeting_rooms'][$i+1]['pricing'];
            }

            /**
             * Private office capacity & pricing store for each single office
             */
            $privateOfficesSizeAndPriceArray = null;

            for($i = 0; $i < $cws->size['private_offices']['for_listing']; $i++ ){
                $privateOfficesSizeAndPriceArray[$i+1]['name'] = 'Office Name '.($i+1);
                $privateOfficesSizeAndPriceArray[$i+1]['capacity'] = $cws->size['private_offices']['private_offices'][$i+1]['capacity'];
                $privateOfficesSizeAndPriceArray[$i+1]['pricing'] = $cws->size['private_offices']['private_offices'][$i+1]['pricing'];
            }

            $cws->size = [
                'currency' => 'INR',
                'service_charges' => ['type' => 'percentage', 'price' => '15'],
                'seating_capacity' => $cws->size['seating_capacity'],
                'size_in_sqft' => $cws->size['size_in_sqft'],

                'shared_desk'=> [
                    'available' => $cws->size['shared_desk']['available'],
                    'for_listing' => $cws->size['shared_desk']['for_listing'],
                    'pricing' => $cws->size['shared_desk']['pricing']
                ],
                'dedicated_desk'=> [
                    'available' => $cws->size['dedicated_desk']['available'],
                    'for_listing' => $cws->size['dedicated_desk']['for_listing'],
                    'pricing' => $cws->size['dedicated_desk']['pricing']
                ],
                'private_offices'=> [
                    'available' => $cws->size['private_offices']['available'],
                    'for_listing' => $cws->size['private_offices']['for_listing'],
                    'private_offices' => $privateOfficesSizeAndPriceArray
                ],
                'meeting_rooms'=> [
                    'available' => $cws->size['meeting_rooms']['available'],
                    'for_listing' => $cws->size['meeting_rooms']['for_listing'],
                    'meeting_rooms' => $meetingRoomsSizeAndPriceArray
                ],
            ];

            $cws->save();
        }
     }
}