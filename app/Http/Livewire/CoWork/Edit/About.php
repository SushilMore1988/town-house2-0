<?php

namespace App\Http\Livewire\CoWork\Edit;

use App\Models\Cws;
use App\Notifications\EmailVerificationNotification;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class About extends Component
{
    use LivewireAlert;
    
    public $coWorkSpace;

    public $showOtpModal = false;

    public $otp = null, $userOtp = null;

    public $verifiedEmail = null;

    public $user;

    protected function rules()
    {
        return [
            'coWorkSpace.name' => 'required',
            'coWorkSpace.description' => 'required',
            // 'coWorkSpace.email_verified' => 'required',
            'coWorkSpace.contact_details.email_id' => 'required|email',
            'coWorkSpace.contact_details.website' => 'nullable|url',
            'coWorkSpace.contact_details.phone' => ['required', new PhoneNumber],
            'coWorkSpace.contact_details.facebook_url' => 'nullable|url',
            'coWorkSpace.contact_details.twitter_url' => 'nullable|url',
            'coWorkSpace.contact_details.instagram_url' => 'nullable|url',
            'coWorkSpace.information' => 'nullable|max:255',
            'coWorkSpace.notify_email' => 'required|email',
        ];
    }

    public function mount(Cws $cws)
    {
        $this->user = Auth::user();

        $this->coWorkSpace = $cws;

        if(!empty($this->coWorkSpace->email_verified)){
            $this->verifiedEmail = $this->coWorkSpace->contact_details['email_id'];
        }
    }

    public function render()
    {
        return view('livewire.co-work.edit.about');
    }

    public function save($save)
    {
        $validatedData = $this->validate();

        $this->coWorkSpace->save($validatedData);

        if($this->verifiedEmail != $this->coWorkSpace->contact_details['email_id']){
            $this->coWorkSpace->update(['email_verified' => null]);
        }

        $this->alert('success', 'About co-work space updated successfully.');

        if($save != 'save'){
            $this->emit('setCurrentTab', 'facilities');
        }else{
            $this->emit('setCurrentTab', 'about');
        }
    }

    public function sendOtp()
    {
        $this->validate(['coWorkSpace.contact_details.email_id' => 'required|email']);
        
        if($this->sendOtpToEmail($this->coWorkSpace->contact_details['email_id'])){
            $this->showOtpModal = true;
        }else{
            $this->addError('coWorkSpace.contact_details.email_id', 'Error in sending OTP please try after some time.');
        }

    }

    public function sendOtpToEmail($email)
    {      
        if ( isset($email) && $email == "" ) {
            return false;
        } else {
            $this->otp = rand(100000, 999999);

            $mail_array = ['otp' => $this->otp];
            $details = ['message' => 'Your OTP to verify your mail is ', 'otp' => $this->otp];
            try{
                $this->user->notify(new EmailVerificationNotification($this->otp));
                $this->otp = Crypt::encrypt($this->otp);
                return true;
            }
            catch (\Exception $e) {
                return false;
            }
        }
    }

    public function verifyOtp()
    {
        $this->validate(['userOtp' => 'required']);
        if($this->userOtp == Crypt::decrypt($this->otp)){
            $this->coWorkSpace->email_verified = date('Y-m-d H:i:s');
            $this->coWorkSpace->save();
            $this->verifiedEmail = $this->coWorkSpace->contact_details['email_id'];
            $this->showOtpModal = false;
        }else{
            $this->addError('userOtp', 'OTP does not match.');
        }
    }
}
