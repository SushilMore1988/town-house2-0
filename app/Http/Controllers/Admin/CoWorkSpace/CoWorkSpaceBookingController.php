<?php

namespace App\Http\Controllers\Admin\CoWorkSpace;

use Illuminate\Http\Request;
use App\Models\CwsBooking;

class CoWorkSpaceBookingController extends BaseController
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
        $bookings = CwsBooking::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.co-work.booking',compact('bookings'));
    }

    public function bookingAvailability(){
        $bookings = CwsBooking::all();
        return view('admin.co-work.availability',compact('bookings'));
    }

    public function changeStatus(Request $request){
       $booking = CwsBooking::findOrFail($request->bookingId);
       $booking->status = $request->status;
       $booking->save();
       return response()->json(['message' => 'Status Change Successfully!!!', 'status' => 'success']);
    }
}