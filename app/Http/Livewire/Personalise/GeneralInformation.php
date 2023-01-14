<?php

namespace App\Http\Livewire\Personalise;

use App\Models\Personalise;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;

class GeneralInformation extends Component
{
    public $user;
    public $fname;
    public $lname;
    public $unique_name;
    public $email;
    public $phone;
    public $gender;
    public $dob;
    public $profession;
    public $marital_status;
    public $current_location;
    public $hometown;

    protected $listeners = ["selectDate" => 'getSelectedDate'];

    public function mount()
    {
        $user = User::with('personalise')->findOrFail(Auth::user()->id);
        $this->user = $user;
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->unique_name = $user->unique_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->gender = $user->gender;
        $this->dob = $user->dob;
        if(empty($user->personalise->profession)){
            $this->profession = '';    
        }else{
            $this->profession = $user->personalise->profession;
        }
        if(empty($user->personalise->marital_status)){
            $this->marital_status = '';
        }else{
            $this->marital_status = $user->personalise->marital_status;
        }
        if(empty($user->personalise->current_location)){
            $this->current_location = '';
        }else{
            $this->current_location = $user->personalise->current_location;
        }
        if(empty($user->personalise->hometown)){
            $this->hometown = '';
        }else{
            $this->hometown = $user->personalise->hometown;
        }
    }

    public function render()
    {
        return view('livewire.personalise.general-information');
    }

    public function rules()
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'profession' => 'required',
            'marital_status' => 'required',
            'current_location' => 'required',
            'hometown' => 'required',
        ];
    }

    public function update()
    {
        $this->validate();
        $user = $this->user;
        $user->fname = $this->fname;
        $user->lname = $this->lname;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->gender = $this->gender;
        $user->dob = date('Y-m-d', strtotime($this->dob));
        $user->save();
        $personalise =  Personalise::where('user_id', $user->id)->first();
        if(!$personalise){
            $personalise = new Personalise();
            $personalise->user_id = $user->id;
        }
        $personalise->profession = $this->profession;
        $personalise->marital_status = $this->marital_status;
        $personalise->current_location = $this->current_location;
        $personalise->hometown = $this->hometown;
        $personalise->sunsign = $this->getSunsign($this->dob);
        $personalise->save();
        $this->emit('alert', ['type' => 'Success', 'message' => 'General information updated successfully.']);
    }

    public function getSelectedDate($val)
    {
        $this->dob = $val;
    }

    public function getSunsign($date)
    {
        $sunsign = '';
        $date = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        if(($month == 3 && $date >= 21) || ($month == 4 && $date <= 19)){
            //Mar 21 - Apr 19 (3/21 - 4/19)
            $sunsign = 'Aries';

        }elseif(($month == 4 && $date >= 20) || ($month == 5 && $date <= 20)){
            //Apr 20 - May 20 (4/20 - 5/20)
            $sunsign = 'Taurus';
        }elseif(($month == 5 && $date >= 21) || ($month == 6 && $date <= 20)){
            //May 21 - June 20 (5/21 - 6/20)
            $sunsign = 'Gemini';
        }elseif(($month == 6 && $date >= 21) || ($month == 7 && $date <= 22)){
            //June 21 - July 22 (6/21 - 7/22)
            $sunsign = 'Cancer';
        }elseif(($month == 7 && $date >= 23) || ($month == 8 && $date <= 22)){
            //July 23 - Aug 22 (7/23 - 8/22)
            $sunsign = 'Leo';
        }elseif(($month == 8 && $date >= 23) || ($month == 9 && $date <= 22)){
            //Aug 23 - Sept 22 (8/22 - 9/22)
            $sunsign = 'Virgo';
        }elseif(($month == 9 && $date >= 23) || ($month == 10 && $date <= 22)){
            //Sept 23 - Oct 22 (9/23 - 10/22)
            $sunsign = 'Libra';
        }elseif(($month == 10 && $date >= 23) || ($month == 11 && $date <= 21)){
            //Oct 23 - Nov 21 (10/23 - 11/21)
            $sunsign = 'Scorpio';
        }elseif(($month == 11 && $date >= 22) || ($month == 12 && $date <= 21)){
            //Nov 22 - Dec 21 (11/22 - 12/21)
            $sunsign = 'Sagittarius';
        }elseif(($month == 12 && $date >= 22) || ($month == 1 && $date <= 19)){
            //Dec 22 - Jan 19 (12/22 - 1/19)
            $sunsign = 'Capricorn';
        }elseif(($month == 1 && $date >= 20) || ($month == 2 && $date <= 18)){
            //Jan 20 - Feb 18 (1/20 - 2/18)
            $sunsign = 'Aquarius';
        }elseif(($month == 2 && $date >= 19) || ($month == 3 && $date <= 20)){
            //Feb 19 - Mar 20 (2/19 - 3/20)
            $sunsign = 'Pisces';
        }
        return $sunsign;
    }
}
