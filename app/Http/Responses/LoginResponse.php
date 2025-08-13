<?php
 
namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // $home = auth()->user()->is_admin ? '/admin' : '/dashboard';

        if(!auth()->user()->verified){
            auth()->logout();
            alert()->success(trans('website.We sent you an activation code. Check your email and click on the link to verify.'), trans('website.Success'));
        }

        Auth::logoutOtherDevices($request->password);

        return back();
    }
}
