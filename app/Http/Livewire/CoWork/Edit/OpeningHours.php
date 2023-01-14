<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class OpeningHours extends Component
{
    use LivewireAlert;

    protected $listeners = ['selectFromTime', 'selectToTime'];
    
    public $coWorkSpace;

    public $timing;

    public $specific_time_info;

    public $submitValue;

    public function rules()
    {
        return [
            'timing.sunday.checked' => 'nullable',
            'timing.sunday.from' => 'nullable',
            'timing.sunday.to' => 'nullable',

            'timing.monday.checked' => 'nullable',
            'timing.monday.from' => 'nullable',
            'timing.monday.to' => 'nullable',

            'timing.tuesday.checked' => 'nullable',
            'timing.tuesday.from' => 'nullable',
            'timing.tuesday.to' => 'nullable',

            'timing.wednesday.checked' => 'nullable',
            'timing.wednesday.from' => 'nullable',
            'timing.wednesday.to' => 'nullable',

            'timing.thursday.checked' => 'nullable',
            'timing.thursday.from' => 'nullable',
            'timing.thursday.to' => 'nullable',

            'timing.friday.checked' => 'nullable',
            'timing.friday.from' => 'nullable',
            'timing.friday.to' => 'nullable',

            'timing.saturday.checked' => 'nullable',
            'timing.saturday.from' => 'nullable',
            'timing.saturday.to' => 'nullable',

            'specific_time_info' => 'nullable',
        ];
    }

    public function mount(Cws $cws)
    {
        $this->coWorkSpace = $cws;

        $this->timing = $this->coWorkSpace->opening_hours['timing'];
        $this->specific_time_info = $this->coWorkSpace->opening_hours['specific_time_info'];
    }

    public function render()
    {
        return view('livewire.co-work.edit.opening-hours');
    }

    public function selectFromTime($value, $day)
    {
        $this->timing[$day]['from'] = $value;
        if($day == 'monday'){
            foreach(config('constant.DAYS') as $constantDay => $constantValue){
                if(empty($this->timing[$constantDay]['from'])){
                    $this->timing[$constantDay]['from'] = $value;
                }
            }
        }
    }

    public function selectToTime($value, $day)
    {
        $this->timing[$day]['to'] = $value;
        if($day == 'monday'){
            foreach(config('constant.DAYS') as $constantDay => $constantValue){
                if(empty($this->timing[$constantDay]['to'])){
                    $this->timing[$constantDay]['to'] = $value;
                }
            }
        }
    }

    public function store($save)
    {
        $this->validate();
        
        $this->coWorkSpace->update([
            'opening_hours' => [
                'timing' => $this->timing,
                'specific_time_info' => $this->specific_time_info
            ]
        ]);
        
        $this->alert('success', 'Co-work space opening hours timings updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'size');
        }else{
            $this->emit('setCurrentTab', 'opening-hours');
        }
    }
}
