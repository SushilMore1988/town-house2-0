<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use App\Models\CwsFacilityCategory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Facilities extends Component
{
    use LivewireAlert;

    public $coWorkSpace;

    public $facilities = [], $other_facilities = [];

    public $coWorkSpaceFacilityCategories;

    public function rules()
    {
        return [
            'facilities' => 'required',
            'other_facilities.*' => 'required',
        ];
    }

    public function mount(Cws $cws)
    {
        $this->coWorkSpace = $cws;
        $this->facilities = $cws->facilities['facilities'];
        $this->other_facilities = $cws->facilities['other_facilities'];
        $this->coWorkSpace = $cws;

        $this->coWorkSpaceFacilityCategories = CwsFacilityCategory::all();
    }

    public function render()
    {
        return view('livewire.co-work.edit.facilities');
    }

    public function save($save)
    {
        $this->coWorkSpace->update([
            'facilities' => [
                'facilities' => $this->facilities, 
                'other_facilities' => $this->other_facilities
                ]
            ]);

        $this->alert('success', 'Co-work space facilities updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'location');
        }else{
            $this->emit('setCurrentTab', 'facilities');
        }
    }
}
