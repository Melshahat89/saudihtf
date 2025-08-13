@php
    use Illuminate\Support\Facades\Session as Session;
        $VERSION_NUMBER = 1.2;
@endphp

        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ (config('app.locale') == 'ar') ? 'rtl' : ''}}">
<head>
    <title>IGTS | {{trans('b2b.Business')}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('website/subscriptions') }}/image/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/subscriptions') }}/css/vendor.bundle.css?v={{$VERSION_NUMBER}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/subscriptions') }}/css/style.css?v={{$VERSION_NUMBER}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/subscriptions') }}/css/custom.css?v={{$VERSION_NUMBER}}">

    <style>
        figure.img {
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* background-color: #efefef; */
            position: relative;
            display: block;
            content: attr(data-awards);
            position: absolute;
            background: #18B289;
            color: white;
            width: 100%;
            line-height: 1em;
            text-align: center;
            padding: 0.5em 0;
            box-sizing: border-box;
            top: 0;
            right: 0;
            transform-origin: 50% 50%;
        }

    </style>



    {{ Html::style('css/sweetalert.css') }}

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KC9GVX98');</script>
    <!-- End Google Tag Manager -->

</head>
<body data-spy="scroll" data-target="#navbar" data-offset="70">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC9GVX98"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div id="loading" class="loading flexCenter">
    <div class="loader-logo">
        <div class="loader">Loading...</div>
        <img src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png" alt="..." >
    </div>
</div>

<!-- Preloader -->
{{--<div id="preloader">--}}
{{--    <div id="status">&nbsp;</div>--}}
{{--</div>--}}
<!--  -->

<!-- header -->
<header>
    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-custom nav-light navbar-fixed-top" data-spy="affix" data-offset-top="70">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll logo-light" href="#"><img style="width: 140px" alt="" src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png"></a>
                    <a class="navbar-brand page-scroll logo-clr" href="#"><img style="width: 140px" alt="" src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png"></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="right-nav text-right">
                        <ul class="nav navbar-nav menu">
                            <li>
                                <a href="{{url('/')}}">{{trans('b2b.Home')}}</a>
                            </li>
                            <li>
                                {{--                                <a href="#feature">{{trans('b2b.Feature')}}</a>--}}
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="#overview">Overview</a>--}}
                            {{--                            </li>--}}
                            <li>
                                <a href="#pricing">{{trans('b2b.Plans')}}</a>
                            </li>
                            <li>
                                {{--                                <a href="#faq">{{trans('b2b.FAQ')}}</a>--}}
                            </li>
                            <li>
                                <a href="{{LaravelLocalization::getLocalizedURL((config('app.locale') == 'en') ? 'ar':'en') }}">{{trans('website.other lang')}} <span class="fa fa-globe"></span> </a>
                            </li>

                        </ul>
                        <div class="nav-btn">
                            <a href="#pricing" class="btn grdnt-purple">


                                @if(getCurrency() == 'SAR')
                                    {{trans('website.Subscribe Now Saudi')}}
                                @else
                                    {{trans('b2b.Subscribe Now')}}
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- banner -->
    <div class="hero grdnt-purple style-curve bg-trans-1">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="intro-text light">
                                <h4>

                                    {{trans('b2b.textheader')}}

                                </h4>
                                <div class="spce"></div>
                                {{--                                <p class="large">Achieve Your Business Goals</p>--}}
                                <div class="btn-holder">
                                    <a href="#pricing" style="padding: 20px 40px" class="btn btn-dark">

                                        @if(getCurrency() == 'SAR')
                                            {{trans('website.Subscribe Now Saudi')}}
                                        @else
                                            {{trans('b2b.Subscribe Now')}}
                                        @endif

                                    </a>
                                </div>
                                <div class="spce"></div>
                                {{--                                <ul class="app-store">--}}
                                {{--                                    <li><a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a></li>--}}
                                {{--                                    <li><a href="#"><i class="fa fa-android" aria-hidden="true"></i></a></li>--}}
                                {{--                                    <li><a href="#"><i class="fa fa-windows" aria-hidden="true"></i></a></li>--}}
                                {{--                                </ul>--}}
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-right img-pre">
                                <img class="scrl-img-1" data-0="transform:translateY(60px);" data-500="transform:translateY(-100px);" alt="" src="{{ asset('website/subscriptions') }}/image/img-1.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
</header>
<!-- End header -->

