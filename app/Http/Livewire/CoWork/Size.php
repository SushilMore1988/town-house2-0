<?php

namespace App\Http\Livewire\CoWork;

use App\Models\Cws;
use Livewire\Component;

class Size extends Component
{
    public $cws, $size, $submitValue = 'save';

    public function mount(Cws $cws)
    {
        $this->cws = $cws;
        $this->size = $cws->size;

        $this->size['seating_capacity'] = empty($this->size['seating_capacity']) ? 0 : $this->size['seating_capacity'];
        $this->size['size_in_sqft'] = empty($this->size['size_in_sqft']) ? 0 : $this->size['size_in_sqft'];
        $this->size['shared_desk']['available'] = empty($this->size['shared_desk']['available']) ? 0 : $this->size['shared_desk']['available'];
        $this->size['shared_desk']['for_listing'] = empty($this->size['shared_desk']['for_listing']) ? 0 : $this->size['shared_desk']['for_listing'];
        $this->size['dedicated_desk']['available'] = empty($this->size['dedicated_desk']['available']) ? 0 : $this->size['dedicated_desk']['available'];
        $this->size['dedicated_desk']['for_listing'] = empty($this->size['dedicated_desk']['for_listing']) ? 0 : $this->size['dedicated_desk']['for_listing'];
        $this->size['private_offices']['available'] = empty($this->size['private_offices']['available']) ? 0 : $this->size['private_offices']['available'];
        $this->size['private_offices']['for_listing'] = empty($this->size['private_offices']['for_listing']) ? 0 : $this->size['private_offices']['for_listing'];
        $this->size['private_offices']['types_for_listing'] = empty($this->size['private_offices']['types_for_listing']) ? 0 : $this->size['private_offices']['types_for_listing'];
        $this->size['meeting_rooms']['types_for_listing'] = empty($this->size['meeting_rooms']['types_for_listing']) ? 0 : $this->size['meeting_rooms']['types_for_listing'];
        $this->size['meeting_rooms']['available'] = empty($this->size['meeting_rooms']['available']) ? 0 : $this->size['meeting_rooms']['available'];
        $this->size['meeting_rooms']['for_listing'] = empty($this->size['meeting_rooms']['for_listing']) ? 0 : $this->size['meeting_rooms']['for_listing'];

    }

    public function render()
    {
        return view('livewire.co-work.size');
    }

    public function updateSharedDeskCount($val)
    {
        if(empty($this->size['shared_desk']['for_listing'])){
            $this->size['shared_desk']['for_listing'] = 0;
        }
        if($this->size['shared_desk']['for_listing'] < $this->size['shared_desk']['available'] && $val == 1){
            $this->size['shared_desk']['for_listing']++;
        }
        if($this->size['shared_desk']['for_listing'] > 0 && $val == -1){
            $this->size['shared_desk']['for_listing']--;
        }
    }

    public function updateDedicatedDeskCount($val)
    {
        if(empty($this->size['dedicated_desk']['for_listing'])){
            $this->size['dedicated_desk']['for_listing'] = 0;
        }
        if($this->size['dedicated_desk']['for_listing'] < $this->size['dedicated_desk']['available'] && $val == 1){
            $this->size['dedicated_desk']['for_listing']++;
        }
        if($this->size['dedicated_desk']['for_listing'] > 0 && $val == -1){
            $this->size['dedicated_desk']['for_listing']--;
        }
    }

    public function updatePrivateOfficesCount($val)
    {
        if(empty($this->size['private_offices']['for_listing'])){
            $this->size['private_offices']['for_listing'] = 0;
        }
        if($this->size['private_offices']['for_listing'] < $this->size['private_offices']['available'] && $val == 1){
            $this->size['private_offices']['for_listing']++;
        }
        if($this->size['private_offices']['for_listing'] > 0 && $val == -1){
            $this->size['private_offices']['for_listing']--;
        }
    }

    public function updatePrivateOfficesTypeCount($val)
    {
        $dedicated_desk_prices = null;
        foreach(config('constant.CO_WORK_SIZE.dedicated_desk') as $key){
            if(strpos($key, 'Day') === false && strpos($key, 'Week') === false){
                $dedicated_desk_prices[$key] = null;
            }
        }

        if(empty($this->size['private_offices']['types_for_listing'])){
            $this->size['private_offices']['types_for_listing'] = 0;
        }
        if($this->size['private_offices']['types_for_listing'] < $this->size['private_offices']['for_listing'] && $val == 1){
            $this->size['private_offices']['types_for_listing']++;
            $this->size['private_offices']['private_offices'][$this->size['private_offices']['types_for_listing']]['name'] = '';
            $this->size['private_offices']['private_offices'][$this->size['private_offices']['types_for_listing']]['quantity'] = 0;
            $this->size['private_offices']['private_offices'][$this->size['private_offices']['types_for_listing']]['capacity'] = 0;
            $this->size['private_offices']['private_offices'][$this->size['private_offices']['types_for_listing']]['pricing'] = $dedicated_desk_prices;
            // dd($this->size['private_offices']);
        }
        if($this->size['private_offices']['types_for_listing'] > 0 && $val == -1){
            $this->size['private_offices']['types_for_listing']--;
        }
    }

    public function updateMeetingRoomCount($val)
    {
        if(empty($this->size['meeting_rooms']['for_listing'])){
            $this->size['meeting_rooms']['for_listing'] = 0;
        }
        if($this->size['meeting_rooms']['for_listing'] < $this->size['meeting_rooms']['available'] && $val == 1){
            $this->size['meeting_rooms']['for_listing']++;
        }
        if($this->size['meeting_rooms']['for_listing'] > 0 && $val == -1){
            $this->size['meeting_rooms']['for_listing']--;
        }
    }

    public function updateMeetingRoomTypeCount($val)
    {
        $meeting_room_prices = null;
        foreach(config('constant.CO_WORK_SIZE.meeting_room') as $key){
            $meeting_room_prices[$key] = null;
        }

        if(empty($this->size['meeting_rooms']['types_for_listing'])){
            $this->size['meeting_rooms']['types_for_listing'] = 0;
        }
        if($this->size['meeting_rooms']['types_for_listing'] < $this->size['meeting_rooms']['for_listing'] && $val == 1){
            $this->size['meeting_rooms']['types_for_listing']++;
            $this->size['meeting_rooms']['types'][$this->size['meeting_rooms']['types_for_listing']]['name'] = '';
            $this->size['meeting_rooms']['types'][$this->size['meeting_rooms']['types_for_listing']]['quantity'] = 0;
            $this->size['meeting_rooms']['types'][$this->size['meeting_rooms']['types_for_listing']]['capacity'] = 0;
            $this->size['meeting_rooms']['types'][$this->size['meeting_rooms']['types_for_listing']]['pricing'] = $meeting_room_prices;
            // dd($this->size['meeting_rooms']);
        }
        if($this->size['meeting_rooms']['types_for_listing'] > 0 && $val == -1){
            $this->size['meeting_rooms']['types_for_listing']--;
        }
    }

    public function store() {
        $this->cws->size = $this->size;
        $this->cws->save();

        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'pricing-li']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'Sizes saved successfully.']);

    }

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }
}
