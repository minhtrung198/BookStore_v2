<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getFormResetPassword()
    {
        return view('fronts.auth.email_password');
    }
    public function sendResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where('email',$email)->first();
        if(!$checkUser){
            return redirect()->back()->with('message','Email không tồn tại');
        }
        $code = bcrypt(md5(time().$email));
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
        $url = route('link-password',['code'=>$checkUser->code,'email'=>$email]);
        $data = [
            'route' => $url
        ];
        Mail::send('fronts.auth.reset_password', $data, function($message) use ($email){
	        $message->to($email, 'Reset password')->subject('lấy lại mật khẩu');
	    });

        return redirect()->back()->with('message','Link lấy lại mật khẩu Email. Vui lòng kiểm tra Email!');
        //dd($code);
    }
    public function resetPassword(Request $request){
        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if($checkUser){
            return redirect('/')->with('danger','Lỗi đường dẫn. Vui lòng thử lại!');
        }
        return view('fronts.auth.reset_password');
    }
    public function saveResetPassword(Request $request){
        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        $checkUser->password = bcrypt($request->password);
        $checkUser->save();
        return redirect()->route('form-login')->with('message','Mật khẩu đã đổi thành công');
    }
    public function resetLinkPassword(Request $request){
        return view('fronts.auth.formReset');
    }
}
