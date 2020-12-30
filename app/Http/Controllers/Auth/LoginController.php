<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('fronts.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->only('email','password');
        if(\Auth::attempt($data))
        {
            $user = Auth::user();
            if($user->role_id == 1){
                return redirect()->route('admin-dashboard');
            }else{
                return redirect()->route('front-dashboard');
            }
        }
        return redirect()->back()->with('fail','Email hoặc mật khẩu không đúng. Vui lòng thử lại !!')->withInput();
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('front-dashboard');
    }
}
