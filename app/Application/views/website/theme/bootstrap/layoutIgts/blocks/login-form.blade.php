@if ($errors->has('email'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('email')}}</div>
@endif

@if ($errors->has('password'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('password')}}</div>
@endif

<form class="" style="display: block;margin-right: auto; margin-left: auto;" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}


    <!-- Email -->
    <div class="form_row">
        <div class="input_with_icon">
            <i class="far fa-envelope"></i>
            <input id="email-login" type="email" class="form-control input-item email-login-ico" name="email" value="{{ old('email') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.email')}}'>

        </div>
    </div>


    <!-- Password -->
    <div class="form_row">
        <div class="input_with_icon">
            <i class="fas fa-lock"></i>
            <input id="password-login" type="password" autocomplete class="form-control input-item password-login-ico" name="password" value="{{ old('password') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.password')}}'>

        </div>
    </div>

    <div class="text-center">

        <div class="form_row form_submit">
            <button type="submit" class="signin_btn button button_block button_primary"><span>{{trans('website.Sign in')}}</span></button>
        </div>
        <p class="pt-20">{{trans('website.Forgot your')}} <a href="{{url('/password/reset')}}" class="forget-pass">{{trans('website.password?')}}</a></p>
    </div>

</form>