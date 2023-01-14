<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsEnquiry;
use App\Models\CwsMembershipEnquiry;
use App\Models\CwsScheduleTour;

class EnquiryController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $enquiries = CwsEnquiry::all();
        return view('admin.co-work.enquiry.index',compact('enquiries'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function memberShipEnquiry()
    {
        $memberShipEnquiries = CwsMembershipEnquiry::all();
        return view('admin.co-work.enquiry.membership',compact('memberShipEnquiries'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function scheduleTour()
    {
        $scheduleTours = CwsScheduleTour::all();
        return view('admin.co-work.enquiry.tour-schedule',compact('scheduleTours'));
    }

    // public function show($id)
    // {
    //     $coWorkSpaces = Cws::where('user_id',$id)->get();
    //     return view('admin.cowork.user-co-work-spaces',compact('coWorkSpaces'));
    // }
}