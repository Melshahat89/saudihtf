@extends(layoutExtend('website'))
@section('title')
    {{ trans('website.Account Settings') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection

@push('css')
    <style>
        .tab-content>.active {
            display: inline;
        }
        .settings-container .input-item {
            padding-left: 35px;
        }
        .nav-link {
            color: #244092;
        }
    </style>
@endpush

@section('content')

    @include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('website.Account Settings')])

    <section class="settings-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <form id="users-form" class="validate_form mtlg" action="{{ concatenateLangToUrl('account/update') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <img id="preview" class="w-100"  src="{{ large1($item->image) }}"  width="100"  height="100" class="rounded">
                        <div id="msg"></div>

                        <input type="file" id="avatar_input"  name="image" class="file" accept="image/*">


                        <input type="file" id=""  name="image" class="" accept="image/*">

                        {{--                        <div class="input-group text-center">--}}
                        {{--                            <button type="button" class="browse btn btn-primary">--}}
                        {{--                                {{ trans('account.Upload image') }}</button>--}}
                        {{--                        </div>--}}
                    </form>
                </div>
                <div class="col-md-9 mt-40">
                    <h2 class="mb-20"> <strong>{{ charLimit($item->name, 26)}}</strong> </h2>
                    <p>
                        <!-- {{ $item->about_lang }} -->
                    </p>
                </div>
            </div>
            <div class="container mt-40">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button onclick="document.getElementById('users-form').submit();"  type="submit" class="browse btn btn-primary">
                                {{ trans('account.Upload image') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="personal-data mt-40">
            <div class="container">
                <h3 class="mb-20"><strong>{{ trans('account.Personal information') }}</strong></h3>
                <form id="users-form" class="validate_form mtlg" action="{{ concatenateLangToUrl('account/update') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">

                        {{-- <div class="form-group">
                            {!! extractFiled(isset($item) ? $item : null , "first_name", isset($item->firstname) ? $item->firstname : old("first_name") , "text" , "user" ,"form-control input-item") !!}
                            @if ($errors->has("first_name.en"))
                                <div class="alert alert-danger">
                                <span class='help-block'>
                                <strong>{{ $errors->first("first_name.en") }}</strong>
                                </span>
                                </div>
                            @endif
                            @if ($errors->has("first_name.ar"))
                                <div class="alert alert-danger">
                            <span class='help-block'>
                            <strong>{{ $errors->first("first_name.ar") }}</strong>
                            </span>
                                </div>
                            @endif
                        </div> --}}

                        @if(!$item->futurex)

                            <div class="input-group mb-20 col-md-12 d-block">
                                <label class="m-2" style="font-weight: bold;" for="name">{{trans('account.Full Name')}}</label>
                                <input style="width: 100%;" type="text" name="name" class="form-control input-item user-login-ico" id="name" value="{{ isset($item->name) ? $item->name : old("name") }}">
                                @if ($errors->has("name"))
                                    <div class="alert alert-danger">
                                    <span class='help-block'>
                                    <strong>{{ $errors->first("first_name.en") }}</strong>
                                    </span>
                                    </div>
                                @endif
                            </div>
                        @endif





                        <div class="input-group mb-20 col-md-6 d-block">
                            <label  class="m-2" style="font-weight: bold;" for="email">{{trans('account.email')}}</label>

                            <label class="label label-default user-login-ico" style="width: 100%;" > {{ $item->email }}   </label>

                        </div>

                        <div class="input-group mb-20 col-md-6 d-block">
                            <label class="m-2" style="font-weight: bold;" for="mobile">{{trans('account.mobile')}}</label>

                            <input style="width: 100%;" type="text" name="mobile" class="form-control input-item user-login-ico" id="mobile" value="{{ isset($item->mobile) ? $item->mobile : old("mobile") }}"  placeholder="ex: 20 xxxxxxxxxx">
                            @if ($errors->has("mobile"))
                                <div class="alert alert-danger">
                                    <span class='help-block'>
                                    <strong>{{ $errors->first("mobile") }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>


                    </div>
                    <input type="hidden" name="profimage" id="image">

                    <div class="container mt-40">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button  type="submit" class="add-to-cart">
                                        {{ trans('account.Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(!$socialConnectRow)
            @if(!$item->futurex)
                <div class="container mt-40 mb-40">
                    <h3 class="mb-20"><strong>
                            {{ trans('account.Account Information') }}
                        </strong></h3>

                    <form id="users-form" class="validate_form mtlg" action="{{ concatenateLangToUrl('account/update') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">


                                <div class="input-group mb-20 d-block">
                                    <label class="m-2" style="font-weight: bold;" for="old_password">{{trans('account.Your Current Password')}}</label>

                                    <input style="width: 100%;" required type="password" name="old_password" id="old_password" placeholder="{{ trans('website.Your Current Password') }}"    class="form-control input-item"/>
                                    @if ($errors->has("old_password"))
                                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first("old_password") }}</strong>
                                </span>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="input-group mb-20 d-block">
                                    <label class="m-2" style="font-weight: bold;" for="password">{{trans('account.password')}}</label>

                                    <input style="width: 100%;" required type="password" name="password" id="password" placeholder="{{ trans('account.password') }}"    class="form-control input-item"/>
                                    @if ($errors->has("password"))
                                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first("password") }}</strong>
                                </span>
                                        </div>
                                    @endif
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-20 d-block">
                                    <label class="m-2" style="font-weight: bold;" for="password_confirmation">{{trans('account.password_confirmation')}}</label>

                                    <input style="width: 100%;" required type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ trans('account.password-confirm') }}"    class="form-control input-item"/>
                                    @if ($errors->has("password_confirmation"))
                                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first("password_confirmation") }}</strong>
                                </span>
                                        </div>
                                    @endif
                                </div>
                            </div>



                            <div class="container mt-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button  type="submit" class="add-to-cart">
                                                {{ trans('account.Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            @endif
        @endif
    </section>

    <section class="interest personal-data">
        <div class="container">
            <h3 class="mb-20"><strong>{{ trans('account.Select specialization') }}</strong></h3>
            <form id="users-form" class="validate_form mtlg"
                  action="{{ concatenateLangToUrl('account/update') }}{{ isset($item) ? '/' . $item->id : '' }}"
                  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-md-12 mb-4">
                    <label class="m-2" style="font-weight: bold;" for="categories">{{trans('account.speciality')}}</label>
                    <select class="form-control input-item user-login-ico" id="categories" name="categories" required="required">
                        <option value="">{{trans('account.Select specialization')}}</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$key}}" {{ (isset($item->categories) && $item->categories == $key) ? 'selected' : '' }}> {{$category}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('categories'))
                        <div class="help-block">
                            <strong>{{ $errors->first('categories') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="container mt-40">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button  type="submit" class="add-to-cart">
                                    {{ trans('account.Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
{{--    @if (count($orders) > 0)--}}
{{--        <section class="purchasing mb-40 mt-4">--}}
{{--            <div class="container">--}}
{{--                <h3 class="mb-20">--}}
{{--                    <strong>--}}
{{--                        {{ trans('account.Purchasing processes') }}--}}
{{--                    </strong>--}}
{{--                </h3>--}}
{{--                <table class="table">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">DATE</th>--}}
{{--                        <th scope="col">AMOUNT</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach ($orders as $order)--}}
{{--                        <tr>--}}
{{--                            <td>{{$order->updated_at}}</td>--}}
{{--                            <td>{{$order->orderAmount}} {{getCurrency()}}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}

    @if($item->group_id == App\Application\Model\User::TYPE_USER)
        <div class="container mt-40 mb-40">
            <h3 class="mb-20"><strong>
                    {{ trans('account.Delete Account') }}
                </strong></h3>

            <div class="alert alert-warning" style="background-color: #fff3cd; border-color: #ffeeba; border-color: #ffeeba; color: #856404;" role="alert">
                <p>{{ trans('account.delete account alert1') }}</p>
                <br>
                <strong><p>{{ trans('account.delete account alert2') }}</p></strong>
                <br>
                <p>{{ trans('account.delete account alert3') }}</p>
                <br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">{{ trans('account.delete account alert btn') }}</button>

            </div>


        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">{{ trans('account.Are you sure you want to permanently delete your account?') }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="" class="validate_form mtlg" action="{{ concatenateLangToUrl('account/delete') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="input-group mb-20 d-block">
                                        <label class="m-2" style="font-weight: bold;" for="delete">{{trans('account.Type in Delete')}}</label>

                                        <input style="width: 100%; text-transform:uppercase;" required type="text" name="delete" id="delete" placeholder="{{ trans('account.Type in delete2') }}"    class="form-control input-item"/>
                                        @if ($errors->has("delete"))
                                            <div class="alert alert-danger">
                                    <span class='help-block'>
                                        <strong>{{ $errors->first("delete") }}</strong>
                                    </span>
                                            </div>
                                        @endif
                                    </div>

                                </div>




                                <div class="container mt-40">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <button  type="submit" id="deleteBtn" class="btn btn-secondary btn-lg" disabled>
                                                    {{ trans('categories.delete') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endif

    <script>

        // step 1 select input
        const input = document.querySelector('#delete');
        const deleteBtn = document.querySelector('#deleteBtn');

        // step 2 add event listener
        input.addEventListener('input', updateValue);

        //step 3 make your logic
        function updateValue(event) {

            let text = input.value;

            if(text === "delete" || text === "DELETE") {
                deleteBtn.disabled = false;
            }else{
                deleteBtn.disabled = true;
            }

        }

    </script>
@endsection