<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\EmploymentDetails;
use App\Contact;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\MailNotify;
use App\Events\UserRegistered;


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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:14'],
            'role'   => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {  
        $user = new User;

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->mobile = $data['mobile'];
        $user->role = $data['role'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);


        $infor = [
            'message' => 'Registration completed with success.',
        ];

        $user->save();

        //save emploment values to avoid errors
        $employment = new EmploymentDetails;
        $employment->user_id = $user->id;
        $employment->save();

        //save contact details to avoid errors 
        $contact = new Contact;
        $contact->user_id = $user->id;
        $contact->save();

        event(new UserRegistered($user->email, $user->mobile, $user->name, $infor['message']));


        return $user;
    }

}