<!-- Pricing -->
<section id="pricing" class="sec-pad-lg bg-gray">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="pricing wrapper">
                    <div class="text-center section-text wow animated fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <h4>{{trans('b2b.OUR PLANS')}}</h4>
                        <div class="spce"></div>
                        <p class="large fx-wdth">
                            @if(getCurrency() == 'SAR')
                                {!! trans('b2b.With one subscription, you can view all of our courses Saudi') !!}
                            @else
                                {{trans('b2b.With one subscription, you can view all of our courses')}}
                            @endif

                        </p>
                    </div>
                    <div class="spce"></div>
                    <div class="pricing text-center wow animated fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">
                        <div id="monthly" class="clearfix model" style="margin: auto;width: 80%;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="pricing-table res-margin-sm">
                                        <div class="pricing-header">
                                            <img alt="" src="{{asset('website/subscriptions')}}/image/monthly-icon.svg">
                                            <div class="spce"></div>
                                            <div class="main-pricing">
                                                <h5>{{trans('b2b.MONTHLY')}}</h5>
                                                <h3 class="fw-400">
                                                    <span class="rate">{{$subscription_monthly}} </span>
                                                    <span class="meta fw-300"> {{getCurrency()}}/{{trans('website.Mo')}}</span></h3>
                                                <div class="discount">
                                                    <div class="save-percent">
                                                        {{trans('website.Billed Monthly')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <div class="pricing-footer">
                                                @if(Auth::check())
                                                    @if($subscription_monthly > 0)
                                                        <a id="monthlySubBtn" data-monthlyFees="{{$subscription_monthly}}" href="javascript:void(0)" class="btn grdnt-purple" data-dismiss="modal" data-toggle="modal" data-target="#directBuyModal">
                                                            @if(getCurrency() == 'SAR')
                                                                {{trans('website.Subscribe Now Saudi')}}
                                                            @else
                                                                {{trans('b2b.Subscribe Now')}}
                                                            @endif
                                                        </a>
                                                    @else
                                                        <a  href="{{url('subscriptions/subscripeNow/monthly')}}" class="btn grdnt-purple">

                                                            @if(getCurrency() == 'SAR')
                                                                {{trans('website.Subscribe Now Saudi')}}
                                                            @else
                                                                {{trans('b2b.Subscribe Now')}}
                                                            @endif
                                                        </a>
                                                    @endif
                                                @else
                                                    <a href="{{url('login')}}" class="btn grdnt-purple" >{{trans('b2b.Signup to subscribe')}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pricing-table res-margin-sm">
                                        <div class="pricing-header">
                                            <img alt="" src="{{asset('website/subscriptions')}}/image/annual-icon.svg">
                                            <div class="spce"></div>
                                            <div class="main-pricing">
                                                <h5>{{trans('b2b.ANNUAL')}}</h5>
                                                <h3 class="fw-400"><span class="rate">{{$subscription_yearly_after}}</span>
                                                    <span class="meta fw-300"> {{getCurrency()}}/{{trans('website.Year')}}</span>
                                                </h3>

                                                <div class="discount">
                                                    <div class="save-percent">
                                                        <del>{{$subscription_yearly_before}}
                                                            <span>{{getCurrency()}}/{{trans('website.Year')}}</span>
                                                        </del>
                                                        {{-- {{trans('website.Billed Annually')}} --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <div class="pricing-footer">
                                                @if(Auth::check())
                                                    @if($subscription_yearly_after > 0)
                                                        <a id="annualSubBtn" data-annualFees="{{$subscription_yearly_after}}" href="javascript:void(0)" class="btn grdnt-purple" data-dismiss="modal" data-toggle="modal" data-target="#directBuyModal">
                                                            @if(getCurrency() == 'SAR')
                                                                {{trans('website.Subscribe Now Saudi')}}
                                                            @else
                                                                {{trans('b2b.Subscribe Now')}}
                                                            @endif
                                                        </a>
                                                    @else
                                                        <a  href="{{url('subscriptions/subscripeNow/yearly')}}" class="btn grdnt-purple" >
                                                            @if(getCurrency() == 'SAR')
                                                                {{trans('website.Subscribe Now Saudi')}}
                                                            @else
                                                                {{trans('b2b.Subscribe Now')}}
                                                            @endif
                                                        </a>
                                                    @endif
                                                @else
                                                    <a href="{{url('login')}}" class="btn grdnt-purple">{{trans('b2b.Signup to subscribe')}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Pricing -->

<!-- subscribe -->
{{--<div class="sec-pad-lg grdnt-purple bg-trans-2 light">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="subscribe-box wow animated fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">--}}
{{--                <div class="col-md-4 col-sm-12" style="    padding-top: 10%;">--}}
{{--                    <h3>{{trans('website.Special Training for Corporatesto cover market needs')}}</h3>--}}
{{--                </div>--}}
{{--                <div class="col-md-8 col-sm-12">--}}
{{--                    <img src="{{ asset('website/subscriptions') }}/image/poster.png" alt="..." />--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- end subscribe -->

<!-- Feature -->
{{--<section id="feature" class="bg-grad-shad sec-pad-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class=" wow animated fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">--}}
{{--                <div class="spce"></div>--}}
{{--                <div class="col-md-7 col-sm-12" >--}}
{{--                    <img style="float: left;" src="{{ asset('website/subscriptions') }}/image/multiple-device-access.png" alt="..." />--}}
{{--                </div>--}}
{{--                <div class="col-md-5 col-sm-12" style="     padding-top: 10%;">--}}
{{--                    <h3>{{trans('website.New Courses in different categories over the hour')}}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- End feature -->











<section class="bg-grad-shad pt-0 light" style="padding-bottom: 30px;">
    <div class="text-center">
        <div class="video-wrapper">
            <img class="img-video" data-top="" data-40p-bottom="width: 100%; height: auto; top: 0%; left: 0%;" alt="" src="https://i.ytimg.com/vi/FPCJW1ou7n8/maxresdefault.jpg">
            <div class="text-center btn-over grad-prple" style="padding: 10px 0 ">
                {{--                <h3>{{trans('b2b.With you in your learning journey')}}</h3>--}}
                <div class="spce"></div>
                <a class="btn-round video" href="https://www.youtube.com/watch?v=FPCJW1ou7n8"><i class="fa fa-play clip-txt" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- // -->

<!-- Feature -->
<section id="feature" class="bg-grad-shad sec-pad-lg">
    <div class="container">
        <div class="row">
            <div class=" wow animated fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">

                <h4 class="footer-title">
                    <a href="{{url('business')}}">
                        {!! trans('website.Customize your package to suit your needs')!!}
                    </a>
                </h4>

                <p>
                    {{trans('website.Register your data now and our team will contact you within 24 hours')}}
                </p>

                <div class="spce"></div>
                <div class="col-md-7 col-sm-12" >
                    <img style="float: left;" src="{{ asset('website/subscriptions') }}/image/multiple-device-access.png" alt="..." />
                </div>
                <div class="col-md-5 col-sm-12" style="     padding-top: 10%;">
                    <p class="large fx-wdth">{{trans('website.Share with us your development training plan and get the package that suits you')}}</p>

                    <div class="btn-holder">
                        <a href="{{url('contact')}}" style="padding: 20px 40px" class="btn btn-dark">

                            {{trans('home.contact us')}}

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature -->


<!--Footer  -->

<div class="main-footer">
    <footer class="footer-wrapper pb-0  sec-pad">
        <div class="wrapper footer-content">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="footer-title"><a href="{{url('business')}}">{!! trans('website.Mobile App')!!}</a></h5>

                    <p>
                        {{--                        {{trans('website.Our mobile application is coming soon')}}--}}
                    </p>
                    <a href="https://play.google.com/store/apps/details?id=com.igts.igts" target="_blank">
                        <img src="{{ asset('website') }}/images/front/play-store.svg"></a>
                    {{--                    <img src="{{ asset('website') }}/images/front/app-store.svg">--}}
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">{!! trans('website.Quick Links')!!}</h5>
                    <ul>
                        <li>
                            <a href="{{url('faq')}}">{{trans('faq.faq')}}</a>
                        </li>
                        <li>
                            <a href="{{url('page/about')}}">{{trans('website.About Us')}}</a>
                        </li>
                        <li>
                            <a href="{{url('page/termsOfUse')}}">{{trans('website.Terms and Conditions')}}</a>
                        </li>
                        <li>
                            <a href="{{url('page/privacyPolicy')}}">{{trans('website.Privacy Policy')}}</a>
                        </li>
                        <li>
                            <a href="{{url('contact')}}">{{trans('website.Contact')}}</a>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('careers')}}">{{trans('careers.careers')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('verifycertificate')}}">{{trans('page.Certificate Verification')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('page/partners')}}">{{trans('page.Accreditations')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('business')}}">{{trans('home.IGTS For Business')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('joinAsInstructor')}}">{{trans('home.become an instructor')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('consultants/category')}}">{{trans('consultation.consultation')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('testimonials')}}">{{trans('testimonials.testimonials')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('blog/category/events')}}">{{trans('website.events')}}</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="{{url('blog/category/news')}}">{{trans('website.news')}}</a>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="footer-title">{!! trans('website.Keep Connected')!!}</h5>

                    <span>{!! trans('website.Follow Us')!!}</span>
                    <div class="social flexCenter">
                        <a href="{{ getSetting('facebook') }}" target="_blank"><i class="facebook"></i></a>
                        <a href="{{ getSetting('twitter') }}" target="_blank"><i class="twitter"></i></a>
                        <a href="{{ getSetting('linkedin') }}" target="_blank"><i class="linkedin"></i></a>
                        <a href="{{ getSetting('instagram') }}" target="_blank"><i class="instagram"></i></a>
                        <a href="{{ getSetting('youtube') }}" target="_blank"><i class="youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copywrite">
            <div class="wrapper" style="text-align: -webkit-center;">
                <div class="paymentmethods">
                    <img style="    width: auto;" src="{{ asset('subscription-new/src') }}/images/payments2.png">
                    {{--                    <img src="{{ asset('website') }}/images/front/mastercardlogo.svg">--}}
                    {{--                    <img src="{{ asset('website') }}/images/front/paypallogo.svg">--}}
                    {{--                    <img src="{{ asset('website') }}/images/front/voda-cash.png">--}}
                </div>
                <p>{{trans('business.Copyright')}} © {{currentYear()}} <span>IGTS</span>. {{trans('business.All rights reserved.')}}</p>
            </div>
        </div>
    </footer>
</div>
<!-- End Footer -->

<!-- script -->
<script src="{{ asset('website/subscriptions') }}/js/vendor.bundle.js"></script>
<script src="{{ asset('website/subscriptions') }}/js/script.js"></script>



<script src="{{ asset('website/subscriptions') }}/js/jquery-3.6.0.min.js?v={{$VERSION_NUMBER}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js?v={{$VERSION_NUMBER}}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('website/subscriptions') }}/js/bootstrap.min.js?v={{$VERSION_NUMBER}}"></script>
{{--<script src="{{ asset('website/subscriptions') }}/js/script.js?v={{$VERSION_NUMBER}}"></script>--}}
{{ Html::script('js/sweetalert.min.js') }}
<script src="{{ asset('website/subscriptions') }}/js/custom.js?v={{$VERSION_NUMBER}}"></script>

<script>
    $(document).ready(function() {
        $('#loading').delay(3000).hide();
    });
</script>


</body>
</html>
@include('sweet::alert')

@if(Auth::check())
    @php
        $data['test'] = null;
    @endphp
    <div class="modal fade" id="directBuyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="text-align: center;" role="document">
            <div class="modal-content">
                <div class="modal-header flexRight">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black; font-weight: bold; font-size: 35px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 p-0">
                    <div>

                        <div class="plan-card" id="annual-plan-card">

                            <h3>{{trans('b2b.ANNUAL')}}</h3>
                            <img class="mt-5" src="{{asset('website/subscriptions')}}/image/annual-icon.svg" alt="...">
                            <div class="flexBetween card-footer">
                                <div class="price final-price">
                                    <p class="annualPriceInner">{{$subscription_yearly_after}}</p>
                                    <span>{{getCurrency()}}</span>
                                </div>

                            </div>
                        </div>

                        <div class="plan-card" id="monthly-plan-card" >
                            <h3>{{trans('b2b.MONTHLY')}}</h3>

                            <img class="mt-5" src="{{asset('website/subscriptions')}}/image/monthly-icon.svg" alt="...">
                            <div class="flexBetween card-footer">
                                <div class="price final-price">
                                    <p class="annualPriceInner">{{$subscription_monthly}}</p>
                                    <span>{{getCurrency()}}</span>
                                    <div class="discount">
                                        <div class="save-percent">
                                            {{trans('website.Billed Monthly')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('website.courses.assets.promoCodeForm', ['type' => App\Application\Model\Promotionactive::TYPE_B2C])

                        @include('website.theme.bootstrap.layout.popup.onlinepayments')

                    </div>
                </div>
                <div class="modal-footer p-0 p-0 flexRight" style="border: none;">
                    <br>
                </div>
            </div>
        </div>
    </div>

@endif


