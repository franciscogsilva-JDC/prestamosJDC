<?php

namespace App\Http\Controllers\Auth;

use App\DniType;
use App\Gender;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    private $menu_item = 9;
    private $title_page = 'Registrarse';
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
    protected $redirectTo = '/';

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
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
            'name'              =>  'required|string|max:255',
            'email'             =>  'required|string|email|max:255|unique:users',
            'password'          =>  'required|string|min:6|confirmed',
            'dni'               =>  'required|numeric|unique:users',
            //'dni_type_id'       =>  'required',
            //'gender_id'         =>  'required',
            'cellphone_number'  =>  'required|numeric'
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

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->dni = $data['dni'];
        $user->dni_type_id = 1;
        $user->gender_id = 2;
        $user->cellphone_number = $data['cellphone_number'];
        $user->company_name = $data['company_name'];
        $user-> user_status_id = 1;
        $user->user_type_id =   5;
        $user->save();

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $dniTypes = DniType::orderBy('name', 'ASC')->get();
        $genders = Gender::orderBy('name', 'ASC')->get();

        return view('auth.register')
            ->with('dniTypes', $dniTypes)
            ->with('genders', $genders)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }
}
