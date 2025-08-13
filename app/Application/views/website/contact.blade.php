@extends(layoutExtend('website'))
@section('title')
{{ trans('website.Contact Us') }}
@endsection
@section('description')
{{ trans('home.HomeDescription') }}
@endsection
@section('keywords')
{{ trans('home.HomeKeywords') }}
@endsection
@section('content')

@push('css')
    <style>
        * {
            transition: 0.5s ease-in-out;
            box-sizing: border-box;
        }

        .accordion {
            position: relative;
            background: #f7f7f7;
            padding: 5px 5px 0 5px;

        }

        .accordion input.tab-toggle {
            position: absolute;
            opacity: 0;
        }

        .accordion label input.tab-toggle:checked+.tab-title {
            background: #f7f7f7;
        }

        .accordion label input.tab-toggle:checked~.tab-title {
            background-color: #fff;
            color: #333;
        }


        .accordion label input.tab-toggle:checked~.tab {
            visibility: visible;
            opacity: 1;
            background-color: #fff;
        }

        .accordion label {
            font-size: 16px;
            line-height: 16px;
            border-radius: 5px;
            margin-bottom: 0;
        }

        .accordion label:first-of-type .tab {
            border-radius: 0 3px 3px 3px;
        }

        .accordion label .tab-title {
            cursor: pointer;
            display: block;
            padding: 8px 10px 10px 10px;
            border-radius: 3px 3px 0 0;
        }

        .accordion label .tab-title:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .accordion .tab {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 56px;
            left: 0;
            min-width: 100%;
            height: 300px;
            /*background: white;*/
            border-radius: 3px;
        }

        .fa,
        .fas {
            color: #2ba1b9;
        }

        .accordion-info {
            height: 400px;
        }

        @media (max-width: 768px) {
            .accordion-container {
                margin-top: 25px;
            }
        }
    </style>


@endpush


@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('website.Contact Us')])

