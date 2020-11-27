<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistrationForm()
    {
        return view('fronts.auth.register');
    }
    public function register(Request $request)
    {
        $validate = $this->validate($request,
            [
                'email' => 'unique:users|required|email',
                'first_name' => 'required|max:15',
                'last_name' => 'required|max:20',
                'phone' => 'required|numeric|min:5',
                'password' => 'required|min:6|max:18',
            ],
            [
                'first_name.required' => 'Trường Tên không được bỏ trống',
                'first_name.max'  =>  'Ký tự tối đa là 255',
                'last_name.required' => 'Trường Tên không được bỏ trống',
                'last_name.max'  =>  'Ký tự tối đa là 255',
                'email.unique'=> 'Email đã được dùng rồi',
                'email.required' => 'Trường Email không được bỏ trống',
                'email.email' => 'Email này không đúng định dạng', 
                'phone.numeric' => 'SDT không đúng định dạng',
                'password.required' => 'Trường mật khẩu không được bỏ trống',
                'password.min' => 'Trường mật khẩu tối thiểu 6 ký tự', 
                'password.max' => 'Trường mật khẩu tối đa 18 ký tự', 
            ]
        );
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('front-dashboard');
    }
}