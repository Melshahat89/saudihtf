@php
    use Illuminate\Support\Facades\Session as Session;

        $VERSION_NUMBER = 15.1;
@endphp
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    {{--    <!-- Google Tag Manager -->--}}
    {{--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
    {{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
    {{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
    {{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
    {{--        })(window,document,'script','dataLayer','GTM-KGKDP6C');</script>--}}
    {{--    <!-- End Google Tag Manager -->--}}

    @if(Auth::check())
        <script>
            let event_id = "{{ Auth::user()->id }}";
        </script>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="IGTS">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <meta name="facebook-domain-verification" content="z3li963csbvtfybzbb6kf3unwwj4v9" />

    <title> @yield('title') </title>

    @if(View::hasSection('canonical'))
        @yield('canonical')
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif


    <!-- Bootstrap core CSS ARABIC -->
    <!--
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('website') }}/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('website') }}/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('website') }}/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('website') }}/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('website') }}/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('website') }}/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('website') }}/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('website') }}/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('website') }}/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('website') }}/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('website') }}/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('website') }}/images/favicon-96x96.png"> -->

    {{--        <link rel="alternate" hreflang="ar-SA" href="https://igtsservice.com/ar"/>--}}
    {{--        <link rel="alternate" hreflang="ar-AE" href="https://igtsservice.com/ar"/>--}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png">


    <link rel="preload" href="{{ asset('website') }}/css/bootstrap.min.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css?v={{$VERSION_NUMBER}}"></noscript>


    <link rel="preload" href="{{ asset('website') }}/css/front/style.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/front/style.css?v={{$VERSION_NUMBER}}"></noscript>

    <link href="{{ asset('website') }}/css/front/owl.theme.default.min.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
    <link href="{{ asset('website') }}/css/front/owl.carousel.css?v={{$VERSION_NUMBER}}" rel="stylesheet">

    <link rel="preload" href="{{ asset('website') }}/css/front/responsive.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/front/responsive.css?v={{$VERSION_NUMBER}}"></noscript>

    <link rel="preload" href="{{ asset('website') }}/css/front/flaticon.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/front/flaticon.css?v={{$VERSION_NUMBER}}"></noscript>

    @if(getDir() == "rtl")
        <!-- <link rel="preload" href="{{ asset('website') }}/css/front/custom-rtl.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/front/custom-rtl.css?v={{$VERSION_NUMBER}}"></noscript> -->
        <link rel="stylesheet" href="{{ asset('website') }}/css/front/custom-rtl.css?v={{$VERSION_NUMBER}}">
    @else
        <!-- <link rel="preload" href="{{ asset('website') }}/css/front/custom.css?v={{$VERSION_NUMBER}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('website') }}/css/front/custom.css?v={{$VERSION_NUMBER}}"></noscript> -->
        <link rel="stylesheet" href="{{ asset('website') }}/css/front/custom.css?v={{$VERSION_NUMBER}}">
    @endif

    <link rel="stylesheet" href="{{ url('website') }}/css/selectize.bootstrap4.css?v={{$VERSION_NUMBER}}"/>
    <link rel="stylesheet" href="{{ url('website') }}/css/selectize.css?v={{$VERSION_NUMBER}}"/>
    @stack('css')
    @stack('js')
    {{ Html::style('website/css/sweetalert.css') }}
    @livewireStyles



    <!-- Google Tag Manager -->
{{--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--        })(window,document,'script','dataLayer','GTM-KC9GVX98');</script>--}}
    <!-- End Google Tag Manager -->


    <!-- TikTok Pixel Code Start -->
{{--    <script>--}}
{{--        !function (w, d, t) {--}}
{{--            w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(--}}
{{--                var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")--}}
{{--            ;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};--}}


{{--            ttq.load('CRGKRVBC77UD2MA17590');--}}
{{--            ttq.page();--}}
{{--        }(window, document, 'ttq');--}}
{{--    </script>--}}
    <!-- TikTok Pixel Code End -->


    <!-- Snap Pixel Code -->
{{--    <script type='text/javascript'>--}}
{{--        (function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()--}}
{{--        {a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};--}}
{{--            a.queue=[];var s='script';r=t.createElement(s);r.async=!0;--}}
{{--            r.src=n;var u=t.getElementsByTagName(s)[0];--}}
{{--            u.parentNode.insertBefore(r,u);})(window,document,--}}
{{--            'https://sc-static.net/scevent.min.js');--}}

{{--        snaptr('init', 'befc9e4c-5986-4ab6-8d33-6b723026a277', {});--}}

{{--        snaptr('track', 'PAGE_VIEW');--}}

{{--    </script>--}}
    <!-- End Snap Pixel Code -->




</head>

@if(getDir() == 'rtl')
    <body class="text-right" id="p_wrapper">
    {{--    <div class="smart_bar">--}}
    {{--        <div class="alert alert-info alert-dismissible fade show" style="background-color: #20a0e1;border-color: #031138">--}}
    {{--            <div class="text_center ptsm pbsm">--}}
    {{--                <h5>--}}
    {{--                    <a style="color: #ffffff" href="https://igtsservice.com/ar/diplomas/category">عروض اليوم الوطنى السعودى</a>--}}
    {{--                </h5>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div id="smartbar-ar" class="smart_bar">
    </div>
    @else
        <body class="text-left" id="p_wrapper">
        {{--        <div class="smart_bar">--}}
        {{--            <div class="alert alert-info alert-dismissible fade show" style="background-color: #20a0e1;border-color: #031138">--}}
        {{--                <div class="text_center ptsm pbsm">--}}
        {{--                    <h5>--}}
        {{--                        <a style="color: #ffffff" href="https://igtsservice.com/ar/diplomas/category">Saudi National Day Offers</a>--}}
        {{--                    </h5>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div id="smartbar-en" class="smart_bar">
        </div>
        @endif

        {{--        <!-- Google Tag Manager (noscript) -->--}}
        {{--        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGKDP6C"--}}
        {{--                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>--}}
        {{--        <!-- End Google Tag Manager (noscript) -->--}}

        @php
            $isWebView = false;
        if((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false)) :
            $isWebView = true;
        elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) :
            $isWebView = true;
        endif;

        @endphp

        @if(!$isWebView)

            @if(! ( class_basename(Route::current()->controller) == 'PageController'))
                <!-- <div class="se-pre-con"></div> -->
                <div class="loading flexCenter">
                    <div class="loader-logo">
                        <div class="loader">Loading...</div>
                        <img src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png" alt="..." >
                    </div>
                </div>
            @endif
        @endif

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC9GVX98"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        @include(layoutIgtsHeader('website'))


        @include(layoutContent('website'))


        <a href="https://wa.me/966569120330" target="_blank" class="float">
            <i class="fab fa-whatsapp my-float" aria-hidden="true"></i>
        </a>

        <input type='hidden' id='user_id' value='{{(auth()->check())?Auth::user()->id:''}}'>
        <input type='hidden' id='path' value='{{ url('/') }}'>

        @include(layoutFooter('website'))

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="lectureModal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        ...
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal -->





        {{--    <div id="yourElementID" class="modal fade" role="dialog">--}}
        {{--        <div class="modal-dialog">--}}
        {{--            <div class="modal-content" style="    background-color: antiquewhite;">--}}
        {{--                <div class="modal-header btn-blue">--}}
        {{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
        {{--                </div>--}}
        {{--                <div class="modal-body">--}}
        {{--                    @include('website.spin')--}}
        {{--                </div>--}}
        {{--                <div class="modal-footer">--}}
        {{--                    <div class="col-sm-12">--}}
        {{--                        <a href="">--}}
        {{--                            <button type="button" class="btn btn-danger col-xs-12" data-dismiss="modal">Cancel</button>--}}
        {{--                        </a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}


        @livewireScripts
        </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

{{--@if(Auth::check())--}}

{{--    @if(!\App\Application\Model\Spin::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first())--}}
{{--        <!-- START JAVASCRIPT FILES LOADING -->--}}
{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}
{{--        <script type="text/javascript">--}}
{{--            $(window).load(function() {--}}
{{--                $('#yourElementID').modal('show');--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endif--}}
{{--@endif--}}

<!--


<script>
    jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.wheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("wheel", handle, { passive: true });
    }
};
jQuery.event.special.mousewheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("mousewheel", handle, { passive: true });
    }
};

</script> -->
<script src="{{ asset('website') }}/js/bootstrap.min.js?v={{$VERSION_NUMBER}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js" async defer></script>
<script type="text/javascript" src="{{ asset('website') }}/js/app.min.js?v={{$VERSION_NUMBER}}"></script>
<script type="text/javascript" src="{{ asset('website') }}/js/owl.carousel.min.js?v={{$VERSION_NUMBER}}"></script>
@if(getDir() == "rtl")
    <script type="text/javascript" src="{{ asset('website') }}/js/custom.owl-rtl.js?v={{$VERSION_NUMBER}}"></script>
@else
    <script type="text/javascript" src="{{ asset('website') }}/js/custom.owl.js?v={{$VERSION_NUMBER}}"></script>
@endif
<!--Start of HubSpot Embed Code -->
{{--<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4880007.js"></script>--}}
<!--End of HubSpot Embed Code -->
<script src="{{ asset('website') }}/js/custom.js?v={{$VERSION_NUMBER}}"></script>
{{ Html::script('website/js/sweetalert.min.js') }}




@include('sweet::alert')

<!-- <script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $(document).bind('cut copy paste', function (e) {
        e.preventDefault();
    });

    //Disable mouse right click
    $(document).on("contextmenu",function(e){
        return false;
    });
});
</script> -->

<script>
    (function (e, t, n) {
        var r = e.querySelectorAll("html")[0];
        r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
    })(document, window, 0);
</script>

@if(Session::get('socialUserRegister'))
    <script>$('#registerModal').modal('show');</script>
    @php Session::pull('socialUserRegister') @endphp
@endif

@if(Illuminate\Support\Facades\Route::currentRouteName() != "register" && Illuminate\Support\Facades\Route::currentRouteName() != "login")
    @if(Session::get('signupError') )
        <script>$('#registerModal').modal('show');</script>
        @php Session::pull('signupError'); @endphp
    @endif

    @if(Session::get('loginError'))
        <script>$('#loginModal').modal('show');</script>
        @php Session::pull('loginError'); @endphp
    @endif
@endif

<script src="{{ url('website') }}/js/selectize.min.js?v={{$VERSION_NUMBER}}"></script>
<script type="text/javascript" src="{{ asset('website') }}/js/consultations.js"></script>
<script src="https://player.vdocipher.com/v2/api.js"></script>