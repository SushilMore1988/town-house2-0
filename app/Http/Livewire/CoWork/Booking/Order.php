<?php

namespace App\Http\Livewire\CoWork\Booking;

use App\Models\CwsBooking;
use App\Models\CwsPayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{
    public $cwsBooking;
    public $coWorkSpace;
    public $cwsPaymentId;
    public $paymentType;
    public $totalAmount = 0;
	public $promo_code, $promo_code_type, $promo_code_discount;

    public function mount(CwsBooking $cwsBooking)
    {
        $this->cwsBooking = $cwsBooking;
        $this->coWorkSpace = $cwsBooking->cws;
        $this->paymentType = 'All';
        $this->setTotalAmount();
    }

    public function render()
    {
        return view('livewire.co-work.booking.order');
    }

    public function makePayment()
    {
        $this->validate([
			'cwsBooking.id' => 'required',
		]);
        
		$coWorkSpaceBooking = $this->cwsBooking;
		$coWorkSpace = $this->coWorkSpace;

		$data = [];

		$data['items'] = [];
		
		if($coWorkSpaceBooking->sharedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Shared Desk',
                'price' => $coWorkSpaceBooking->sharedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->sharedDeskBooking->no_of_desk,
			]);
		}

		if($coWorkSpaceBooking->dedicatedDeskBooking){
			array_push($data['items'], [
				'name'  => 'Dedicated Desk',
                'price' => $coWorkSpaceBooking->dedicatedDeskBooking->price,
                'qty'   => $coWorkSpaceBooking->dedicatedDeskBooking->no_of_desk,
			]);
		}

		if($coWorkSpaceBooking->privateOfficeBooking){
			array_push($data['items'], [
				'name'  => 'Private Office',
                'price' => $coWorkSpaceBooking->privateOfficeBooking->price,
                'qty'   => 1,
			]);
		}
		if($coWorkSpaceBooking->meetingRoomBooking){
			array_push($data['items'], [
				'name'  => 'Meeting Room',
                'price' => $coWorkSpaceBooking->meetingRoomBooking->price,
                'qty'   => 1,
			]);
		}

        $order_id = CwsPayment::all()->count() + 199;
        $data['invoice_id'] = config('paypal.invoice_prefix').'B_'.$order_id;
        
        $coWorkSpacePayment = new CwsPayment;

		if(!empty($this->promo_code)){
			
			$coWorkSpace->promo_code = $this->promo_code;
			$coWorkSpace->promo_code_type = $this->promo_code_type;
			$coWorkSpace->promo_code_discount = $this->promo_code_discount;
			
		}
		

		// $coWorkSpacePayment->cws_booking_id = Session::get('coWorkSpaceBookingId');
		$coWorkSpacePayment->cws_booking_id = $coWorkSpaceBooking->id;
 		$coWorkSpacePayment->status = 'pending';
		$coWorkSpacePayment->payment_for = 'Booking Co-working space';
		$coWorkSpacePayment->amount = $this->cwsBooking->total;
		$coWorkSpacePayment->txnid = $data['invoice_id'];
		$coWorkSpacePayment->firstname = Auth::user()->fname.' '.Auth::user()->lname;
		$coWorkSpacePayment->email = Auth::user()->email;
		$coWorkSpacePayment->phone = Auth::user()->phone;
		$coWorkSpacePayment->dated = date('Y-m-d H:i:s');
		if(!empty($this->promo_code)){
			$coWorkSpace->promo_code = $this->promo_code;
			$coWorkSpace->promo_code_type = $this->promo_code_type;
			$coWorkSpace->promo_code_discount = $this->promo_code_discount;
		}
		$coWorkSpacePayment->save();

        $this->cwsPaymentId = $coWorkSpacePayment->id;
        
		if($coWorkSpaceBooking->currency == "INR"){
            $this->dispatchBrowserEvent('payUsingRazorPay', ['coWorkSpacePayment' => $coWorkSpacePayment]);
        }else{
            $this->dispatchBrowserEvent('payUsingPayumoney', ['rentPackagePayment' => $coWorkSpacePayment]);
        }
    }

    public function setTotalAmount()
    {
        if($this->paymentType == 'All'){
            $this->totalAmount = $this->cwsBooking->total;
        }elseif($this->paymentType == 'Monthly'){
            if($this->cwsBooking->sharedDeskBooking()->count() > 0){
                $this->totalAmount = $this->coWorkSpace->size['shared_desk']['pricing']['1 Month'];
            }elseif($this->cwsBooking->dedicatedDeskBooking()->count() > 0){
                $this->totalAmount = $this->coWorkSpace->size['dedicated_desk']['pricing']['1 Month'];
            }elseif($this->cwsBooking->privateOfficeBooking()->count() > 0){
                $this->totalAmount = $this->coWorkSpace->size['private_offices']['types'][$this->cwsBooking->privateOfficeBooking->office_id]['pricing']['1 Month'];
            }elseif($this->cwsBooking->meetingRoomBooking()->count() > 0){
                $this->totalAmount = $this->coWorkSpace->size['meeting_rooms']['types'][$this->cwsBooking->meetingRoomBooking->meeting_room_id]['pricing']['1 Month'];
            }else{
                $this->totalAmount = $this->cwsBooking->total;
            }
        }
    }

    public function updatedPaymentType()
    {
        $this->setTotalAmount();
    }
}