<section class="contact-content">
    <div class="container">
        <h1>
            {{-- {{ trans('website.Contact') }}--}}
        </h1>

        {{-- <div class="map">--}}
            {{--
            <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.6021126828646!2d30.925649284550143!3d29.962121429411074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585658dadd554d%3A0xe605c53acb644f23!2z2KfZhNmF2KzZhdmI2LnYqSDYp9mE2K_ZiNmE2YrYqSDZhNiu2K_Zhdin2Kog2KfZhNiq2K_YsdmK2KggSUdUUw!5e0!3m2!1sar!2seg!4v1576696481993!5m2!1sar!2seg&language=en" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->--}}
            {{-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9776.78607576382!2d30.918811347941414!3d29.96172595964548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe605c53acb644f23!2sIGTS!5e0!3m2!1sen!2seg!4v1583146635380!5m2!1sen!2seg"
                width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--}}
            {{--
        </div>--}}


        <div class="row">
            <div class="col-md-6 form-container" style="margin-top: auto;">
                <h3>{{ trans('website.Keep in touch') }}</h3>

                <form class="form-content form-contacts" action="{{ concatenateLangToUrl('contact') }}"
                    name="contactform" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="name" id="name" class="form-control input-item"
                            placeholder="{{ trans('website.Name') }}" aria-label="Name"
                            value="{{ auth()->check() ? auth()->user()->fullname_lang : old('name') ?? '' }}" required>
                    </div>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        </div>
                    @endif
                    <div class="input-group">
                        <input type="text" name="title" id="title" class="form-control input-item"
                            placeholder="{{ trans('website.title') }}" aria-label="title"
                            value="{{ auth()->check() ? auth()->user()->title_lang : old('title') ?? '' }}" required>
                    </div>
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        </div>
                    @endif
                    <div class="input-group">
                        <input type="text" name="email" id="email" class="form-control input-item"
                            placeholder="{{ trans('website.Email') }}" aria-label="email" required
                            value="{{ auth()->check() ? auth()->user()->email : old('email') ?? '' }}">
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        </div>
                    @endif
                    <div class="input-group">
                        <select class="form-control input-item" id="country_code" name="country_code"
                            required="required">
                            <option value="">{{trans('account.Select Country')}}</option>
                            <option value="198"> {{trans('website.Saudi Arabia')}} </option>
                            @foreach(allCountries() as $key => $country)

                                <option value="{{$key}}" {{ ((!$errors->has('mobile')) && ((isset($item->country) && $item->country == $key) || (old('country_id') && old('country_id') == $key))) ? 'selected' : '' }}> {{$country}} </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('country_code'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('country_code') }}</strong>
                            </span>
                        </div>
                    @endif

                    <div class="input-group">
                        <input type="tel" name="phone" id="phone" class="form-control input-item" aria-label="Tel"
                            placeholder="{{ trans('website.Phone') }}" value="{{ old('phone') ?? '' }}">
                    </div>
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        </div>
                    @endif
{{--                    <div class="input-group">--}}
{{--                        <input type="text" name="company_name" id="company_name" class="form-control input-item"--}}
{{--                            placeholder="{{ trans('website.company_name') }}" aria-label="company_name"--}}
{{--                            value="{{ old('company_name') }}" required>--}}
{{--                    </div>--}}
{{--                    @if ($errors->has('company_name'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <span class='help-block'>--}}
{{--                                <strong>{{ $errors->first('company_name') }}</strong>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="input-group">--}}
{{--                        <select class="form-control input-item" id="company_size" name="company_size"--}}
{{--                            required="required">--}}
{{--                            <option value="">{{trans('website.Number_of_trainees')}}</option>--}}
{{--                            <option value="0-50">0 - 50</option>--}}
{{--                            <option value="51-100">51 - 100</option>--}}
{{--                            <option value="101-200">101 - 200</option>--}}
{{--                            <option value="+200">+200</option>--}}

{{--                        </select>--}}
{{--                    </div>--}}
{{--                    @if ($errors->has('company_size'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <span class='help-block'>--}}
{{--                                <strong>{{ $errors->first('company_size') }}</strong>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" name="website_url" id="website_url" class="form-control input-item"--}}
{{--                            placeholder="{{ trans('website.website_url') }}" aria-label="website_url"--}}
{{--                            value="{{ old('website_url') }}" required>--}}
{{--                    </div>--}}
{{--                    @if ($errors->has('website_url'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <span class='help-block'>--}}
{{--                                <strong>{{ $errors->first('website_url') }}</strong>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="input-group">
                        <input type="text" name="subject" id="subject" class="form-control input-item"
                            aria-label="subject" placeholder="{{ trans('website.Subject') }}" required
                            value="{{ old('subject') ?? '' }}">
                    </div>
                    @if ($errors->has('subject'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        </div>
                    @endif
                    <div class="input-group">
                        <textarea class="form-control" name="message" id="comments" cols="30" rows="10"
                            aria-label="message" placeholder="{{ trans('website.Message Below') }}"
                            required>{{ old('message') ?? '' }}</textarea>
                    </div>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        </div>
                    @endif

{{--                    @if(config('services.recaptcha.key'))--}}
{{--                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if ($errors->has('g-recaptcha-response'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <span class='help-block'>--}}
{{--                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <div class="text-right">

                        <button type="submit" class="add-to-cart form-contacts">
                            {{ trans('website.send now') }}
                        </button>

                    </div>
                    {{-- <div class="pt-4 pb-4">--}}
                        {{-- --}}{{-- <h3>{{ trans('website.Apply as instructor') }}</h3>--}}
                        {{-- <p class="pl-2 pr-2">{!! trans('website.Fill the form') !!}</p>--}}
                        {{-- </div>--}}
                </form>

            </div>
            <div class="mb-20 col-md-6 accordion-container">
                <h3>{{ trans('website.Your team is our specialty') }}</h3>
                <p class="mt-20 contact-info">
                    {!!  trans('website.Footer IGTS')  !!}
                </p>

                <div class="mt-20 social contact-social flexLeft">
                    <a href="https://www.facebook.com/share/18S2vFJxzW/?mibextid=wwXIfr" target="_blank"><i class="facebook"></i></a>
                    <a href="https://x.com/htf_ksa" target="_blank"><i class="twitter"></i></a>
                    <a href="https://www.linkedin.com/company/saudi-hta/" target="_blank"><i class="linkedin"></i></a>
                    <a href="https://www.instagram.com/htf_ksa2/?utm_source=ig_web_button_share_sheet" target="_blank"><i class="instagram"></i></a>
                    <a href="https://youtube.com/@health.tourism.future?feature=shared" target="_blank"><i class="youtube"></i></a>
                </div>

                <div class="mt-20 accordion-info">
                    <div class="contact_wrapper is-arabic">
                        <div class="accordion">
{{--                            <label>--}}
{{--                                <input class="tab-toggle" type="radio" name="my_radio_group" checked />--}}
{{--                                <span class="tab-title">--}}
{{--                                    <img src="https://cdn.ipwhois.io/flags/sa.svg" style="height: 10px"--}}
{{--                                        class="img-rounded">--}}
{{--                                    {{ trans('website.SaudiAddressTitle') }}--}}

{{--                                </span>--}}
{{--                                <div class="tab">--}}
{{--                                    <p>{{ trans('website.SaudiaAddress') }}</p>--}}
{{--                                    <iframe--}}
{{--                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d515.6901824808658!2d46.758812!3d24.7645921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f01150b515909%3A0xa43e377813d7377e!2zSUdUUyDYtNix2YPZhyDYp9mK2KzYqtizINmE2YTYqtiv2LHZitio!5e0!3m2!1sar!2seg!4v1733147818006!5m2!1sar!2seg"--}}
{{--                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"--}}
{{--                                        referrerpolicy="no-referrer-when-downgrade"></iframe>--}}


{{--                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.2534679907662!2d46.7286073!3d24.786772799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efdff132802a1%3A0xf12dad9555824e75!2z2LTYsdmD2Kkg2LnZhdmEINin2YTZhdiz2KrZgtio2YQ!5e0!3m2!1sar!2seg!4v1751209405688!5m2!1sar!2seg" width="100%" height="100%" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

{{--                                </div>--}}
{{--                            </label>--}}


{{--                            <label>--}}
{{--                                <input class="tab-toggle" type="radio" name="my_radio_group" />--}}
{{--                                <span class="tab-title">--}}
{{--                                    <img src="https://cdn.ipwhois.io/flags/ae.svg" style="height: 10px"--}}
{{--                                        class="img-rounded">--}}
{{--                                    {{ trans('website.Head office') }}--}}
{{--                                </span>--}}
{{--                                <div class="tab">--}}
{{--                                    <p>{{ trans('website.Address Text') }}</p>--}}
{{--                                    --}}{{-- <iframe--}}
{{--                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9776.78607576382!2d30.918811347941414!3d29.96172595964548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe605c53acb644f23!2sIGTS!5e0!3m2!1sen!2seg!4v1583146635380!5m2!1sen!2seg"--}}
{{--                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"--}}
{{--                                        referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{--                                    <iframe--}}
{{--                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.505049482592!2d55.377721199999996!3d25.1186106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6f9f1fbfb607%3A0x4db0a2f5f59532d9!2sIFZA%20Business%20Park!5e0!3m2!1sen!2sus!4v1707910851498!5m2!1sen!2sus"--}}
{{--                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"--}}
{{--                                        referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{--                                </div>--}}
{{--                            </label>--}}

{{--                            <label>--}}
{{--                                <input class="tab-toggle" type="radio" name="my_radio_group" />--}}
{{--                                <span class="tab-title">--}}
{{--                                    --}}{{-- <i class="fa fa-map-marker"></i> --}}
{{--                                    <img src="https://cdn.ipwhois.io/flags/eg.svg" style="height: 10px"--}}
{{--                                        class="img-rounded">--}}

{{--                                    {{ trans('website.EgyptAddressTitle') }}</span>--}}
{{--                                <div class="tab">--}}
{{--                                    <p>{{ trans('website.EgyptAddress Text') }}</p>--}}
{{--                                    <iframe--}}
{{--                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9776.78607576382!2d30.918811347941414!3d29.96172595964548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe605c53acb644f23!2sIGTS!5e0!3m2!1sen!2seg!4v1583146635380!5m2!1sen!2seg"--}}
{{--                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"--}}
{{--                                        referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

{{--                                </div>--}}
{{--                            </label>--}}



                            {{-- <label>--}}
                                {{-- <input class="tab-toggle" type="radio" name="my_radio_group" />--}}
                                {{-- <span class="tab-title">--}}
                                    {{-- <img src="https://cdn.ipwhois.io/flags/gb.svg" style="height: 10px"
                                        class="img-rounded">--}}
                                    {{-- {{ trans('website.UkAddressTitle') }}</span>--}}
                                {{-- <div class="tab">--}}
                                    {{-- <p>{{ trans('website.UkAddress') }}</p>--}}
                                    {{-- <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9776.78607576382!2d30.918811347941414!3d29.96172595964548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe605c53acb644f23!2sIGTS!5e0!3m2!1sen!2seg!4v1583146635380!5m2!1sen!2seg"
                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                                    {{-- </div>--}}
                                {{-- </label>--}}


{{--                        </div>--}}
{{--                    </div>--}}

                    {{-- <p><strong> <i class="fa fa-envelope"></i> </strong> info@igtsservice.com</p>--}}

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</section>


<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection