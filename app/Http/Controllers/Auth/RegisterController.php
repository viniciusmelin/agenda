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
    protected $redirectTo = "{{route('user.index')}}";

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
            'name.required'=>'Nome é obrigatório!',
            'name.string'=>'Nome deve ser do tipo texto!',
            'name.max'=>'Tamanho maxímo de 255 caracteres!',
            'email.required' =>'Email é obrigatório',
            'email.string' =>'Email deve ser do tipo texto',
            'email.email' =>'Email não é valído!',
            'email.max' =>'Tamanho maxímo de 255 caracteres!',
            'password.required' =>'Senha é obrigatório!',
            'email.unique'=>'Email já cadastrado!',
            'password.string' =>'Senha deve ser do tipo texto!',
            'password.max' =>'Senha deve conter no minímo 6 caracteres!',            
            'password.confirmed' =>'Repetir Senha novamente!'  
        ];
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'.($this->id ? ",id,$this->id":""),
            'password' => 'required|string|min:6|confirmed',
        ],$messages);

       
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
