@php
    use Illuminate\Support\Facades\Session as Session;

    $VERSION_NUMBER = 15.7;
@endphp
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}" data-theme="light">

<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    @if (Auth::check())
        <script>
            let event_id = "{{ Auth::user()->id }}";
        </script>
    @endif
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="IGTS">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="facebook-domain-verification" content="z3li963csbvtfybzbb6kf3unwwj4v9" />
    <title> منصة تدريب عمل المستقبل</title>
    @if (View::hasSection('canonical'))
        @yield('canonical')
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png">


    @if (getDir() == 'rtl')
    @else
    @endif

    <link rel="stylesheet" href="{{ asset('subscription-new/public') }}/style.css?v={{ $VERSION_NUMBER }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="preload" href="{{ asset('subscription-new/public') }}/fonts/URWGeometricArabic-ExtraBold.woff2" as="font"
          type="font/woff2" crossorigin rel="preload" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="{{ asset('subscription-new/public') }}/fonts/URWGeometricArabic-Regular.woff2"
          type="font/woff2" crossorigin rel="preload" as="font" type="font/woff2" crossorigin />
    @stack('css')
    {{ Html::style('website/css/sweetalert.css') }}
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Google Tag Manager -->
{{--    <script>--}}
{{--        (function (w, d, s, l, i) {--}}
{{--            w[l] = w[l] || [];--}}
{{--            w[l].push({--}}
{{--                'gtm.start': new Date().getTime(),--}}
{{--                event: 'gtm.js'--}}
{{--            });--}}
{{--            var f = d.getElementsByTagName(s)[0],--}}
{{--                j = d.createElement(s),--}}
{{--                dl = l != 'dataLayer' ? '&l=' + l : '';--}}
{{--            j.async = true;--}}
{{--            j.src =--}}
{{--                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;--}}
{{--            f.parentNode.insertBefore(j, f);--}}
{{--        })(window, document, 'script', 'dataLayer', 'GTM-KC9GVX98');--}}
{{--    </script>--}}
    <!-- End Google Tag Manager -->

    <!-- TikTok Pixel Code Start -->
{{--    <script>--}}
{{--        ! function (w, d, t) {--}}
{{--            w.TiktokAnalyticsObject = t;--}}
{{--            var ttq = w[t] = w[t] || [];--}}
{{--            ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias",--}}
{{--                "group", "enableCookie", "disableCookie", "holdConsent", "revokeConsent", "grantConsent"--}}
{{--            ], ttq.setAndDefer = function (t, e) {--}}
{{--                t[e] = function () {--}}
{{--                    t.push([e].concat(Array.prototype.slice.call(arguments, 0)))--}}
{{--                }--}}
{{--            };--}}
{{--            for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);--}}
{{--            ttq.instance = function (t) {--}}
{{--                for (--}}
{{--                    var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);--}}
{{--                return e--}}
{{--            }, ttq.load = function (e, n) {--}}
{{--                var r = "https://analytics.tiktok.com/i18n/pixel/events.js",--}}
{{--                    o = n && n.partner;--}}
{{--                ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = r, ttq._t = ttq._t || {}, ttq._t[e] = +new Date,--}}
{{--                    ttq._o = ttq._o || {}, ttq._o[e] = n || {};--}}
{{--                n = document.createElement("script");--}}
{{--                n.type = "text/javascript", n.async = !0, n.src = r + "?sdkid=" + e + "&lib=" + t;--}}
{{--                e = document.getElementsByTagName("script")[0];--}}
{{--                e.parentNode.insertBefore(n, e)--}}
{{--            };--}}


{{--            ttq.load('CRGKRVBC77UD2MA17590');--}}
{{--            ttq.page();--}}
{{--        }(window, document, 'ttq');--}}
{{--    </script>--}}
    <!-- TikTok Pixel Code End -->


    <!-- Snap Pixel Code -->
{{--    <script type='text/javascript'>--}}
{{--        (function (e, t, n) {--}}
{{--            if (e.snaptr) return;--}}
{{--            var a = e.snaptr = function () {--}}
{{--                a.handleRequest ? a.handleRequest.apply(a, arguments) : a.queue.push(arguments)--}}
{{--            };--}}
{{--            a.queue = [];--}}
{{--            var s = 'script';--}}
{{--            r = t.createElement(s);--}}
{{--            r.async = !0;--}}
{{--            r.src = n;--}}
{{--            var u = t.getElementsByTagName(s)[0];--}}
{{--            u.parentNode.insertBefore(r, u);--}}
{{--        })(window, document,--}}
{{--            'https://sc-static.net/scevent.min.js');--}}

{{--        snaptr('init', 'befc9e4c-5986-4ab6-8d33-6b723026a277', {});--}}

{{--        snaptr('track', 'PAGE_VIEW');--}}
{{--    </script>--}}
    <!-- End Snap Pixel Code -->

    <style>
        .menu :where(li:not(.menu-title) > :not(ul, details, .menu-title, .btn)), .menu :where(li:not(.menu-title) > details > summary:not(.menu-title)) {
            padding-left: .2rem;
            padding-right: .2rem;
        }
        .menu-horizontal > li:not(.menu-title) > details > ul {
            z-index: 99;
        }

        .dot-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            height: 60px;
        }

        .dot-spinner span {
            width: 12px;
            height: 12px;
            background-color: #4CAF50;
            border-radius: 50%;
            animation: bounce 0.6s infinite alternate;
        }

        .dot-spinner span:nth-child(2) {
            animation-delay: 0.2s;
        }
        .dot-spinner span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            to {
                transform: translateY(-15px);
            }
        }

        .mobile-menu {
            max-height: 100vh; /* يمنع تجاوز الشاشة */
            overflow-y: auto;  /* يتيح التمرير العمودي */
            -webkit-overflow-scrolling: touch; /* يعطي تجربة سلسة على أجهزة iOS */
        }

        .main-menu-toggle > ul {
            max-height: 70vh;
            overflow-y: auto;
        }



    </style>

</head>

<body class="h-full {{ getDir() }} ">

