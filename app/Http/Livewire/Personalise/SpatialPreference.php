<?php

namespace App\Http\Livewire\Personalise;

use App\Models\SpatialPreference as ModelsSpatialPreference;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SpatialPreference extends Component
{
    public $user, $spatialPreference, $liv, $kit, $din, $bed, $toi, $share_liv, $share_kit, $share_din, $share_bed, $share_toi, $max_members;

    public function mount()
    {
        $user = User::with('spatialPreference')->findOrFail(Auth::user()->id);
        $this->user = $user;
        $this->spatialPreference = $user->spatialPreference;

        if(empty($this->spatialPreference->liv)){
            $this->liv = "";
        }else{
            $this->liv = $this->spatialPreference->liv;
        }
        
        if(empty($this->spatialPreference->kit)){
            $this->kit = "";
        }else{
            $this->kit = $this->spatialPreference->kit;
        }
        
        if(empty($this->spatialPreference->din)){
            $this->din = "";
        }else{
            $this->din = $this->spatialPreference->din;
        }
        
        if(empty($this->spatialPreference->bed)){
            $this->bed = "";
        }else{
            $this->bed = $this->spatialPreference->bed;
        }

        if(empty($this->spatialPreference->toi)){
            $this->toi = "";
        }else{
            $this->toi = $this->spatialPreference->toi;
        }

        if(empty($this->spatialPreference->share_liv)){
            $this->share_liv = 0;
        }else{
            $this->share_liv = $this->spatialPreference->share_liv;
        }

        if(empty($this->spatialPreference->share_kit)){
            $this->share_kit = 0;
        }else{
            $this->share_kit = $this->spatialPreference->share_kit;
        }

        if(empty($this->spatialPreference->share_din)){
            $this->share_din = 0;
        }else{
            $this->share_din = $this->spatialPreference->share_din;
        }

        if(empty($this->spatialPreference->share_bed)){
            $this->share_bed = 0;
        }else{
            $this->share_bed = $this->spatialPreference->share_bed;
        }

        if(empty($this->spatialPreference->share_toi)){
            $this->share_toi = 0;
        }else{
            $this->share_toi = $this->spatialPreference->share_toi;
        }

        if(empty($this->spatialPreference->max_members)){
            $this->max_members = 0;
        }else{
            $this->max_members = $this->spatialPreference->max_members;
        }
    }

    public function render()
    {
        return view('livewire.personalise.spatial-preference');
    }

    public function update()
    {
        $spatialPreference = ModelsSpatialPreference::where('user_id', Auth::id())->first();
        if(!$spatialPreference){
            $spatialPreference = new ModelsSpatialPreference();
            $spatialPreference->user_id = Auth::id();
        }
        $spatialPreference->liv = $this->liv;
        $spatialPreference->kit = $this->kit;
        $spatialPreference->din = $this->din;
        $spatialPreference->bed = $this->bed;
        $spatialPreference->toi = $this->toi;
        $spatialPreference->share_liv = $this->share_liv;
        $spatialPreference->share_kit = $this->share_kit;
        $spatialPreference->share_din = $this->share_din;
        $spatialPreference->share_bed = $this->share_bed;
        $spatialPreference->share_toi = $this->share_toi;
        $spatialPreference->max_members = $this->max_members;
        $spatialPreference->save();
        $this->emit('alert', ['type' => 'Success', 'message' => 'Spatial preference updated successfully.']);
    }

    public function increaseMaxMembers()
    {
        if(!$this->max_members){
            $this->max_members = 1;
        }else{
            $this->max_members++;
        }
    }

    public function decreaseMaxMembers()
    {
        if(!$this->max_members){
            $this->max_members = 0;
        }else{
            if($this->max_members > 0){
                $this->max_members--;
            }
        }
    }
}
