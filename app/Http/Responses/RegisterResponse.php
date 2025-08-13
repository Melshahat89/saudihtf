<?php
 
namespace App\Http\Responses;

use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Contracts\RegisterResponse as ContractsRegisterResponse;

class RegisterResponse implements ContractsRegisterResponse
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // $home = auth()->user()->is_admin ? '/admin' : '/dashboard';
        // if(!auth()->user()->facebook_identifier){
        //     Mail::to(auth()->user()->email)->send(new VerifyMail(auth()->user(), URL::previous()));
        //      alert()->success(trans('website.We sent you an activation code. Check your email and click on the link to verify.'), trans('website.Success'));
        //      auth()->logout();
        //  }
 
         return back();
    }
}
