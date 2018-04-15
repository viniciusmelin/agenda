<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Doctor;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function showRegistrationForm()
    {
        $users = User::pluck('doctor_id')->all();
       
        if($users[0]!= null)
        {
            $doctors = Doctor::whereNotIn('id',$users)->get();
        }
        else
        {
            $doctors = Doctor::all();
        }
        
        return view('auth.register',compact('doctors'));
    }
    protected function validator(array $data)
    {

       
        $messages = [
            'email.riquired' =>'email é obrigatório',
            'email.string' =>'email é obrigatório',
            'email.email' =>'email é obrigatório',
            'email.max' =>'email é obrigatório'            
        ];
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'email.riquired' =>'email é obrigatório',
            'email.string' =>'email é obrigatório',
            'email.email' =>'email é obrigatório',
            'email.max' =>'email é obrigatório'            
        ]);

       
    }

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(isset($data['doctor_id']) && $data['doctor_id']==null)
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);    
        }
        else
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'doctor_id'=>$data['doctor_id'],
                'password' => Hash::make($data['password']),
            ]);   
        }
        
    }
}