{{--<!-- Google Tag Manager (noscript) -->--}}
{{--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC9GVX98" height="0" width="0"--}}
{{--                  style="display:none;visibility:hidden"></iframe></noscript>--}}
{{--<!-- End Google Tag Manager (noscript) -->--}}

<!-- Google Tag Manager (noscript) -->
{{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGKDP6C" --}} {{-- height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript> --}}
<!-- End Google Tag Manager (noscript) -->

@php
    $isWebView = false;
    if (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false &&
        strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false
    ):
        $isWebView = true;
    elseif (isset($_SERVER['HTTP_X_REQUESTED_WITH'])):
        $isWebView = true;
    endif;
@endphp


        <!-- Header Section -->
<header class="flex items-center justify-between px-[30px] md:px-[90px] py-[32px] !bg-transparent">
    <a href="/" class="block relative z-[2]">
        <img src="{{ asset('subscription-new/src') }}/images/FuturWorkLogoDark.png" alt="igts"
             class=" md:h-[63px] h-[50px]" />
    </a>

    <div class="items-center justify-center hidden space-x-8 xl:flex relative z-[2]">
        <ul class="menu menu-horizontal rounded-box">
            <li>
                <a href="{{ url('/') }}"
                   class="text-black transition ease-in-out hover:text-green">{{ trans('home.home') }}</a>
            </li>
            <li>
                <details>
                    <summary class=" text-black transition ease-in-out hover:text-green">
                        تخصصات العمل الحر
                    </summary>
                    <ul class="rounded-[10px] min-w-[300px] grid grid-cols-1">
                        @foreach (menuFutureWorkCategories() as $catF)
                            @if (!$catF->childs->isEmpty())
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    {{-- <a href="#"> {{$cat->name_lang}}</a> --}}
                                    <details>
                                        <summary class="text-black transition ease-in-out hover:text-white">
                                            {{ $catF->name_lang }}
                                        </summary>

                                        <ul class="rounded-[10px] grid grid-cols-2">
                                            @foreach ($catF->childs as $childF)
                                                @if ($childF->show_menu)
                                                    <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                        <a
                                                                href="/allcourses/category/{{ $childF->slug }}">{{ $childF->name_lang }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </details>
                                </li>
                            @else
                                @if (!$catF->parent_id)
                                    <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                        <a href="/allcourses/category/{{ $catF->slug }}">{{ $catF->name_lang }}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </details>
            </li>
            <li>
                <details>
                    <summary class=" text-black transition ease-in-out hover:text-green">
                        تخصصات عامة
                    </summary>
                    <ul class="rounded-[10px] min-w-[300px] grid grid-cols-1">
                        @foreach (menuCategories() as $cat)
                            @if (!$cat->childs->isEmpty())
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    {{-- <a href="#"> {{$cat->name_lang}}</a> --}}
                                    <details>
                                        <summary class="text-black transition ease-in-out hover:text-white">
                                            {{ $cat->name_lang }}
                                        </summary>

                                        <ul class="rounded-[10px] grid grid-cols-2">
                                            @foreach ($cat->childs as $child)
                                                @if ($child->show_menu)
                                                    <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                        <a
                                                                href="/allcourses/category/{{ $child->slug }}">{{ $child->name_lang }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </details>
                                </li>
                            @else
                                @if (!$cat->parent_id)
                                    <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                        <a href="/allcourses/category/{{ $cat->slug }}">{{ $cat->name_lang }}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </details>
            </li>

            <li>
                <a href="#"
                   class="text-black transition ease-in-out hover:text-green">{{ trans('home.Professional Certificates') }}</a>
            </li>
        </ul>

        <form class="pl-2 pr-2 !m-0 !space-x-0 search-bar desktop-search" action="/allcourses/category"
              method="GET">
            <input type="text" placeholder="{{ trans('home.search placeholder') }}" name='key' autocomplete="off"
                   class="outline-none text-darkgrey h-[45px] py-[16px] px-[32px] rounded-full bg-coolgrey border border-darkgrey" />
            <div class="autocom-box"
                 style="position: absolute;width: 100%;background: #fff;border-radius: 5px;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);margin-top: 8px; font-size: 15px; z-index: 3;">
            </div>
        </form>

    </div>


    <p class="flex-shrink-0 whitespace-nowrap px-3 py-2 justify-center text-center text-white rounded-full text-sm bg-green hover:bg-blue transition-all duration-200 leading-none">
        نسخة تجريبية
    </p>


    <div class="text-[16px] xl:flex items-center space-x-4 hidden relative z-[2]">
        <!-- This is for the user drop-down menu  -->


        @if (Auth::check())
            <!-- Reusable  -->
            <ul class=" menu menu-horizontal rounded-box">
                <li>
                    <details>
                        <summary class="text-black transition ease-in-out hover:text-green">
                            {{--                                    {{ charlimit(Auth::user()->name, 20) }}--}}

                            {{ explode(' ', Auth::user()->name)[0] }}

                        </summary>

                        <ul class="rounded-[10px] w-[300px] grid grid-cols-1">

                            @if (
                                    Auth::user()->group_id == 1 ||
                                    Auth::user()->group_id == 9 ||
                                    Auth::user()->group_id == 10 ||
                                    Auth::user()->group_id == 11 ||
                                    Auth::user()->group_id == 12 ||
                                    Auth::user()->group_id == 13 ||
                                    Auth::user()->group_id == 14 ||
                                    Auth::user()->group_id == 15 ||
                                    Auth::user()->group_id == 19 ||
                                    Auth::user()->group_id == 16
                                )
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('lazyadmin') }}">{{ trans('home.UserType1') }}</a>
                                </li>
                            @endif
                            @if (Auth::user()->group_id == 6)
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('business/home') }}">{{ trans('businessdata.Dashboard') }}</a>
                                </li>
                            @endif

                            @if (isValidBusiness(Auth::user()->businessdata_id))
                                @php
                                    $businessdata = \App\Application\Model\Businessdata::findOrfail(
                                        Auth::user()->businessdata_id,
                                    );
                                @endphp
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('business/businessCourses') }}"><i class="fas fa-home"></i>
                                        {{ trans('courses.businessCourses') }}
                                        ({{ $businessdata->name_lang }})</a>
                                </li>
                                @if (Auth::user()->group_id == App\Application\Model\User::TYPE_GROUP_ADMIN and Auth::user()->businessGroupAdmin)
                                    <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                        <a href="{{ url('business/mygroup') }}">
                                            <i class="fas fa-home"></i>
                                            {{ trans('courses.my group') }} ({{ $businessdata->name_lang }})
                                        </a>
                                    </li>
                                @endif
                            @endif
                            @if (Auth::user()->is_affiliate or Auth::user()->group_id == 3)
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('/account/analysis') }}">
                                        <i class="fas fa-graduation-cap"></i> {{ trans('home.analysis') }}
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->group_id == 17)
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('account/consultantanalysis') }}">
                                        <i class="fas fa-graduation-cap"></i> {{ trans('home.analysis') }}
                                    </a>
                                </li>
                            @endif
                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/myCourses') }}">
                                    <i class="fas fa-graduation-cap"></i> {{ trans('home.my courses') }}
                                </a>
                            </li>
                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/myProgress#weekly_goal') }}">
                                    <i class="fas fa-graduation-cap"></i> {{ trans('account.My Progress') }}
                                </a>
                            </li>
                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/myProgress') }}">
                                    <i class="fas fa-graduation-cap"></i> {{ trans('account.my notes') }}
                                </a>
                            </li>
                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/myFavourites') }}">
                                    <i class="fas fa-heart"></i> {{ trans('home.my favorites') }}
                                </a>
                            </li>

                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/myCertificates') }}">
                                    <i class="fas fa-certificate"></i> {{ trans('home.my certificates') }}
                                </a>
                            </li>

                            @isset(Auth::user()->subscription)
                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                    <a href="{{ url('account/mySubscriptions') }}">
                                        <i class="fas fa-graduation-cap"></i> {{ trans('courses.mySubscriptions') }}
                                    </a>
                                </li>
                            @endisset


                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ url('account/edit') }}">
                                    <i class="fas fa-cog"></i> {{ trans('home.account info') }}
                                </a>
                            </li>


                            <li class="font-bold transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                    {{ trans('home.logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        @else
            <a href="javascript:void(0)" onclick="createAccountModal.showModal()"
               style="--tw-space-x-reverse: 0;    margin-right: calc(1rem* var(--tw-space-x-reverse));    margin-left: calc(1rem* calc(1 - var(--tw-space-x-reverse)));"
               class="text-black underline justify-center text-center transition ease-in-out underline-offset-2 hover:text-green hover:no-underline">
                {{ trans('home.signup') }}
            </a>
            <a href="javascript:void(0)" onclick="signinModal.showModal()"
               class=" px-4 py-2 text-white justify-center text-center rounded-full bg-blue transition ease-in-out hover:bg-green">
                {{ trans('home.signin') }}
            </a>
        @endif


        {{--            <a class="font-bold items-baseline ltr:pt-[4px] rtl:pt-[8px] hover:text-white w-[45px] h-[45px] transition ease-in-out hover:bg-green flex justify-center border rounded-full border-green text-green"--}}
        {{--                href="{{ LaravelLocalization::getLocalizedURL(config('app.locale') == 'en' ? 'ar' : 'en') }}">--}}
        {{--                {{ trans('website.other lang') }}--}}
        {{--            </a>--}}
    </div>

    <!-- Mobile Menu -->
    <div class="!flex hamburger xl:!hidden">
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="flex flex-col items-center justify-center transition ease-in-out mobile-menu">
            <ul class="transition ease-in-out menu menu-vertical w-full px-[30px] gap-4">
                <li class="text-white text-[25px] font-light">
                    <a href="{{ url('/') }}">{{ trans('home.home') }}</a>
                </li>
                <li>
                    <details class="main-menu-toggle">
                        <summary class="transition ease-in-out text-white font-light text-[25px]">
                            تخصصات العمل الحر
                        </summary>
                        <ul class="transition ease-in-out rounded-[10px] w-[300px] grid grid-cols-1">
                            @foreach (menuFutureWorkCategories() as $catF)
                                @if (!$catF->childs->isEmpty())
                                    <li class="transition ease-in-out text-[18px] font-light text-white">
                                        <details>
                                            <summary class="text-white transition ease-in-out">
                                                {{ $catF->name_lang }}
                                            </summary>

                                            <ul class="rounded-[10px] grid grid-cols-2">
                                                @foreach ($catF->childs as $childF)
                                                    @if ($childF->show_menu)
                                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                            <a href="/allcourses/category/{{ $childF->slug }}">{{ $childF->name_lang }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </details>
                                    </li>
                                @else
                                    @if (!$catF->parent_id)
                                        <li class="transition ease-in-out text-[18px] font-light text-white">
                                            <a href="/allcourses/category/{{ $catF->slug }}">{{ $catF->name_lang }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="main-menu-toggle">
                        <summary class="transition ease-in-out text-white font-light text-[25px]">
                            تخصصات عامة
                        </summary>
                        <ul class="transition ease-in-out rounded-[10px] w-[300px] grid grid-cols-1">
                            @foreach (menuCategories() as $cat)
                                @if (!$cat->childs->isEmpty())
                                    <li class="transition ease-in-out text-[18px] font-light text-white">
                                        <details>
                                            <summary class="text-white transition ease-in-out">
                                                {{ $cat->name_lang }}
                                            </summary>

                                            <ul class="rounded-[10px] grid grid-cols-2">
                                                @foreach ($cat->childs as $child)
                                                    @if ($child->show_menu)
                                                        <li
                                                                class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                            <a
                                                                    href="/allcourses/category/{{ $child->slug }}">{{ $child->name_lang }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </details>
                                    </li>
                                @else
                                    @if (!$cat->parent_id)
                                        <li class="transition ease-in-out text-[18px] font-light text-white">
                                            <a href="/allcourses/category/{{ $cat->slug }}">{{ $cat->name_lang }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </details>
                </li>

                <li class="text-white text-[25px] font-light">
                    <a href="#">{{ trans('home.Professional Certificates') }}</a>
                </li>

            </ul>

            <div class="text-[16px] flex flex-col items-center w-full mt-6 px-[30px]">
                <form class="pl-2 pr-2 search-bar desktop-search" action="/allcourses/category" method="GET">
                    <input type="text" placeholder="{{ trans('home.search placeholder') }}" name='key'
                           autocomplete="off"
                           class="outline-none w-full text-darkgrey h-[45px] py-[16px] px-[32px] rounded-full bg-coolgrey border border-darkgrey" />
                    <div class="autocom-box"
                         style="position: absolute;width: 100%;background: #fff;border-radius: 5px;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);margin-top: 8px; font-size: 15px; z-index: 3;">
                    </div>
                </form>
                <div class="flex items-center justify-center w-full gap-4 py-[20px]">



                    @if (Auth::check())
                        <!-- Reusable  -->
                        <ul class=" menu menu-horizontal rounded-box">
                            <li>
                                <details>
                                    <summary class="text-white text-[25px] font-light transition ease-in-out hover:text-green">
                                        {{ charlimit(Auth::user()->name, 20) }}
                                    </summary>

                                    <ul class="rounded-[10px] w-[300px] grid grid-cols-1">

                                        @if (
                                                Auth::user()->group_id == 1 ||
                                                Auth::user()->group_id == 9 ||
                                                Auth::user()->group_id == 10 ||
                                                Auth::user()->group_id == 11 ||
                                                Auth::user()->group_id == 12 ||
                                                Auth::user()->group_id == 13 ||
                                                Auth::user()->group_id == 14 ||
                                                Auth::user()->group_id == 15 ||
                                                Auth::user()->group_id == 19 ||
                                                Auth::user()->group_id == 16
                                            )
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a href="{{ url('lazyadmin') }}">{{ trans('home.UserType1') }}</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->group_id == 6)
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a
                                                        href="{{ url('business/home') }}">{{ trans('businessdata.Dashboard') }}</a>
                                            </li>
                                        @endif

                                        @if (isValidBusiness(Auth::user()->businessdata_id))
                                            @php
                                                $businessdata = \App\Application\Model\Businessdata::findOrfail(
                                                    Auth::user()->businessdata_id,
                                                );
                                            @endphp
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a href="{{ url('business/businessCourses') }}"><i class="fas fa-home"></i>
                                                    {{ trans('courses.businessCourses') }}
                                                    ({{ $businessdata->name_lang }})</a>
                                            </li>
                                            @if (Auth::user()->group_id == App\Application\Model\User::TYPE_GROUP_ADMIN and Auth::user()->businessGroupAdmin)
                                                <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                    <a href="{{ url('business/mygroup') }}">
                                                        <i class="fas fa-home"></i>
                                                        {{ trans('courses.my group') }}
                                                        ({{ $businessdata->name_lang }})
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                        @if (Auth::user()->is_affiliate or Auth::user()->group_id == 3)
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a href="{{ url('/account/analysis') }}">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    {{ trans('home.analysis') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->group_id == 17)
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a href="{{ url('account/consultantanalysis') }}">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    {{ trans('home.analysis') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/myCourses') }}">
                                                <i class="fas fa-graduation-cap"></i>
                                                {{ trans('home.my courses') }}
                                            </a>
                                        </li>
                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/myProgress#weekly_goal') }}">
                                                <i class="fas fa-graduation-cap"></i>
                                                {{ trans('account.My Progress') }}
                                            </a>
                                        </li>
                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/myProgress') }}">
                                                <i class="fas fa-graduation-cap"></i>
                                                {{ trans('account.my notes') }}
                                            </a>
                                        </li>
                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/myFavourites') }}">
                                                <i class="fas fa-heart"></i> {{ trans('home.my favorites') }}
                                            </a>
                                        </li>

                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/myCertificates') }}">
                                                <i class="fas fa-certificate"></i>
                                                {{ trans('home.my certificates') }}
                                            </a>
                                        </li>

                                        @isset(Auth::user()->subscription)
                                            <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                                <a href="{{ url('account/mySubscriptions') }}">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    {{ trans('courses.mySubscriptions') }}
                                                </a>
                                            </li>
                                        @endisset


                                        <li class="transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ url('account/edit') }}">
                                                <i class="fas fa-cog"></i> {{ trans('home.account info') }}
                                            </a>
                                        </li>


                                        <li
                                                class="font-bold transition ease-in-out rounded-md hover:bg-green hover:text-white">
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                               class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                                {{ trans('home.logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </details>
                            </li>
                        </ul>
                    @else
                        <a href="javascript:void(0)" onclick="createAccountModal.showModal()"
                           class="text-white text-[14px] underline transition ease-in-out underline-offset-2 hover:text-green hover:no-underline">
                            {{ trans('home.signup') }}
                        </a>
                        <a href="javascript:void(0)" onclick="signinModal.showModal()"
                           class="h-[42px] px-4 py-2 text-white rounded-full bg-green transition ease-in-out hover:bg-white hover:text-green">
                            {{ trans('home.signin') }}
                        </a>
                    @endif


                    {{--                        <a class="font-bold hover:text-white items-baseline ltr:pt-[4px] rtl:pt-[7px] w-[45px] h-[45px] transition ease-in-out hover:bg-white flex justify-center border rounded-full border-white text-white"--}}
                    {{--                            href="{{ LaravelLocalization::getLocalizedURL(config('app.locale') == 'en' ? 'ar' : 'en') }}">--}}
                    {{--                            {{ trans('website.other lang') }}--}}
                    {{--                        </a>--}}


                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-section px-[30px] md:px-[90px] pt-[40px] md:pt-[80px]">
    <div class="flex flex-col items-start justify-between md:items-center md:flex-row">
        <div class="hero-section__content border-decoration ltr:pl-[22px] rtl:pr-[22px]">
            <h1 class="hero-section__title text-blue md:text-[40px] text-[30px] font-bold">
                {{ trans('website.Chase It,') }}
                {{-- <br /> --}}
                {{-- {{trans('website.Youre Almost There')}} --}}
            </h1>
        </div>
        <div class="hero-section__description w-full md:w-[546px]" style="z-index: 1;">
            <p class="text-babydark md:text-[16px] text-[16px] mt-[15px] md:mt-0">
                {{ trans('website.Hero Section Desc') }}
                {{-- <br>
                <br> --}}
                <a href="#our-plans-section"
                   class="font-bold text-white text-[24px] md:text-[24px] pb-[3px] mt-[17px] transition ease-in-out bg-green hover:bg-blue w-[265px] h-[55px] flex items-center justify-center rounded-full">
                    اشترك الآن
                </a>
        </div>
    </div>
    <div class="hero-section__image mt-[60px]">
        <div class="swiper md:h-[650px] h-[400px]">
            <div class="swiper-wrapper">
                @if ($sliders && count($sliders) > 0)
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <!-- Add debug output -->
                            <img class="w-full h-[300px] md:h-[650px] object-cover" src="{{ large1($slider->image) }}"
                                 alt="igts-image" />
                        </div>
                    @endforeach
                @else
                    <p>No sliders found</p>
                @endif
            </div>

            <div class="swiper-pagination pb-[20px]"></div>
        </div>
    </div>
</section>


<!-- Specialities Section -->
<section
        class="specialities-section relative mt-[50px] md:px-[90px] px-[30px] md:py-[60px] py-[30px] bg-coolgrey reverse-cols-md grid md:grid-cols-2 grid-cols-1 items-center">
    <div class="Specialities-slider mt-[30px] ltr:pr-0 rtl:pl-0 md:ltr:pr-[50px] md:rtl:pl-[50px]">
        <div class="swiper md:h-[600px] h-[400px]">
            <div class="swiper-wrapper">



                @foreach ($homeCategories as $cats)
                    {{-- @if (!$cats->childs->isEmpty()) --}}
                    <div class="swiper-slide">
                        <div class="relative">
                            <a href="/allcourses/category/{{ $cats->slug }}">
                                <img src="{{ large1($cats->image) }}"
                                     alt="{{ $cats->name_lang }}" class="object-cover w-full h-full rounded-lg" />
                                <div class="absolute inset-0 bg-black rounded-lg opacity-50"></div>
                                <h2
                                        class="absolute w-full md:text-lg text-[12px] font-bold text-center text-white bottom-4 px-[10px]">
                                    {{ $cats->name_lang }}
                                </h2>
                            </a>
                        </div>
                    </div>
                    {{-- @endif --}}
                @endforeach

            </div>
            <div class="block swiper-pagination md:hidden"></div>
        </div>
        <div class="items-center justify-center hidden gap-4 rotate-90 md:flex Specialities-slider__buttons">
            <div class="button-prev">
                <img src="{{ asset('subscription-new/src') }}/images/arrow-left.svg" alt="arrow-left" />
            </div>
            <div class="button-next">
                <img src="{{ asset('subscription-new/src') }}/images/arrow-right.svg" alt="arrow-right" />
            </div>
        </div>
    </div>
    <div class="md:ltr:pl-[100px] ltr:pl-0 md:rtl:pr-[100px] rtl:pr-0 order-first md:order-last">
        <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
            <h2 class="text-black md:text-[40px] text-[25px]">{{ trans('website.Specialities') }}</h2>
            {{-- <p class="text-babydark md:text-[32px] text-[18px]"> --}}
            {{-- {{trans('website.Specialities p')}} --}}
            {{-- </p> --}}
        </div>
        <p class="text-babydark md:text-[18px] text-[18px] mt-[30px]">
            {{ trans('website.Specialities description') }}
        </p>
    </div>
</section>

<!-- Top Courses Section -->
<section class="top-courses-section bg-white mt-[50px] md:mt-[100px] px-[30px] md:px-[90px] pt-0 py-[60px]">
    <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
        <h2 class="text-black md:text-[40px] text-[30px] font-bold">
            {{ trans('website.Top Courses') }}
        </h2>
        <p class="text-babydark md:text-[32px] text-[20px]">
            {{ trans('website.Discover, the most requested courses') }}
        </p>
    </div>

    <div class="mt-[50px] top-courses-slider">
        <div class="swiper h-[550px] relative">
            <div class="swiper-wrapper">

                @if ($featuredAll && count($featuredAll) > 0)
                    @foreach ($featuredAll as $feature)
                        <div class="swiper-slide w-[300px] flex-shrink-0 h-[100%]">
                            <a href="{{ url('/courses/view/' . $feature->slug) }}"
                               class="block h-full flex flex-col rounded-[10px] overflow-hidden bg-white shadow-sm p-[10px]">

                                <!-- الصورة -->
                                <div class="h-[250px] w-full">
                                    <img class="rounded-[10px] w-full h-full object-cover"
                                         src="{{ large1($feature->image) }}"
                                         alt="{{ $feature->title_lang }}" />
                                </div>

                                <!-- المحتوى -->
                                <div class="flex flex-col justify-between flex-grow mt-[15px]">

                                    <!-- العنوان -->
                                    <h3 class="text-black mt-[15px] font-semibold leading-tight text-[16px] sm:text-[18px] md:text-[20px] lg:text-[22px] min-h-[48px] md:min-h-[52px] lg:min-h-[60px] overflow-hidden line-clamp-2">
                                        {{ strip_tags($feature['title_lang']) }}
                                    </h3>


                                    <!-- الوصف -->
                                    <p class="text-babydark mt-[10px] text-[14px] leading-[1.4] line-clamp-3 min-h-[63px]">
                                        {{ \Illuminate\Support\Str::words(strip_tags($feature['description_lang']), 25, '...') }}
                                    </p>


                                    <!-- زر المشاهدات -->
                                    <div class="inline-flex items-center gap-2 bg-coolgrey h-[35px] rounded-full px-[15px] w-max mt-[12px]">
                                    <span class="text-green text-[14px]">
                                      +{{ $feature->visits >= 1000 && $feature->visits < 1000000
                                          ? number_format($feature->visits / 1000, 0) . 'K'
                                          : ($feature->visits >= 1000000
                                              ? number_format($feature->visits / 1000000, 0) . 'M'
                                              : $feature->visits) }}
                                    </span>
                                        <span class="text-[14px] text-babydark">{{ trans('website.Views') }}</span>
                                    </div>

                                </div>
                            </a>
                        </div>


                    @endforeach
                @endif

            </div>

            <div class="flex items-center bottom-0 justify-end gap-4 top-courses-slider__buttons pt-[48px]">
                <div class="button-prev">
                    <img src="{{ asset('subscription-new/src') }}/images/arrow-left.svg" alt="arrow-left" />
                </div>
                <div class="button-next">
                    <img src="{{ asset('subscription-new/src') }}/images/arrow-right.svg" alt="arrow-right" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Plans Section -->

{{--    @if(!isset(Auth::user()->subscription))--}}
<section id="our-plans-section"
         class="md:mt-[100px] mt-[50px] md:px-[90px] px-[30px] py-[80px] bg-coolgrey flex flex-col md:flex-row items-center">
    <div
            class="md:w-[30%] w-full md:items-start items-center flex flex-col text-center md:rtl:text-right md:ltr:text-left">
        <h3 class="text-black text-[25px] lg:text-[40px] font-bold">
            {{ trans('website.Our Plans') }}
        </h3>
        {{-- <p class="text-babydark text-[20px] lg:text-[32px] mt-[10px]"> --}}
        {{-- {{trans('website.Our Plans P')}} --}}
        {{-- </p> --}}
        <p class="text-babydark text-[18px] mt-[30px]">
            {{ trans('website.Our Plans Description') }}

        </p>
        <p class="text-babydark text-[18px] mt-[30px]">

            {{ trans('website.Our Plans Description2') }}

        </p>
        {{-- <a href="#" onclick="annualModal.showModal()"
            class="text-white pb-[3px] mt-[50px] transition ease-in-out bg-green hover:bg-blue w-[265px] h-[55px] flex items-center justify-center rounded-full">
            --}}
        {{-- Signup To Subscribe --}}
        {{-- </a> --}}
    </div>
    <div class="flex flex-col md:flex-row items-center justify-center md:w-[50%] w-full md:mt-0 mt-[50px]">
        <div id="{{ Auth::check() ? 'annualSubBtn' : 'annualSubBtnOff' }}" class="annualSubBtn text-center cursor-pointer flex flex-col justify-between h-[500px] lg:h-[650px] min-w-[250px] lg:min-w-[300px] xl:min-w-[550px] p-[32px] gradient-blue rounded-[20px]"
              data-annualFees="{{ $subscription_yearly_after }}"
             onclick="{{ Auth::check() ? 'subscriptionModal.showModal()' : 'signinModal.showModal()' }}">
            <h4 class="text-white pb-[32px] text-[40px] font-bold border-b border-white uppercase annualSubBtn">
                {{ trans('b2b.ANNUAL') }}
            </h4>
            <div class="text-white annualSubBtn">
                <h2 class="annualSubBtn text-[80px] lg:text-[120px] font-bold leading-[1]">
                    {{ $subscription_yearly_after }}
                </h2>
                <h3 class="annualSubBtn text-[24px] lg:text-[32px] uppercase">
                    {{ getCurrency() }}/{{ trans('website.Year') }}
                </h3>
                <div class="annualSubBtn mt-[10px] flex items-center justify-center gap-4">
                    <p class="text-[32px] lg:text-[48px] font-bold line-through text-white/45">
                        {{ $subscription_yearly_before }}
                    </p>
                    <span class="annualSubBtn text-[20px] lg:text-[24px] text-white/45 uppercase">{{ getCurrency() }}/{{ trans('website.Year') }}</span>
                </div>
            </div>
            <div  class="annualSubBtn text-white flex items-center justify-center pt-[32px] text-[28px] font-light border-t border-white uppercase w-full">
                {{ trans('website.Recommended') }}
            </div>

            <div class="flex items-center justify-center text-white annualSubBtn">
                <a  class="annualSubBtn tems-center font-bold text-white text-[24px] md:text-[24px] pb-[3px] mt-[17px] transition ease-in-out bg-green hover:bg-blue w-[265px] h-[55px] flex items-center justify-center rounded-full">

                    اشترك الآن
                </a>
            </div>
        </div>
        <div id="{{ Auth::check() ? 'monthlySubBtn' : 'monthlySubBtnOff' }}" data-monthlyFees="{{ $subscription_monthly }}"
             class="monthlySubBtn text-center cursor-pointer flex flex-col justify-between h-[420px] lg:h-[483px] min-w-[250px] lg:min-w-[300px] xl:min-w-[550px] p-[32px] bg-white md:ltr:rounded-br-[20px] md:ltr:rounded-tr-[20px] md:ltr:rounded-bl-0 md:ltr:rounded-tl-0 md:rtl:rounded-bl-[20px] md:rtl:rounded-tl-[20px] md:rtl:rounded-br-0 md:rtl:rounded-tr-0 ltr:rounded-br-[20px] ltr:rounded-bl-[20px] ltr:rounded-tr-0 ltr:rounded-tl-0 rtl:rounded-br-[20px] rtl:rounded-bl-[20px] rtl:rounded-tr-0 rtl:rounded-tl-0"
             onclick=" {{ Auth::check() ? 'subscriptionModal.showModal()' : 'signinModal.showModal()' }}">

            <h4 class="monthlySubBtn text-green pb-[32px] text-[40px] font-bold border-b border-green uppercase">
                {{ trans('b2b.MONTHLY') }}
            </h4>
            <div class="text-green monthlySubBtn">
                <h2 class="monthlySubBtn text-[80px] lg:text-[120px] font-bold leading-[1]">
                    {{ $subscription_monthly }}
                </h2>
                <h3 class="monthlySubBtn text-[24px] lg:text-[32px] monthlySubBtn uppercase">
                    {{ getCurrency() }}/{{ trans('website.Mo') }}
                </h3>
            </div>
            <div class="monthlySubBtn text-babydark flex items-center justify-center pt-[32px] text-[28px] font-light border-t border-green uppercase w-full">
                {{ trans('website.Billed Monthly') }}
            </div>
            <div class="flex items-center justify-center text-white monthlySubBtn">
                <a class="monthlySubBtn tems-center justify-center font-bold text-white text-[24px] md:text-[24px] pb-[3px] mt-[17px] transition ease-in-out bg-green hover:bg-blue w-[265px] h-[55px] flex items-center rounded-full">
                    {{ trans('b2b.Subscribe Now') }}
                </a>
            </div>
        </div>
    </div>
</section>
{{--    @endif--}}

<!-- Featured Courses Section -->
<section class="md:mt-[100px] mt-[50px] md:px-[90px] px-[30px] bg-white">
    <div class="flex flex-col items-center justify-center text-center">
        <h3 class="text-black text-[25px] lg:text-[40px] font-bold">
            {{ trans('website.Last Courses') }}
        </h3>
        <p class="text-babydark text-[18px] mt-[16px]">
            {{ trans('website.Featured Courses H1') }}
        </p>
    </div>
    <div class="mt-[64px] featured-courses-list">


        @foreach ($Last4 as $last)
            <a href="{{ url('courses/view/' . $last->slug) }}" class="block group">
                <div
                        class="feat-card flex transition ease-in-out group-hover:bg-green md:flex-row border-coolgrey border-solid border-b flex-col items-center justify-between gap-[20px] w-full group-hover:rounded-[10px] p-[14px]">
                    <img class="rounded-[10px] md:w-[200px] md:h-[200px] w-full h-full object-cover"
                         src="{{ large1($last->image) }}" alt="hero-image" />
                    <div class="w-full mx-[20px]">
                        <h3 class="text-green group-hover:text-white text-[24px] font-bold">
                            {{ mb_substr(strip_tags($last['title_lang']), 0, 200) }}
                        </h3>
                        <p class="text-babydark group-hover:text-white mt-[10px] h-[63px] !overflow-hidden text-[14px]">
{{--                            {{ mb_substr(strip_tags($last['description_lang']), 0, 400) }}--}}
                            {{ \Illuminate\Support\Str::words(strip_tags($last['description_lang']), 40, '...') }}

                        </p>
                        <div class="inline-flex items-center  mt-[10px] justify-cente gap-2">
                                <span class="text-green group-hover:text-white text-[14px]">
                                    +{{ $last->visits >= 1000 && $last->visits < 1000000 ? number_format($last->visits / 1000, 0) . 'K' : ($last->visits >= 1000000 ? number_format($last->visits / 1000000, 0) . 'M' : $last->visits) }}
                                </span>
                            <span
                                    class="text-[14px] group-hover:text-white text-green">{{ trans('website.Views') }}</span>
                        </div>
                    </div>
                    <svg id="linkArrow" class="hidden md:flex" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                         version="1.1" viewBox="0 0 52 52">
                        <path
                                d="M42,0H10C4.5,0,0,4.5,0,10v32c0,5.5,4.5,10,10,10h32c5.5,0,10-4.5,10-10V10c0-5.5-4.5-10-10-10ZM35.8,33.7c0,1.1-.9,2-2,2s-2-.9-2-2v-10.9l-12.3,12.3c-.8.8-2,.8-2.8,0s-.8-2,0-2.8l12.3-12.3h-10.9c-1.1,0-2-.9-2-2s.9-2,2-2h15.7s0,0,0,0c.2,0,.5,0,.7.1h0c.2,0,.5.2.7.4.2.2.3.4.4.6h0c0,.2.2.5.2.8v15.7Z" />
                    </svg>
                </div>
            </a>
        @endforeach



        <div class="flex justify-center">
            <a href="{{ url('allcourses/category') }}"
               class="text-white pb-[3px] mt-[50px] transition ease-in-out bg-blue hover:bg-green w-[265px] h-[55px] flex items-center justify-center rounded-full">
                {{ trans('website.View All Courses') }}
            </a>
        </div>
    </div>
</section>

<!-- Top Courses Section -->
@isset($forYou)
    @if (count($forYou) > 0)
        <!-- Suggested Courses Section -->
        <section
                class="mt-[50px] md:mt-[100px] px-[30px] md:px-[90px] py-[60px] bg-coolgrey grid grid-cols-1 md:grid-cols-2 items-center">
            <div class="md:ltr:pr-[100px] ltr:pr-0 md:rtl:pl-[100px] rtl:pl-0">
                <h3 class="text-green text-[45px] lg:text-[80px] md:text-[60px] font-bold">
                    {{ trans('website.Suggest Courses') }}
                </h3>
                <h4 class="text-babydark text-[18px] lg:text-[32px] md:text-[24px] mt-[15px]">
                    {{ trans('website.With the power of AI. Discover, the powerful suggested courses') }}
                </h4>
                {{-- <p class="text-babydark md:text-[14px] text-[12px] mt-[15px]"> --}}
                {{-- {{trans('website.Suggest Courses Description')}} --}}
                {{-- </p> --}}
            </div>
            <div class="suggest-courses-slider mt-[50px] md:mt-0 md:ltr:pl-[50px] md:rtl:pr-[50px] ltr:pl-0 rtl:pr-0">
                <div class="swiper">
                    <div class="swiper-wrapper">


                        @foreach ($forYou as $you)


                            <div class="swiper-slide w-full md:w-[480px] flex-shrink-0">
                                <a href="{{ url('courses/view/' . $you->slug) }}" class="block  rounded-[12px] overflow-hidden h-full">
                                    <div class="flex md:flex-row flex-col items-center gap-[20px] w-full h-full">
                                        <img class="rounded-[10px] md:w-[200px] md:h-[200px] w-full h-[200px] object-cover"
                                             src="{{ large1($you->image) }}" alt="hero-image" />
                                        <div class="w-full flex flex-col justify-between h-full">
                                            <h3 class="text-black text-[20px] font-semibold">
                                                {{ mb_substr(strip_tags($you['title_lang']), 0, 50) }}
                                            </h3>
                                            <p class="text-babydark mt-[10px] text-[14px] h-[84px] overflow-hidden">
                                                {{--{{ mb_substr(strip_tags($you['description_lang']), 0, 200) }}--}}
                                                {{ \Illuminate\Support\Str::words(strip_tags($you['description_lang']), 30, '...') }}

                                            </p>
                                            <div class="mt-[10px]">
                                                <div class="inline-flex items-center gap-2 bg-green h-[35px] rounded-full px-[15px] w-max">
                                                    <span class="text-white text-[14px]">
                                                      +{{ $you->visits >= 1000 && $you->visits < 1000000
                                                        ? number_format($you->visits / 1000, 0) . 'K'
                                                        : ($you->visits >= 1000000
                                                          ? number_format($you->visits / 1000000, 0) . 'M'
                                                          : $you->visits) }}
                                                    </span>
                                                    <span class="text-[14px] text-white">
                                                      {{ trans('website.Views') }}
                                                    </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    </div>
                    <div class="block md:hidden swiper-pagination"></div>
                </div>
                <div class="items-center justify-center hidden gap-4 rotate-90 md:flex top-courses-slider__buttons">
                    <div class="button-prev">
                        <img src="{{ asset('subscription-new/src') }}/images/arrow-left.svg" alt="arrow-left" />
                    </div>
                    <div class="button-next">
                        <img src="{{ asset('subscription-new/src') }}/images/arrow-right.svg" alt="arrow-right" />
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif

<!-- Instructors Section -->
    @if ($Partners && count($Partners) > 0)
        <section class="instructors-section bg-white md:mt-[100px] mt-[50px] md:px-[90px] px-[30px] pb-[50px]">
            <div class="flex flex-col items-center justify-center text-center">
                <h3 class="text-black text-[25px] lg:text-[40px] font-bold">
                    {{ trans('website.Partners') }}
                </h3>
                <p class="text-babydark text-[18px] mt-[14px]">
                    {{ trans('website.Partners p') }}
                </p>
            </div>

            <div class="partners-section__image relative mt-[60px]">
                <div class="swiper md:h-[450px] h-[400px]">
                    <div class="swiper-wrapper md:pb-0 pb-[120px]">

                        @foreach ($Partners as $instructor)
                            <div class="swiper-slide">
{{--                                <a href="/instructors/view/{{ $instructor->slug }}">--}}
                                    <div class="flex flex-col w-full h-[300px]">
                                        <img src="{{ large1($instructor->logo) }}"
                                            alt="{{ $instructor->title_lang }}" style="max-height:300px;    object-fit: contain;"
                                            class="object-cover w-full h-full rounded-[10px]" />
{{--                                        <h3 class="text-black text-[20px] lg:text-[25px] font-bold mt-[15px]"--}}
{{--                                            style="min-height: 15%">--}}
{{--                                            {{ $instructor->title_lang }}--}}
{{--                                        </h3>--}}
{{--                                        <p class="text-babydark lg:text-[18px] text-[20px]" style="min-height: 30%">--}}
{{--                                            {{ strlen(strip_tags($instructor['title_lang'])) > 70 ? mb_substr(strip_tags($instructor['title_lang']), 0, 70) . '...' : strip_tags($instructor['title_lang']) }}--}}

{{--                                        </p>--}}
                                    </div>
{{--                                </a>--}}
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination !bottom-0"></div>
                </div>
            </div>
        </section>

    @endif
<!-- Newsletter Section -->
<section class="md:mt-[100px] mt-[50px] md:px-[90px] px-[30px] text-center h-[380px]">
    <div class="bg-blue rounded-[28px] h-full w-full flex items-center justify-center">
        <div class="md:w-[70%] w-[100%] px-[10px]">
            <h2 class="md:text-[40px] text-[28px] font-bold text-white">
                {{ trans('website.Our Newsletter') }}
            </h2>
            <p class="mb-6 md:text-[32px] text-[20px] text-white">
                {{ trans('website.Our Newsletter p') }}
            </p>
            <form class="flex justify-center" action="{{ concatenateLangToUrl('newsletter/item') }}"  method="post" >
            {{ csrf_field() }}
                <input type="email" name="email" placeholder="{{ trans('website.Enter Your Email') }}"
                       class="ltr:pl-[35px] rtl:pr-[35px] py-[20px] text-black placeholder-white bg-white/50 focus:outline-none w-[80%] md:w-[90%] ltr:rounded-l-full rtl:rounded-r-full" />
                <button class="px-4 py-[20px] text-white bg-white/50 ltr:rounded-r-full rtl:rounded-l-full">
                    <img src="{{ asset('subscription-new/src') }}/images/send.svg" alt="submit-button" />
                </button>
            </form>
        </div>
    </div>
</section>


<a href="https://wa.me/966569120330" style="    position: fixed;
    left: 0;
    margin-left: 24px;
    width: 60px;
    height: 60px;
    bottom: 0;
    margin-bottom: 16px;
    /*background-color: #18B289;*/
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    /*box-shadow: 2px 2px 3px #999;*/
    z-index: 2;" target="_blank" class="whatsapp_btn float">
    <i class="fab fa-whatsapp my-float" aria-hidden="true"></i>
    <svg style="
         margin-top: 10px;
         font-size: 40px;
    " xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 256 258">
        <defs>
            <linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%">
                <stop offset="0%" stop-color="#1faf38" />
                <stop offset="100%" stop-color="#60d669" />
            </linearGradient>
            <linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%">
                <stop offset="0%" stop-color="#f9f9f9" />
                <stop offset="100%" stop-color="#fff" />
            </linearGradient>
        </defs>
        <path class="whatsapp_btn" fill="url(#logosWhatsappIcon0)"
              d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004" />
        <path fill="url(#logosWhatsappIcon1)"
              d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z" />
        <path fill="#fff"
              d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64" />
    </svg>
</a>

<input type='hidden' id='user_id' value='{{ auth()->check() ? Auth::user()->id : '' }}'>
<input type='hidden' id='path' value='{{ url('/') }}'>


<!-- Footer Section -->
<footer class="mt-[40px] text-center md:px-[90px] px-[30px]">
    <!-- Footer Links -->
    <div class="flex justify-center gap-4 mt-6 text-gray-800">
        <a href="{{ url('allcourses/category') }}" class="hover:underline text-[16px] md:text-[18px]">
            {{ trans('website.Specialities') }}
        </a>
        {{--            <a href="{{ url('page/about') }}" class="hover:underline text-[16px] md:text-[18px]">--}}
        {{--                {{ trans('website.About Us') }}--}}
        {{--            </a>--}}
        <a href="{{ url('contact') }}" class="hover:underline text-[16px] md:text-[18px]">
            {{ trans('website.Contact') }}
        </a>
        <a href="{{ url('faq') }}" class="hover:underline text-[16px] md:text-[18px]">
            {{ trans('faq.faq') }}
        </a>
    </div>

    {{--        <div class="flex flex-col items-center justify-center w-full gap-4 mt-6 text-gray-800 fw-400">--}}

    {{--            <p class="text-babydark mt-[14px] text-[18px]">--}}
    {{--                {{ trans('website.Certified by') }}--}}
    {{--            </p>--}}

    {{--            <img src="{{ asset('subscription-new/src') }}/images/nec.png" alt="Payments" class="w-[265px] h-full " />--}}
    {{--        </div>--}}

    <!-- Social Media Icons -->
    <div class="flex justify-center gap-6 my-[50px]">
        {{--            <a href="{{ getSetting('facebook') }}">--}}
        {{--                <img src="{{ asset('subscription-new/src') }}/images/facebook-brands-solid.svg" alt="Facebook"--}}
        {{--                    class="w-6 h-6" />--}}
        {{--            </a>--}}
        <a href="https://www.linkedin.com/company/futureworkksa/posts/?feedView=all" target="_blank">
            <img src="{{ asset('subscription-new/src') }}/images/linked.png" alt="Instagram"
                 class="w-6 h-6" />
        </a>
        <a href="https://www.youtube.com/channel/UCYGhbTVNiAbgQ--d5-yo8bQ" target="_blank">
            <img src="{{ asset('subscription-new/src') }}/images/square-youtube-brands-solid.svg" alt="YouTube"
                 class="w-6 h-6" />
        </a>
        <a href="https://x.com/FutureWork_ksa" target="_blank"><img
                    src="{{ asset('subscription-new/src') }}/images/square-x-twitter-brands-solid.svg" alt="Twitter"
                    class="w-6 h-6" /></a>
    </div>

    <div
            class="flex flex-col items-center md:pb-0 pb-[32px] justify-between border-t md:flex-row border-grey md:pt-0 pt-[32px]">
        <!-- Copyright Notice -->
        <p class="md:text-[20px] text-[12px] text-black">
            حقوق الطبع والنشر © 2025 Future Work.
            <br>
            مطور محتوى
            <img src="https://igtsservice.com/website/images/logonew.webp" alt="igts"
                 class="w-6 h-6"  style="width: 50px; height: 30px; display: inline;" />

{{--            IGTS--}}
            </p>

            <!-- Payment Methods -->
            <div class="flex justify-center gap-4 md:py-0 py-[20px]" style="max-height: 100px;">
                                <div class="md:text-[20px] w-[300px]">
                                    <p>
                                        المحتوى معتمد من المركز الوطني للتعليم الإلكتروني و FUTURE X
                                    </p>
                                </div>
            </div>
            <!-- Footer Bottom Links -->
            <div class="flex justify-center gap-4 text-sm text-black md:text-[20px]">
                <a href="{{ url('page/termsOfUse') }}" class="hover:underline md:text-[16px] text-[12px]">
                    {{ trans('website.Terms and Conditions') }}
                </a>
    {{--            <span>-</span>--}}
            <a href="{{ url('page/privacyPolicy') }}" class="hover:underline md:text-[16px] text-[12px]">
                {{ trans('website.Privacy Policy') }}
            </a>
        </div>
    </div>
</footer>

<dialog id="signinModal" class="modal">
    <div class="modal-box">
        <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
            <h2 class="text-black text-[25px] font-bold">{{ trans('website.Sign in') }}</h2>
            {{-- <p class="text-babydark mt-[10px] text-[18px]"> --}}
            {{-- Try diffrent ways to signin --}}
            {{-- </p> --}}
        </div>

        {{-- <div class="flex flex-row justify-center mt-[50px] gap-4"> --}}
        {{-- <a href="" {{url('social/redirect/google')}}" class="btn"> --}}
        {{-- <img --}} {{-- src="{{ asset('subscription-new/src') }}/images/google-brands-solid.svg" --}}
        {{-- alt="google-icon" --}} {{-- class="w-6 h-6 mr-[10px]" --}} {{-- /> --}}
        {{-- with Google --}}
        {{-- </a> --}}
        {{-- <a href="{{url('social/redirect/facebook')}}" class="btn"> --}}
        {{-- <img --}} {{-- src="{{ asset('subscription-new/src') }}/images/facebook-brands-solid.svg" --}}
        {{-- alt="facebook-icon" --}} {{-- class="w-6 h-6 mr-[10px]" --}} {{-- /> --}}
        {{-- with Facebook --}}
        {{-- </a> --}}
        {{-- </div> --}}

        <div class="modal-action">

            <div class="flex flex-col w-full gap-4">
                <form class="flex flex-col w-full gap-4" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div>
                        @if ($errors->has('email'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('email') }}
                            </div>
                        @endif

                        @if ($errors->has('password'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <label class="flex items-center gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                             class="w-4 h-4 opacity-70">
                            <path
                                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path
                                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input id="email-login" type="email" name="email" value="{{ old('email') }}" class='grow'
                               label='Username' placeholder='{{ trans('account.email') }}'>

                    </label>

                    <label class="flex items-center gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                             class="w-4 h-4 opacity-70">
                            <path fill-rule="evenodd"
                                  d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                  clip-rule="evenodd" />
                        </svg>
                        <input id="password-login" type="password" autocomplete class="grow" name="password"
                               value="{{ old('password') }}" label='Username'
                               placeholder='{{ trans('account.password') }}'>

                    </label>
                    <button class="text-white hover:text-black btn bg-green signin_btn">
                        {{ trans('website.Sign in') }}
                    </button>


                </form>

                <form method="dialog" class="flex flex-col w-full gap-4">
                    <button class="btn bg-green">{{ trans('website.Cancel') }}</button>
                    <div>
                        <a href="{{ url('register') }}" class="link">{{ trans('home.signup') }}</a> -
                        <a href="{{ url('/password/reset') }}"
                           class="link">{{ trans('website.Forgot your') }}{{ '  ' . trans('website.password?') }}
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</dialog>

<dialog id="createAccountModal" class="modal">
    <div class="modal-box" style="max-width: 45rem;">
        <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
            <h2 class="text-black text-[25px] font-bold">{{ trans('home.signup') }}</h2>
            <p class="text-babydark mt-[10px] text-[18px]">
                {{-- {{trans('website.Try diffrent ways to create your account')}} --}}
            </p>
        </div>

        {{-- <div class="flex flex-row justify-center mt-[50px] gap-4"> --}}
        {{-- <a href="{{url('social/redirect/google')}}" class="btn"> --}}
        {{-- <img --}} {{-- src="{{ asset('subscription-new/src') }}/images/google-brands-solid.svg" --}}
        {{-- alt="google-icon" --}} {{-- class="w-6 h-6 mr-[10px]" --}} {{-- /> --}}
        {{-- With Google --}}
        {{-- </a> --}}
        {{-- <a href="{{url('social/redirect/facebook')}}" class="btn"> --}}
        {{-- <img --}} {{-- src="{{ asset('subscription-new/src') }}/images/facebook-brands-solid.svg" --}}
        {{-- alt="facebook-icon" --}} {{-- class="w-6 h-6 mr-[10px]" --}} {{-- /> --}}
        {{-- With Facebook --}}
        {{-- </a> --}}
        {{-- </div> --}}

        <div class="modal-action">

            @php
                use App\Application\Model\Categories;

                $userObject = Session::get('socialUserRegister');

            @endphp

            <div class="flex flex-col w-full gap-4">
                <form class="flex flex-col !mb-0 w-full gap-4" id="register_form" role="form" method="POST"
                      action="{{ route('register') }}">
                    {{ csrf_field() }}



                    <div class="">
                        @if ($errors->has('name'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('name') }}
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('email') }}
                            </div>
                        @endif

                        @if ($errors->has('country_id'))
                            <div class="mb-2 alert alert-danger" role="alert">
                                {{ $errors->first('country_id') }}
                            </div>
                        @endif

                        @if ($errors->has('mobile'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('mobile') }}
                            </div>
                        @endif

                        @if ($errors->has('nid'))
                            <div class="mb-2 alert alert-danger" role="alert">
                                {{ $errors->first('nid') }}
                            </div>
                        @endif

                        @if ($errors->has('password'))
                            <div class="mb-2 alert alert-danger" role="alert">{{ $errors->first('password') }}
                            </div>
                        @endif

                        @if ($errors->has('password_confirmation'))
                            <div class="mb-2 alert alert-danger" role="alert">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif

                        @if ($errors->has('g-recaptcha-response'))
                            <div class="mb-2 alert alert-danger" role="alert">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                        @endif

                    </div>

                    <div class="flex flex-row gap-2">
                        <label class="flex items-center w-full gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="w-4 h-4 opacity-70">
                                <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input id="name" type="text" class="grow" name="name"
                                   value="{{ isset($userObject->name) ? $userObject->name : old('name') }}"
                                   label='Username' placeholder='{{ trans('account.Full Name') }}' required>

                        </label>

                        <label class="flex items-center w-full gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="w-4 h-4 opacity-70">
                                <path
                                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path
                                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>
                            <input id="email-register" type="email" class="grow" {{ isset($userObject->email) ? 'readonly' : '' }} name="email"
                                   value="{{ isset($userObject->email) ? $userObject->email : old('email') }}"
                                   label='Username' placeholder='{{ trans('account.email') }}' required>

                        </label>
                    </div>

                    <label class="flex items-center w-full gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.05-.24c1.12.37 2.33.57 3.54.57a1 1 0 0 1 1 1v3.5a1 1 0 0 1-1 1C12.42 21 3 11.58 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.21.2 2.42.57 3.54a1 1 0 0 1-.25 1.05l-2.2 2.2z"/>
                        </svg>

                        <input class="grow" id="mobile" type="number" name="mobile" value="{{ old('mobile') }}"
                               label='Username' placeholder='{{ trans('account.mobile') }}' required>
                        <span id="mobile-code" class="p-2 m-2 border">+966</span>
                    </label>


{{--                    <label class="flex items-center w-full gap-2 input input-bordered">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" viewBox="0 0 24 24" fill="currentColor">--}}
{{--                            <path d="M3 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3zm0 2h18v2H3V6zm0 4h9v2H3v-2zm0 4h9v2H3v-2zm11 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0-4a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>--}}
{{--                        </svg>--}}


{{--                        <input class="grow" id="nid" type="number" name="nid" value="{{ old('nid') }}"--}}
{{--                               label='nid' placeholder='{{ trans('account.nid') }}' required>--}}
{{--                    </label>--}}

                    <div class="flex flex-row gap-2">
                        <label class="flex items-center w-full gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                      d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                      clip-rule="evenodd" />
                            </svg>
                            <input id="password-register" autocomplete="" type="password" class="w-[50%]"
                                   name="password"
                                   value="{{ isset($userObject->password) ? $userObject->password : old('password') }}"
                                   label='Username' placeholder='{{ trans('account.password') }}' required>

                        </label>
                        <label class="flex items-center w-full gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                      d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                      clip-rule="evenodd" />
                            </svg>
                            <input id="password_confirmation" autocomplete="" type="password" class="w-[50%]"
                                   name="password_confirmation"
                                   value="{{ isset($userObject->password) ? $userObject->password : old('password') }}"
                                   label='Username' placeholder='{{ trans('account.password_confirmation') }}'
                                   required>

                        </label>
                    </div>

                    <input type="hidden" name="facebook_identifier" id="facebook_identifier"
                           value="{{ isset($userObject->facebook_identifier) ? $userObject->facebook_identifier : '' }}">
                    <input type="hidden" name="provider" id="provider"
                           value="{{ isset($userObject->provider) ? $userObject->provider : '' }}">
                    <input type="hidden" name="token" id="token"
                           value="{{ isset($userObject->token) ? $userObject->token : '' }}">
                    <input type="hidden" name="image" id="image"
                           value="{{ isset($userObject->image) ? $userObject->image : '' }}">


                    <button class="text-white hover:text-black btn bg-green signup_btn">
                        {{ trans('home.signup') }}
                    </button>

                    {{-- <button class="btn">Cancel</button> --}}

                </form>
                <form method="dialog" class="flex flex-col w-full gap-4">
                    <button class="btn bg-green">{{ trans('website.Cancel') }}</button>

                    <div>
                        <p class="text-babydark text-[14px]">
                            {{ trans('account.By completing your registeration, you agree to IGTS') }}
                            <a class="text-green" href="{{ url('/page/termsOfUse') }}">
                                {{ trans('account.Terms and Conditions') }}
                            </a>
                            &
                            <a class="text-green" href="{{ url('/page/privacyPolicy') }}">
                                {{ trans('account.Privacy Policy') }}
                            </a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</dialog>
@php
    $data['test'] = null;
@endphp



<dialog id="subscriptionModal" class="modal">
    <div class="modal-box">

        <div class="plan-card" id="annual-plan-card">
            <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
                <h2 class="text-black text-[25px] font-bold">{{ trans('website.Checkout') }}</h2>
                <p class="text-babydark mt-[10px] text-[18px]">
                    {{ trans('b2b.ANNUAL') }}
                </p>
            </div>
            <div class="flex flex-col w-full gap-4 modal-action">
                <img alt="" style="height: 150px" src="{{ asset('website/subscriptions') }}/image/annual-icon.svg">
                <div class="spce"></div>
                <h3 class="flex items-center fw-400">
                    <span class="rate">{{ $subscription_yearly_after }} </span>
                    <span class="meta fw-300">{{ getCurrency() }}/{{ trans('website.Year') }}</span>
                </h3>

                <div class="discount">
                    <div class="save-percent">
                        <del>{{ $subscription_yearly_before }}
                            <span>{{ getCurrency() }}/{{ trans('website.Year') }}</span>
                        </del>
                        {{-- {{trans('website.Billed Annually')}} --}}
                    </div>
                </div>

            </div>
        </div>

        <div class="plan-card" id="monthly-plan-card">
            <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
                <h2 class="text-black text-[25px] font-bold">{{ trans('website.Checkout') }}</h2>
                <p class="text-babydark mt-[10px] text-[18px]">
                    {{ trans('b2b.MONTHLY') }}
                </p>
            </div>

            <div class="flex flex-col w-full gap-4 modal-action">
                <img alt="" style="height: 150px" src="{{ asset('website/subscriptions') }}/image/monthly-icon.svg">
                <div class="spce"></div>
                <h3 class="flex items-center fw-400">
                    <span class="rate">{{ $subscription_monthly }} </span>
                    <span class="meta fw-300"> {{ getCurrency() }}/{{ trans('website.Mo') }}</span>
                </h3>

            </div>
        </div>


        <form id="promoForm" class="flex flex-col w-full gap-4" action="javascript:void(0);" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @php
                $promoCode = getCurrentPromoCode(null, \App\Application\Model\Promotionactive::TYPE_B2C);
            @endphp
            @if ($promoCode)
                @if ($promoCode['promotions'])
                    <div class="text-right">
                        <label> {{ trans('website.Coupon Applied, Click to remove') }} </label>
                        <br>
                        <a href="javascript:void(0);" id="removePromoBtn" class="add-to-cart">
                            <b>{{ $promoCode['promotions']['code'] }}</b> {{ trans('website.Applied Now') }}
                        </a>
                    </div>
                @else
                    <label class="flex items-center gap-2 input input-bordered">
                        <input required name="code" type="text" class="grow"
                               placeholder="{{ trans('website.Add Coupon Code') }}" />
                    </label>
                    <button id="addPromoBtn" class="text-white hover:text-black btn bg-green mb-[25px]">
                        {{ trans('website.Add Coupon') }}
                    </button>
                @endif
            @else
                <label class="flex items-center gap-2 input input-bordered">
                    <input required name="code" type="text" class="grow"
                           placeholder="{{ trans('website.Add Coupon Code') }}" />
                </label>
                <button id="addPromoBtn" class="text-white hover:text-black btn bg-green mb-[25px]">
                    {{ trans('website.Add Coupon') }}
                </button>
            @endif
        </form>


        <div id="promotionAlert"></div>
        <div id="PaymentsMethods"></div>
        <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
            <h2 class="text-black text-[25px] font-bold">{{ trans('website.Payment Method') }}</h2>
            <p class="text-babydark mt-[10px] text-[18px]">
                {{ trans('website.Secure Checkout') }}
            </p>
        </div>

        {{--        <div class="flex flex-row items-center hyperpay">--}}
        {{--            <a href="javascript: void(0)" onclick="hyperpay('{{ json_encode($data) }}')"--}}
        {{--               class="hyperpay bg-coolgrey hover:bg-[#f7f7f7] rounded-[10px] text-center w-full inline-block p-[10px]">--}}
        {{--                <img class="block m-auto hyperpay" src="{{asset('subscription-new')}}/src/images/payments2.png"--}}
        {{--                     width="200" height="200" />--}}
        {{--            </a>--}}
        {{--        </div>--}}


        <div id="loading-spinner" class="dot-spinner" style="display:none;">
            <span></span><span></span><span></span>
        </div>



        <div id="VisaDiv" style="display: none;">
            <iframe style="height: 585px; width:-webkit-fill-available;" name="iframe1" id="visaiframe"
                    webkitAllowFullScreen mozallowfullscreen allowfullscreen src="" title="0" byline="0" portrait="0"
                    width="640" height="360" frameborder="0" allow="autoplay" oncontextmenu="return false"></iframe>
        </div>

        {{-- //hyperpay Div --}}
        <div id="hyperpayDiv">
            <form lang="ar" action="{{url('payments/verify/hyperpay')}}" class='paymentWidgets' data-brands="VISA MASTER MADA"></form>
        </div>

        <script type="text/javascript">
            var wpwlOptions = {
                locale: "ar",
                paymentTarget: "_top",
            }
        </script>

        {{--            <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=CC574C0788637C98138C590EADC478E0.uat01-vm-tx02"></script>--}}
        <script type='text/javascript'>
            const subTotalAmount = parseFloat(24346);
            const shippingAmount = 0;
            const taxAmount = 0;
            const currency = "SAR";
            const applePayTotalLabel = "";

            function getAmount() {
                return ((subTotalAmount + shippingAmount + taxAmount)).toFixed(2);
            }
            function getLineItems() {
                return [{
                    label: 'Subtotal',
                    amount: (subTotalAmount).toFixed(2)
                }, {
                    label: 'Shipping',
                    amount: (shippingAmount).toFixed(2)
                }, {
                    label: 'Tax',
                    amount: (taxAmount).toFixed(2)
                }];
            }

            const wpwlOptions = {
                locale: "ar",
                applePay: {
                    displayName: "",
                    total: {
                        label: ""
                    },
                    paymentTarget:'_top',
                    merchantCapabilities: ['supports3DS'],
                    supportedNetworks: ['mada','masterCard', 'visa' ],
                    supportedCountries: ['SA'],
                }
            };
            wpwlOptions.createCheckout = function() {
                return $.post("{{url('payments/verify/hyperpay')}}")
                    .then(function(response) {
                        return response.checkoutId;
                    });
            };
        </script>



        <br>
        <form method="dialog" class="flex flex-col w-full gap-4">
            <button href="javascript: void(0)" onclick="changeMethod()" id="ChangePaymentsDiv"
                    class=" btn bg-green">{{ trans('website.Cancel') }}</button>
        </form>
    </div>
</dialog>



{{ Html::script('website/js/sweetalert.min.js') }}
@include('sweet::alert')
<script>
    (function (e, t, n) {
        var r = e.querySelectorAll("html")[0];
        r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
    })(document, window, 0);
</script>


<!-- Script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('subscription-new/src') }}/js/script.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>


<script src="{{ asset('website/subscriptions') }}/js/custom.js?v={{ $VERSION_NUMBER }}"></script>
<script>
    $(function () {
        // $('#country-register').selectize();
        $('#country-register').on('change', function () {
            if (this.value) {
                getCountryDataAjax(function (country) {
                    $('#mobile-container').show();
                    $('#mobile-code').text(country.country_phone_code + "+");
                }, this.value);
            }
        });


        function getCountryDataAjax(handleData, countryId) {
            $.ajax({
                url: "/site/country/" + countryId,
                type: 'get',
                success: function (data) {
                    handleData(data.country);
                },
                error: function () {
                    alert("error!!!!");
                }
            });
        }
    });
</script>


<script>
    $(document).ready(function () {
        $('#promoForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ concatenateLangToUrl('site/insertCouponAjax') }}",
                type: 'GET',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response
                            .text); // Replace with your desired success message display logic
                        location.reload(); // Optionally reload the page to reflect changes
                    } else {
                        alert(response
                            .text); // Replace with your desired error message display logic
                    }
                },
                error: function () {
                    alert(
                        'An error occurred. Please try again.'); // Replace with your desired error handling
                }
            });
        });

        $('#removePromoBtn').on('click', function () {
            $.ajax({
                url: "{{ url('/removePromoAjax') }}",
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        alert(response
                            .text); // Replace with your desired success message display logic
                        location.reload(); // Optionally reload the page to reflect changes
                    } else {
                        alert(response
                            .text); // Replace with your desired error message display logic
                    }
                },
                error: function () {
                    alert(
                        'An error occurred. Please try again.'); // Replace with your desired error handling
                }
            });
        });
    });
</script>

@if (session('form_error') === 'register')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('createAccountModal');
            modal?.showModal?.() ?? $('#createAccountModal').modal('show');
        });
    </script>
@endif

@if (session('form_error') === 'login')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('signinModal');
            modal?.showModal?.() ?? $('#signinModal').modal('show');
        });
    </script>
@endif


@if ($errors->has('name') || $errors->has('mobile') || $errors->has('country_id') || $errors->has('nid') || $errors->has('password_confirmation') || $errors->has('g-recaptcha-response'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('createAccountModal');

            if (modal && typeof modal.showModal === 'function') {
                modal.showModal();
            } else {
                $('#createAccountModal').modal('show');
            }
        });
    </script>
@endif



<script>
    document.addEventListener('click', function (event) {
        // نحصل على جميع عناصر <details>
        document.querySelectorAll('details').forEach(function (dropdown) {
            // إذا كان العنصر مفتوحًا وتم الضغط خارج هذا العنصر، نغلقه
            if (dropdown.open && !dropdown.contains(event.target)) {
                dropdown.removeAttribute('open');
            }
        });
    });
</script>


<script>
    document.querySelectorAll('.main-menu-toggle > summary').forEach(summary => {
        summary.addEventListener('click', function () {
            const currentMainDetails = this.parentElement;

            // أغلق كل القوائم الرئيسية المفتوحة الأخرى
            document.querySelectorAll('.main-menu-toggle').forEach(other => {
                if (other !== currentMainDetails && other.hasAttribute('open')) {
                    other.removeAttribute('open');
                }
            });
        });
    });

    // ثم نضيف سلوك خاص للقوائم الداخلية داخل كل قائمة رئيسية
    document.querySelectorAll('.main-menu-toggle').forEach(mainDetails => {
        const innerDetails = mainDetails.querySelectorAll('details');

        innerDetails.forEach(detail => {
            const summary = detail.querySelector('summary');
            summary.addEventListener('click', function () {
                innerDetails.forEach(otherDetail => {
                    if (otherDetail !== detail && otherDetail.hasAttribute('open')) {
                        otherDetail.removeAttribute('open');
                    }
                });
            });
        });
    });


</script>

</body>

</html>