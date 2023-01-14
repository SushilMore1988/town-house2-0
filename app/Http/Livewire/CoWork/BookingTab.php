<?php

namespace App\Http\Livewire\CoWork;

use App\Models\Cws;
use App\Models\CwsBooking;
use App\Models\CwsBookingMeetingRoom;
use App\Models\CwsBookingPrivateOffice;
use App\Models\CwsBookingSharedDesk;
use App\Models\CwsDedicatedDeskBooking;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class BookingTab extends Component
{
    use LivewireAlert;

    protected $listeners = ['selectBookingDate', 'selectCheckInTime'];

    public $coWorkSpace, $tax;

    public $booking_day, $booking_month, $booking_year, $booking_date, $check_in_time = "12 : 00 PM";

    public $shared_desk_booking = null, $shared_desk_booking_count = 0, $shared_desk_booking_amount = 0;
    public $dedicated_desk_booking = null, $dedicated_desk_booking_count = 0, $dedicated_desk_booking_amount = 0;
    public $private_office_booking = null, $private_office_booking_count = 0, $private_office_booking_amount = 0;
    public $meeting_room_booking = null, $meeting_room_booking_count = 0, $meeting_room_booking_amount = 0;
    public $total_amount = 0;
    public $selectedSharedPrice = 0;


    public $private_office = null;

    public $meeting_room = null;

    public $is_active_accordion = 'shared';

    public $size;

    public $user;

    public $currency;

    public $sharedSpace;

    public function mount(Cws $cws)
    {
        $this->currency = $cws->size['currency'];
        $this->user = Auth::user();
        $this->coWorkSpace = $cws;
        $this->tax = Tax::where('name', 'GST')->first();
        $this->size = $this->coWorkSpace->size;
        // dd($this->size);
        $this->booking_date = date('Y-m-d', strtotime(date('Y-m-d'). '+1 day'));
        $this->booking_day = date('d', strtotime($this->booking_date));
        $this->booking_month = date('F', strtotime($this->booking_date));
        $this->booking_year = date('Y', strtotime($this->booking_date));
    }

    public function render()
    {
        return view('livewire.co-work.booking-tab');
    }

    public function selectBookingDate($date)
    {
        $this->booking_date = date('Y-m-d', strtotime($date));
        $this->booking_day = date('d', strtotime($this->booking_date));
        $this->booking_month = date('F', strtotime($this->booking_date));
        $this->booking_year = date('Y', strtotime($this->booking_date));
    }

    public function selectCheckInTime($time)
    {
        $this->check_in_time = $time;
    }

    public function onDedicatedDeskClick($value){
        if($value == $this->dedicated_desk_booking){
            $this->dedicated_desk_booking = null;
        }else{
            $this->dedicated_desk_booking = $value;
        }
        $this->getTotalAmount();
    }
    
    public function minusDedicatedDeskCountBooking(){
        if($this->dedicated_desk_booking_count <= 0){
            $this->dedicated_desk_booking_count = 0;
        }else{
            $this->dedicated_desk_booking_count--;
        }
        $this->getTotalAmount();
    }
    
    public function plusDedicatedDeskCountBooking(){
        if($this->dedicated_desk_booking_count < $this->size['dedicated_desk']['for_listing']){
            $this->dedicated_desk_booking_count++;
        }
        $this->getTotalAmount();
    }
    
    public function onSharedDeskClick($value){
        if($value == $this->shared_desk_booking){
            $this->shared_desk_booking = null;
        }else{
            $this->shared_desk_booking = $value;
        }
        $this->getTotalAmount();
    }
    
    public function minusSharedDeskCountBooking(){
        if($this->shared_desk_booking_count <= 0){
            $this->shared_desk_booking_count = 0;
        }else{
            $this->shared_desk_booking_count--;
        }
        $this->getTotalAmount();
    }
    
    public function plusSharedDeskCountBooking(){
        if($this->shared_desk_booking_count < $this->size['shared_desk']['for_listing']){
            $this->shared_desk_booking_count++;
        }
        $this->getTotalAmount();
    }
    
    public function onPrivateOfficeClick($value){
        if($value == $this->private_office_booking){
            $this->private_office_booking = null;
        }else{
            $this->private_office_booking = $value;
        }
        $this->getTotalAmount();
    }
    
    public function minusPrivateOfficeCountBooking(){
        if($this->private_office != null){
            if($this->private_office_booking_count <= 0){
                $this->private_office_booking_count = 0;
            }else{
                $this->private_office_booking_count--;
            }
            $this->getTotalAmount();
        }
    }
    
    public function plusPrivateOfficeCountBooking(){
        if($this->private_office != null){
            if($this->private_office_booking_count < $this->size['private_offices']['types'][$this->private_office]['quantity']){
                $this->private_office_booking_count++;
            }
            $this->getTotalAmount();
        }
    }
    
    public function onMeetingRoomClick($value){
        if($value == $this->meeting_room_booking){
            $this->meeting_room_booking = null;
        }else{
            $this->meeting_room_booking = $value;
        }
        $this->getTotalAmount();
    }
    
    public function minusMeetingRoomCountBooking(){
        if($this->meeting_room != null){
            if($this->meeting_room_booking_count <= 0){
                $this->meeting_room_booking_count = 0;
            }else{
                $this->meeting_room_booking_count--;
            }
            $this->getTotalAmount();
        }
    }
    
    public function plusMeetingRoomCountBooking(){
        if($this->meeting_room != null){
            if($this->meeting_room_booking_count < $this->size['meeting_rooms']['types'][$this->meeting_room]['quantity']){
                $this->meeting_room_booking_count++;
            }
            $this->getTotalAmount();
        }
    }

    public function getTotalAmount(){
        // dd($this->size);
        $this->shared_desk_booking_amount = 0;
        if($this->shared_desk_booking_count > 0 && !empty($this->shared_desk_booking)){
            if(empty($this->coWorkSpace->gst)){
                $this->shared_desk_booking_amount = $this->size['shared_desk']['pricing'][$this->shared_desk_booking]*$this->shared_desk_booking_count;
            }else{
                $this->shared_desk_booking_amount = ($this->size['shared_desk']['pricing'][$this->shared_desk_booking] + ($this->size['shared_desk']['pricing'][$this->shared_desk_booking]*$this->tax->tax/100))*$this->shared_desk_booking_count;
            }
            // ? $value : ($value+($value*$tax->tax/100));
        }
        $this->dedicated_desk_booking_amount = 0;
        if($this->dedicated_desk_booking_count > 0 && !empty($this->dedicated_desk_booking)){
            if(empty($this->coWorkSpace->gst)){
                $this->dedicated_desk_booking_amount = $this->size['dedicated_desk']['pricing'][$this->dedicated_desk_booking]*$this->dedicated_desk_booking_count;
            }else{
                $this->dedicated_desk_booking_amount = ($this->size['dedicated_desk']['pricing'][$this->dedicated_desk_booking] + ($this->size['dedicated_desk']['pricing'][$this->dedicated_desk_booking]*$this->tax->tax/100))*$this->dedicated_desk_booking_count;
            }
        }

        $this->private_office_booking_amount = 0;
        if($this->private_office_booking_count > 0 && !empty($this->private_office_booking)){
            if(empty($this->coWorkSpace->gst)){
                $this->private_office_booking_amount = $this->size['private_offices']['types'][$this->private_office]['pricing'][$this->private_office_booking]*$this->private_office_booking_count;
            }else{
                $this->private_office_booking_amount = ($this->size['private_offices']['types'][$this->private_office]['pricing'][$this->private_office_booking] + ($this->size['private_offices']['types'][$this->private_office]['pricing'][$this->private_office_booking]*$this->tax->tax/100))*$this->private_office_booking_count;
            }
        }

        $this->meeting_room_booking_amount = 0;
        if($this->meeting_room_booking_count > 0 && !empty($this->meeting_room_booking)){
            if(empty($this->coWorkSpace->gst)){
                $this->meeting_room_booking_amount = $this->size['meeting_rooms']['types'][$this->meeting_room]['pricing'][$this->meeting_room_booking]*$this->meeting_room_booking_count;
            }else{
                $this->meeting_room_booking_amount = ($this->size['meeting_rooms']['types'][$this->meeting_room]['pricing'][$this->meeting_room_booking] + ($this->size['meeting_rooms']['types'][$this->meeting_room]['pricing'][$this->meeting_room_booking]*$this->tax->tax/100))*$this->meeting_room_booking_count;
            }
        }

        if($this->is_active_accordion == 'shared'){
            $this->total_amount = $this->shared_desk_booking_amount;
        }elseif($this->is_active_accordion == 'dedicated'){
            $this->total_amount = $this->dedicated_desk_booking_amount;
        }elseif($this->is_active_accordion == 'private'){
            $this->total_amount = $this->private_office_booking_amount;
        }elseif($this->is_active_accordion == 'meeting-room'){
            $this->total_amount = $this->meeting_room_booking_amount;
        }else{
            $this->total_amount = 0;
        }
    }

    public function updatedPrivateOffice($value){
        $this->getTotalAmount();
    }

    public function updatedMeetingRoom($value){
        $this->getTotalAmount();
    }

    public function store()
    {
        //Validate request
        //First check for accordian
        if($this->is_active_accordion == 'shared'){
            $this->validate([
                'shared_desk_booking_count' => 'required|numeric|min:0|not_in:0',
                'shared_desk_booking' => 'required',
                'total_amount' => 'required',
            ],[
                'shared_desk_booking.required' => 'Please select duration.',
                'shared_desk_booking_count.required' => 'Please select number of desks required.',
                'shared_desk_booking_count.not_in' => 'Please select number of desks required.',
            ]);
        }elseif($this->is_active_accordion == 'dedicated'){
            $this->validate([
                'dedicated_desk_booking_count' => 'required|numeric|min:0|not_in:0',
                'dedicated_desk_booking' => 'required',
                'total_amount' => 'required',
            ],[
                'dedicated_desk_booking.required' => 'Please select duration.',
                'dedicated_desk_booking_count.required' => 'Please select number of desks required.',
                'dedicated_desk_booking_count.not_in' => 'Please select number of desks required.',
            ]);
        }elseif($this->is_active_accordion == 'private'){
            $this->validate([
                'private_office_booking_count' => 'required|numeric|min:0|not_in:0',
                'private_office_booking' => 'required',
                'total_amount' => 'required',
            ],[
                'private_office_booking.required' => 'Please select duration.',
                'private_office_booking_count.required' => 'Please select number of desks required.',
                'private_office_booking_count.not_in' => 'Please select number of desks required.',
            ]);
        }elseif($this->is_active_accordion == 'meeting-room'){
            $this->validate([
                'meeting_room_booking_count' => 'required|numeric|min:0|not_in:0',
                'meeting_room_booking' => 'required',
                'total_amount' => 'required',
            ],[
                'meeting_room_booking.required' => 'Please select duration.',
                'meeting_room_booking_count.required' => 'Please select number of desks required.',
                'meeting_room_booking_count.not_in' => 'Please select number of desks required.',
            ]);
        }

		if(empty($this->user->lname) || empty($this->user->phone) || empty($this->user->gender) || empty($this->user->dob) || empty($this->user->fname) || empty($this->user->email)){
			return redirect()->route('setting.index')->with('message', 'Please update your profile first');
		}

        if($this->user->id == $this->coWorkSpace->user_id){
            $this->alert('error', 'You cannot book your own property.');
            return;
        }
         
       	$check_in_day = (date('l', strtotime($this->booking_date)));
       	
		$office_close_day = strtolower((date('l', strtotime($this->booking_date. ' -1 day' ))));
       	

        if($this->is_active_accordion != 'meeting-room'){
            foreach(config('constant.DAYS') as $day => $key){
                if(strtolower($day) == strtolower($check_in_day)){
                    if(($this->coWorkSpace->opening_hours['timing'][$office_close_day]['to'] < strtotime(now())) && (strtotime(now()) < $this->coWorkSpace->opening_hours['timing'][$day]['from'])){
                        $this->check_in_time = strtotime($this->coWorkSpace->opening_hours['timing'][$day]['from']) + 7200;
                    }else{ 
                        $this->check_in_time = $this->coWorkSpace->opening_hours['timing'][$day]['from'];
                    }
                }
            }
            $this->validate([
                'booking_date' => 'required',
                'check_in_time' => 'required',
            ]);
        }else{
            $this->validate([
                'booking_date' => 'required',
                'check_in_time' => 'required',
            ]);
        }
        
        //Check for availability of booking space

        $cwsBooking = new CwsBooking();
        $cwsBooking->user_id = $this->user->id;
        $cwsBooking->cws_id =$this->coWorkSpace->id;
        $cwsBooking->start_date = $this->booking_date;
        $cwsBooking->check_in_time = $this->check_in_time;
        $cwsBooking->total = $this->total_amount;
        $cwsBooking->currency = $this->currency;
        $cwsBooking->status = "Pending";

        if($cwsBooking->save()){

        	if($this->is_active_accordion == 'shared'){
				$sharedDesk = new CwsBookingSharedDesk();
				$sharedDesk->cws_booking_id = $cwsBooking->id;
				$sharedDesk->no_of_desk = $this->shared_desk_booking_count;
				$sharedDesk->duration = $this->shared_desk_booking;
				$sharedDesk->price = $this->total_amount;
				$sharedDesk->save();
			}elseif($this->is_active_accordion == 'dedicated'){
				$dedicatedDesk = new CwsDedicatedDeskBooking();
				$dedicatedDesk->cws_booking_id = $cwsBooking->id;
				$dedicatedDesk->no_of_desk = $this->dedicated_desk_booking_count;
				$dedicatedDesk->duration = $this->dedicated_desk_booking;
				$dedicatedDesk->price = $this->total_amount;
				$dedicatedDesk->save();
			}elseif($this->is_active_accordion == 'private'){
				$privateOfficeBooking = new CwsBookingPrivateOffice();
				$privateOfficeBooking->cws_booking_id = $cwsBooking->id;
				$privateOfficeBooking->duration = $this->private_office_booking;
				$privateOfficeBooking->no_of_offices = $this->private_office_booking_count;
				$privateOfficeBooking->office_id = $this->private_office;
				$privateOfficeBooking->price = $this->total_amount;
				$privateOfficeBooking->save();
			}elseif($this->is_active_accordion == 'meeting-room'){
				$meetingRoomBooking = new CwsBookingMeetingRoom();
				$meetingRoomBooking->cws_booking_id = $cwsBooking->id;
				$meetingRoomBooking->no_of_meeting_rooms = $this->meeting_room_booking_count;
				$meetingRoomBooking->duration = $this->meeting_room_booking;
				$meetingRoomBooking->meeting_room_id = $this->meeting_room;
				$meetingRoomBooking->check_in_time = $this->check_in_time;
				$meetingRoomBooking->price = $this->total_amount;
				$meetingRoomBooking->save();
			}
		}

        return redirect()->route('co-work-space.booking-order', ['cwsBooking' => $cwsBooking->id]);
    }
}
