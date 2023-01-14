<?php

namespace App\Http\Controllers\Front\CoLiveSpace;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListCoLiveSpaceController extends BaseController
{
    public function __construct(){
      Session::put('active_page', 'co-work');      
    }
  	 
     /**
     *  This is used for calling a view for creating a coworkspace.
     *  @param void
     *
     * @return $countries
     */
    public function index(Request $request){		
      $type = $request->type;
      $countries = Country::pluck('name', 'id');      
      return view('front.cowork.create-listing.list-your-space',compact('countries','type'));
	  }  
  
    /**
    * This function is used for getting the states by using the countryId.
    * getStateByCountry() is written in State Model.
    * 
    * Date        : 31/12/2019
    * @param $id (Country id)
    *
    * @return $states
    */
    public function ajaxStates($id)
    {
      $country = Country::findOrFail($id);
      $states = new State;
      return response()->json($states->getStateByCountry($country));
    }

    /**
    * This function is used for getting the cities by using the stateId.
    * getCitiesByState() is written in State Model.
    * 
    * Date        : 31/12/2019
    *
    * @param $id (State id)
    *
    * @return $cities
    */
    public function ajaxCities($id)
    {
      $state = State::findOrFail($id);
      $cities = new City;
      return response()->json($cities->getCitiesByState($state));
    }

    public function selectType()
    {
      return view('front.colive.create-listing.list-your-space-type');
    }
}

