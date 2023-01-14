<?php

namespace App\Http\Livewire\Colive;

use App\Models\Cls;
use Illuminate\Http\Request;
use Livewire\Component;

class AboutYourSpace extends Component
{
    public $cls, $name, $description, $email, $phone, $website, $facebook, $twitter, $instagram, $info, $notify_email, $submitValue = 'save';

    public function mount($cls_id)
    {
        $this->cls = Cls::findOrFail($cls_id);
        $this->name = $this->cls->name;
        if(!empty($this->cls->about_your_space)){
            $this->description = $this->cls->about_your_space['description'];
            $this->email = $this->cls->about_your_space['email'];
            $this->phone = $this->cls->about_your_space['phone'];
            $this->website = $this->cls->about_your_space['website'];
            $this->facebook = $this->cls->about_your_space['facebook'];
            $this->twitter = $this->cls->about_your_space['twitter'];
            $this->instagram = $this->cls->about_your_space['instagram'];
            $this->info = $this->cls->about_your_space['info'];
            $this->notify_email = $this->cls->about_your_space['notify_email'];
        }
    }

    public function render()
    {
        return view('livewire.colive.about-your-space');
    }

    public function saveAboutInfo(Request $request)
    {
        $this->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'info' => 'required|max:2048',
            'notify_email' => 'required|email'
        ],[
            'info.required' => 'The information field is required',
        ]);
        
        $this->cls->name = $this->name;
        
        $this->cls->about_your_space = [
            'description' => $this->description,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'info' => $this->info,
            'notify_email' => $this->notify_email,
        ];

        $this->cls->save();
        if($this->submitValue == 'saveAndNext'){
            $this->emit('updateActiveSection', ['value' => 'amenities']);
        }
        $this->emit('alert', ['type' => 'Success', 'message' => 'About co-live information saved successfully.']);
    }

    public function setSubmitValue($value)
    {
        $this->submitValue = $value;
    }
}