<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Size extends Component
{
    use LivewireAlert;

    public $cws, $size;

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

        $this->size['meeting_rooms']['available'] = empty($this->size['meeting_rooms']['available']) ? 0 : $this->size['meeting_rooms']['available'];
        $this->size['meeting_rooms']['for_listing'] = empty($this->size['meeting_rooms']['for_listing']) ? 0 : $this->size['meeting_rooms']['for_listing'];
        $this->size['meeting_rooms']['types_for_listing'] = empty($this->size['meeting_rooms']['types_for_listing']) ? 0 : $this->size['meeting_rooms']['types_for_listing'];

    }

    public function render()
    {
        return view('livewire.co-work.edit.size');
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
            if($this->size['private_offices']['types_for_listing'] > count($this->size['private_offices']['types'])){
                $this->size['private_offices']['types'][] = [
                                                                'name' => '',
                                                                'quantity' => null,
                                                                'capacity' => null,
                                                                'pricing' => $dedicated_desk_prices,
                ];
            }
        }

        if($this->size['private_offices']['types_for_listing'] > 0 && $val == -1){
            $this->size['private_offices']['types_for_listing']--;
            array_pop($this->size['private_offices']['types']);
        }
        // dd($this->size);
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
            if($this->size['meeting_rooms']['types_for_listing'] > count($this->size['meeting_rooms']['types'])){
                $this->size['meeting_rooms']['types'][] = [
                                                                'name' => '',
                                                                'quantity' => null,
                                                                'capacity' => null,
                                                                'pricing' => $meeting_room_prices,
                ];
            }
        }
        if($this->size['meeting_rooms']['types_for_listing'] > 0 && $val == -1){
            $this->size['meeting_rooms']['types_for_listing']--;
            array_pop($this->size['meeting_rooms']['types']);
        }
    }

    public function store($save) {
        
        $this->cws->size = $this->size;
        $this->cws->save();

        $this->alert('success', 'Co-work space sizes updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'pricing');
        }else{
            $this->emit('setCurrentTab', 'size');
        }
    }

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }
}
