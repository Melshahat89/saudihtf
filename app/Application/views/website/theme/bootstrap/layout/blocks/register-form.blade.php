@if ($errors->has('name'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('name')}}</div>
@endif

@if ($errors->has('email'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('email')}}</div>
@endif

@if ($errors->has('country_id'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('country_id')}}</div>
@endif

@if ($errors->has('mobile'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('mobile')}}</div>
@endif

@if ($errors->has('categories'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('categories')}}</div>
@endif

@if ($errors->has('nid'))
    <div class="mb-2 alert alert-danger" role="alert">
        {{ $errors->first('nid') }}
    </div>
@endif

@if ($errors->has('password'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('password')}}</div>
@endif

@if ($errors->has('password_confirmation'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('password_confirmation')}}</div>
@endif

@if ($errors->has('g-recaptcha-response'))
<div class="alert alert-danger mb-2" role="alert">{{$errors->first('g-recaptcha-response')}}</div>
@endif



<form class="" style="display: block;margin-right: auto; margin-left: auto;" id="register_form" role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="d-flex">
        <!-- Name -->
        <div class="form_row w-50">
            <div class="input_with_icon">
                <i class="far fa-user"></i>
                <input id="name" type="text" class="form-control input-item user-login-ico" name="name" value="{{ isset($userObject->name) ? $userObject->name : old('name') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.Full Name')}}' required>

            </div>
        </div>



        <!-- Email -->
        <div class="form_row w-50">
            <div class="input_with_icon">
                <i class="far fa-envelope"></i>
                <input id="email-register" type="email" class="form-control input-item email-login-ico" {{ isset($userObject->email) ? 'readonly' : '' }} name="email" value="{{ isset($userObject->email) ? $userObject->email : old('email') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.email')}}' required>

            </div>
        </div>

    </div>



{{--    <div class="form_row">--}}
{{--        <div class="input-group" id="drop-down-parent">--}}
{{--            <select class="form-control" id="country-register" name="country_id" required="required">--}}
{{--                <option value="">{{trans('account.Select Country')}}</option>--}}

{{--                @foreach(allCountries() as $key => $country)--}}
{{--                <option value="{{$key}}" {{ ((!$errors->has('mobile')) && ((isset($item->country) && $item->country == $key) || (old('country_id') && old('country_id') == $key))) ? 'selected' : '' }}> {{$country}} </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Phone -->
    <div class="form_row" id="mobile-container" >
        <div class="d-flex align-items-center">
            <input id="mobile" type="number" class="form-control input-item mobile-login-ico" name="mobile" value="{{ old('mobile') }}" class='form-control input-item user-login-ico' label='mobild' placeholder='{{trans('account.mobile')}}' required>
            <span id="mobile-code" class="border m-2 p-2">+966</span>
        </div>
    </div>


{{--    <div class="form_row" id="nid-container" >--}}
{{--        <div class="d-flex align-items-center">--}}
{{--            <input id="nid" type="text" class="form-control input-item nid-login-ico" name="nid" value="{{ old('nid') }}" class='form-control input-item user-login-ico' label='nid' placeholder='{{trans('account.nid')}}' required>--}}
{{--        </div>--}}
{{--    </div>--}}





{{--    <div class="form_row">--}}

{{--        <div class="input-group">--}}
{{--            <select class="form-control input-item user-login-ico" id="categories" name="categories" required="required">--}}
{{--                <option value="">{{trans('account.Select specialization')}}</option>--}}
{{--                @foreach(categoriesList() as $key => $category)--}}
{{--                <option value="{{$key}}" {{ ((isset($item->categories) && $item->categories == $key) || (old('categories') && old('categories') == $key)) ? 'selected' : '' }}> {{$category}} </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}



    <div class="d-flex" style="{{ isset($userObject->password) ? 'display: none !important;' : '' }}">
        <!-- Password -->
        <div class="form_row w-50">
            <div class="input_with_icon">
                <i class="fas fa-lock"></i>
                <input id="password-register" autocomplete="" type="password" class="form-control input-item password-login-ico {{ isset($userObject->password) ? 'd-none' : '' }}" name="password" value="{{ isset($userObject->password) ? $userObject->password : old('password') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.password')}}' required>

            </div>
        </div>

        <!-- Repeat Password -->
        <div class="form_row w-50">
            <div class="input_with_icon">
                <i class="fas fa-lock"></i>
                <input id="password_confirmation" autocomplete="" type="password" class="form-control input-item password-login-ico {{ isset($userObject->password) ? 'd-none' : '' }}" name="password_confirmation" value="{{ isset($userObject->password) ? $userObject->password : old('password') }}" class='form-control input-item user-login-ico' label='Username' placeholder='{{trans('account.password_confirmation')}}' required>

            </div>
        </div>

    </div>

    <p class="pb-4 pt-4 text-center">{{trans('account.By completing your registeration, you agree to IGTS')}} <a href="{{url('/page/termsOfUse')}}">{{trans('account.Terms and Conditions')}}</a> {{trans('account.and')}} <a href="{{url('/page/privacyPolicy')}}">{{trans('account.Privacy Policy')}}</a></p>

    <input type="hidden" name="facebook_identifier" id="facebook_identifier" value="{{ isset($userObject->facebook_identifier) ? $userObject->facebook_identifier : '' }}">
    <input type="hidden" name="provider" id="provider" value="{{ isset($userObject->provider) ? $userObject->provider : '' }}">
    <input type="hidden" name="token" id="token" value="{{ isset($userObject->token) ? $userObject->token : '' }}">
    <input type="hidden" name="image" id="image" value="{{ isset($userObject->image) ? $userObject->image : '' }}">

{{--    @if(config('services.recaptcha.key'))--}}
{{--    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}" data-callback='submitRegisterForm' data-bind="signup_btn_submit">--}}
{{--    </div>--}}
{{--    @endif--}}


    <div class="form_row form_submit">
        <button type="submit" class="signup_btn button button_block button_primary" id="signup_btn_submit"><span>إنشاء حساب</span></button>
    </div>

</form>