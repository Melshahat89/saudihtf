<?php
namespace App\Application\Controllers\Website\Auth;

use App\Application\Controllers\Controller;
use App\Application\Model\PasswordResets;
use App\Application\Model\User;
use App\Mail\ResetPasswordEmail;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Alert;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function showForgetPasswordForm(){
        return view('auth.passwords.email');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // $token = Str::random(64);
        $token = $this->generateNDigitRandomNumber(5);

        $passwordReset = PasswordResets::where('email', $request->email)->where('confirmed', 0)->first();

        if(!$passwordReset){
            $passwordReset = new PasswordResets();
            $passwordReset->email = $request->email;
        }

        $passwordReset->token = $token;
        $passwordReset->created_at = Carbon::now();
        $passwordReset->save();

        $user = User::where('email', $request->email)->first();

        Mail::to($request->email)->send(new ResetPasswordEmail($user, $token));

        alert()->success(trans('website.The token has been sent to your email'));

        return view('auth.passwords.validateToken');


    }

    public function submitValidateTokenForm(Request $request){

        $token = PasswordResets::where('token', $request['token'])->first();
        if(!$token){
            alert()->error(trans('website.Wrong Token'));
            return redirect('/');
        }

        return redirect('/password/reset/' . $token->token);
    }

    public function showResetPasswordForm($token){

        $passwordReset = PasswordResets::where('token', $token)->first();

        if($passwordReset->confirmed == 1){
            alert()->error(trans('website.Wrong Token'));

            return redirect('/');
        }

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $passwordReset->email]
        );
    }

    public function submitResetPasswordForm(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $passwordReset = PasswordResets::where('email', $request->email)->where('token', $request->token)->first();

        if(!$passwordReset){
            alert()->error(trans('website.Wrong Token'));
            return back();
        }

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        event(new PasswordReset($user));

        $passwordReset->confirmed = 1;
        $passwordReset->save();

        $this->guard()->login($user);

        alert()->success(trans('website.Password Updated'));

        return redirect('/');

    }


      /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }


    function generateNDigitRandomNumber($length){
        return mt_rand(pow(10,($length-1)),pow(10,$length)-1);
     }
}
