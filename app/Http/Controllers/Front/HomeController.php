<?php

namespace App\Http\Controllers\Front;

use App\Models\Cws;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $req_url = 'https://api.exchangerate.host/latest?base=INR?symbols=USD,EUR,SGD,GBP,AUD,RUB,JPY,CAD';
        // $response_json = file_get_contents($req_url);
        // if(false !== $response_json) {
        //     try {
        //         $response = json_decode($response_json);
        //         if($response->success === true) {
        //             dd($response);
        //         }
        //     } catch(\Exception $e) {
        //         // Handle JSON parse error...
        //     }
        // }
        return view('front.home');
    }

    public function homeSelectType(Request $request){
        if($request->input('list-my-space')){
            if($request->spaceType=='co-work-space'){
                return redirect()->route('co-work-space.select-type');
            }
            elseif($request->spaceType=='co-live-space'){
                return view('errors.404');      
                // return redirect()->route('list-colive-space');;
            }

        }
        elseif($request->input('search')){
            if($request->spaceType=='co-work-space'){
                return redirect()->route('co-work-space.list', ['viewType' => 'list']);
            }
            elseif($request->spaceType=='co-live-space'){
                 // dd('my live');
                return view('errors.404');      

            }
        }
    }

    public function setLocation(Request $request){
        Session::put('user-location',$request->user_location);
    }

    public function setImages(){
        $users = User::all();
        foreach($users as $user){
            if(!empty($user->images['profile_image']['name'])){
                $name = $user->images['profile_image']['name'];
            }else{
                $name = null;
            }
            $user->images = [
                'profile_image' => [
                                    'name' => $name
                                ],
                'selfie' => [
                            'name' => null,
                            'is_approved' => null
                        ],
               'government_id' => [
                            'name' => null,
                            'is_approved' => null
                        ],
            ];
            $user->save();
        }
    }

}
