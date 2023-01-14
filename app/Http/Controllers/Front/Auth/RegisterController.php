<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\SocialProvider;
use App\Models\User;
use App\Notifications\RegisterNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('front.auth.register', compact('countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    { 
        $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));

        $user = new User;
        $user->fname =  $request->first_name; 
        $user->lname =  $request->last_name;
        $user->unique_name =  ('th2-0-').($this->getUniqueSlug($request->first_name));
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->slug = $this->getUniqueSlug($request->first_name);
        $user->dob = date('Y-m-d',strtotime($request->birth_date));
        $user->gender = $request->gender;
        $user->country_id = $request->country;
        $user->currency = $request->currency;
        $user->password = Hash::make($request->password);
        // dd(Input::file('profile-image'));
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/user/profile-image/'), $new_name);
            $name = $new_name;
        }else{
            $name = null;
        }

        $user->images = [
            'profile_image' => [
                                'name' => $name
                            ],
            'selfie' => [
                        'name' => null,
                        'is_approved' => null
                    ],
           'government_id' => array(
                        [
                            'name' => null,
                            'is_approved' => null
                        ],
                        [
                            'name' => null,
                            'is_approved' => null
                        ]
                    ),
        ];
        $user->save();

        $data = ['short_subject' => 'TH2.0 REGISTRATION SUCCESSFUL', 'message' => $user->fname.' '.$user->lname.' registered successfully.', 'link' => url('/')];
        $admin = Admin::first();
        $admin->notify(new RegisterNotification($data));

        $data = ['short_subject' => 'TH2.0 REGISTRATION SUCCESSFUL', 'message' => 'You are registered successfully with TH2-0.', 'link' => url('/admin/user')];
        $user->notify(new RegisterNotification($data));

       // return $user;

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:55'],
            'last_name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birth_date' => ['required', 'before:today'],
            'gender' => ['required'],
            'country' => ['required'],
            'currency' => ['required'],
            'phone' => ['required','numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       // $user = User::create([
       //      'fname' => $data['first_name'],
       //      'lname' => $data['last_name'],
       //      'unique_name' => ('th2-0-').($this->getUniqueSlug($data['first_name'])),
       //      'email' => $data['email'],
       //      'phone' => $data['phone'],
       //      'birth_date' => $data['birth_date'],
       //      'gender' => $data['gender'],
       //      'password' => Hash::make($data['password']),
       //      'slug' => $this->getUniqueSlug($data['first_name']),
       //  ]); 

        $user = new User;
        $user->fname =  $data['first_name']; 
        $user->lname =  $data['last_name'];
        $user->unique_name =  ('th2-0-').($this->getUniqueSlug($data['first_name']));
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->slug = $this->getUniqueSlug($data['first_name']);
        $user->dob = date('Y-m-d',strtotime($data['birth_date']));
        $user->gender = $data['gender'];
        $user->password = Hash::make($data['password']);
        // dd(Input::file('profile-image'));
        // if($data->file['profile-image']){
        //     $image = $data->file['profile-image'];
        //     $new_name = time(). '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('img/user/profile-image/'), $new_name);
        // }

        // if($new_name == null){
        //     $name = null;
        // }else{
        //     $name = $new_name;
        // }
        $user->images = [
            'profile_image' => [
                                'name' => null
                            ],
            'selfie' => [
                        'name' => null,
                        'is_approved' => null
                    ],
           'government_id' => [
                        'name' => null,
                        'is_approved' => null
                    ],
        ];
        $user->save();

        $data = ['message' => $user->fname.' '.$user->lname.' registered successfully.', 'link' => url('/')];
        $admin = Admin::first();
        $admin->notify(new RegisterNotification($data));

        $data = ['message' => 'You are register successfully with TH2-0', 'link' => url('/admin/user')];
        $user->notify(new RegisterNotification($data));

       return $user;
    }
    
    
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        try{
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e){
            return redirect('/');
        }
        
        //Check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();

        if($socialProvider)
        {
            $user = User::find($socialProvider->user_id);  
            
        }else{
            $user = User::where('email', $socialUser->getEmail())->first();
            // $socialProvider->delete();
            if($user){
                $user->socialProviders()->create(
                    ['provider_id' => $socialUser->getId(), 'provider' => $provider]
                );
            }
            
        }
        if(!$user){
                //create a new user and provider
                $user = new User;
                $user->fname = $socialUser->getName();
                $user->email = $socialUser->getEmail();
                $user->slug = $this->getUniqueSlug($socialUser->getName());
                $user->unique_name =  ('th2-0-').($this->getUniqueSlug($socialUser->getName()));
                $user->images = [
                    'profile_image' => [
                                        'name' => null
                                    ],
                    'selfie' => [
                                'name' => null,
                                'is_approved' => null
                            ],
                   'government_id' => [
                                'name' => null,
                                'is_approved' => null
                            ],
                ];
                $user->save();
            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );
            $data = ['message' => $user->fname.' registered successfully.', 'link' => url('/admin/user')];
            $admin = Admin::first();
            $admin->notify(new RegisterNotification($data));

            $data = ['message' => 'You are register successfully with TH2-0', 'link' => url('/')];
            $user->notify(new RegisterNotification($data));
        }
        $this->guard()->login($user);
        if(empty($user->lname) || empty($user->dob)){
            return redirect()->route('setting.index');
        }else{
            return redirect()->route('home');
            // return redirect()->url(session('url.intended'));
        }
        // return $uesr->getEmail();
    }

    public function getUniqueSlug($name)
    {
        $slug = strtolower(Str::slug($name,'-')); 
        $user = User::where('slug', $slug)->first();

        if($user) {
            $name_avail = $name.rand(1000,9999);
            $slug = $this->getUniqueSlug($name_avail);
        }          
        
        return $slug;
    }
}
