<html lang="{{ config('app.locale') }}" dir="{{getDir()}}" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iGTS - Business</title>

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="IGTS Business">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('business/newBusiness') }}/src/images/logo.png">


    <link rel="stylesheet" href="{{ asset('business/newBusiness') }}/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
          rel="stylesheet" />
    <link rel="preload"
          href="{{ asset('business/newBusiness') }}/fonts/URWGeometricArabic-ExtraBold.woff2"
          as="font"
          type="font/woff2"
          crossorigin />
    <link rel="preload"
          href="{{ asset('business/newBusiness') }}/fonts/URWGeometricArabic-Regular.woff2"
          as="font"
          type="font/woff2"
          crossorigin
    />

    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    {{ Html::style('css/sweetalert.css') }}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @stack('css')
</head>
<body class="h-full {{getDir()}} main-theme">
<!-- Header -->
<header class="flex relative border-b border-primary/25 items-center justify-between px-[30px] md:px-[80px] py-[40px] !bg-transparent">
    <a href="{{url('business/')}}" class="block relative z-[2]">
        <img src="{{ $logo ?? asset('business/newBusiness/src/images/logo.png') }}" alt="Business" class="md:w-[115px] md:h-[56px] w-[110px]"  />
    </a>

    <div class="text-[16px] md:flex items-center hidden relative z-[2] gap-4">
        <div class="items-center hidden space-x-8 md:flex relative z-[2]">
            <ul class="menu menu-horizontal rounded-box">
                <li>
                    <a href="{{url('business')}}" class="text-black text-[16px] pb-[0.7rem] transition ease-in-out hover:text-primary"
                    >{{trans('business.Home')}}</a
                    >
                </li>
                <li>
                    <details>
                        <summary class="gap-4 text-black text-[16px] pb-[0.7rem] transition ease-in-out hover:text-primary"  >
                            {{trans('business.Our Services')}}
                        </summary>
                        <ul class="rounded-[10px] min-w-[300px] grid grid-cols-1">
                            <li>
                                <a
                                        href="{{url('business/subscriptions-service')}}"
                                        class="transition text-[16px] ease-in-out rounded-md hover:bg-primary hover:text-white"
                                >{{trans('business.Subscriptions')}}</a
                                >
                            </li>
                            <li>
                                <a
                                        href="{{url('business/offline-training')}}"
                                        class="transition text-[16px] ease-in-out rounded-md hover:bg-primary hover:text-white"
                                >{{trans('business.Offline training')}}</a
                                >
                            </li>
                            <li>
                                <a
                                        href="{{url('business/professional-certificates')}}"
                                        class="transition text-[16px] ease-in-out rounded-md hover:bg-primary hover:text-white"
                                >{{trans('business.Professional Certificates')}}</a
                                >
                            </li>
                            <li>
                                <a
                                        href="{{url('business/digital-transformation')}}"
                                        class="transition text-[16px] ease-in-out rounded-md hover:bg-primary hover:text-white"
                                >{{trans('business.Digital transformation')}}</a
                                >
                            </li>
                        </ul>
                    </details>
                </li>
                <li>
                    <a
                            href="{{url('business/contact-us')}}"
                            class="text-black text-[16px] pb-[0.7rem] transition ease-in-out hover:text-primary"
                    >{{trans('business.Contact Us')}}</a
                    >
                </li>
            </ul>
        </div>
        <a href="{{url('business/offer-price')}}"
           class="h-[42px] leading-[19px] px-4 py-2 text-white rounded-full bg-primary transition ease-in-out hover:bg-secondary">
            {{trans('business.Offer price')}}
        </a>
        <a href="{{LaravelLocalization::getLocalizedURL((config('app.locale') == 'en') ? 'ar':'en') }}"
           class="leading-[19px] font-bold hover:text-secondary pb-[10px] w-[45px] h-[45px] transition ease-in-out hover:bg-white flex
                items-center justify-center border rounded-full border-grey hover:border-secondary text-grey">
            {{trans('website.other lang')}}
        </a>
    </div>

    <!-- Mobile Menu -->
    <div class="!flex hamburger md:!hidden">
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="flex flex-col items-center justify-between transition ease-in-out mobile-menu" >
            <ul class="transition ease-in-out menu menu-vertical w-full px-[30px] gap-4 mt-[150px]" >
                <li class="text-white text-[25px] font-light">
                    <a href="{{url('business')}}">{{trans('business.Home')}}</a>
                </li>
                <li>
                    <details>
                        <summary class="transition ease-in-out text-white font-light text-[25px]" >
                            {{trans('business.Our Services')}}
                        </summary>
                        <ul class="transition ease-in-out rounded-[10px] w-[300px] grid grid-cols-1" >
                            <li class="transition ease-in-out text-[18px] font-light text-white"  >
                                <a href="{{url('business/subscriptions-service')}}">{{trans('business.Subscriptions')}}</a>
                            </li>
                            <li
                                    class="transition ease-in-out text-[18px] font-light text-white"
                            >
                                <a href="{{url('business/digital-transformation')}}"> {{trans('business.Offline training')}}</a>
                            </li>
                            <li
                                    class="transition ease-in-out text-[18px] font-light text-white"
                            >
                                <a href="{{url('business/offline-training')}}"> {{trans('business.Professional Certificates')}}</a>
                            </li>
                            <li
                                    class="transition ease-in-out text-[18px] font-light text-white"
                            >
                                <a href="{{url('business/professional-certificates')}}"> {{trans('business.Digital transformation')}}</a>
                            </li>
                        </ul>
                    </details>
                </li>
                <li class="text-white text-[25px] font-light">
                    <a href="{{url('business/contact-us')}}">{{trans('business.Contact Us')}}</a>
                </li>
            </ul>

            <div class="flex items-center justify-center w-full gap-4 py-[20px] border-t border-grey/25 mt-[60px]">
                <a  href="{{url('business/offer-price')}}"
                        class="h-[42px] leading-[19px] px-4 py-2 text-white rounded-full bg-primary transition ease-in-out hover:bg-softGrey hover:text-primary">  {{trans('business.Offer price')}}</a>
                <a href="{{LaravelLocalization::getLocalizedURL((config('app.locale') == 'en') ? 'ar':'en') }}"
                        class="leading-[19px] font-bold hover:text-primary pb-[10px] w-[45px] h-[45px] transition ease-in-out hover:bg-white flex items-center justify-center border rounded-full border-white text-white">{{trans('website.other lang')}}
                </a>
            </div>
        </nav>
    </div>
</header>




@yield('content')


<!-- Partners Section -->
<section class="our-partners-section relative py-[theme('spacing.90')]">
    <div class="container mx-auto">
        <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
            <strong> {{trans('business.Discover')}}</strong>  {{trans('business.Our success partners')}}
        </h2>

        <div class="relative partners-section__image">
            <div class="swiper">
                <div class="swiper-wrapper pb-[50px]">

                    @foreach ($Partners as $partner)
                        <div class="swiper-slide">
                            <div class="flex p-[50px] items-center justify-center bg-white rounded-xl h-[200px] w-full border border-grey">
                                <img src="{{large1($partner->logo)}}"
                                     alt="{{$partner->title_lang}}"
                                 class="h-[145px] w-[265px]"
{{--                                     class="w-full h-full"--}}
                                />
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>


<!-- Call to Action Section -->
<section class="relative py-[theme('spacing.90')]">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between md:p-[57px] p-[30px] bg-primary rounded-xl">
            <p class="text-[14px] text-white md:w-[50%] w-[90%] md:text-right text-center mb-[25px] md:mb-0">
                {{trans('business.Discover our latest price offers Text')}}
            </p>
            <a  href="{{url('business/offer-price')}}" class="h-[42px] inline-block text-center w-[280px] leading-[19px] px-4 py-2 text-bodyColor rounded-full bg-white transition ease-in-out hover:bg-secondary hover:text-white">
                {{trans('business.Discover our latest price offers')}}
            </a>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-secondary pt-[60px]">
    <div class="footer-container md:px-[80px] px-[30px]">
        <div class="flex flex-col items-center justify-between md:flex-row">
            <div class="grid w-full grid-cols-3 gap-4 mb-[60px]">
                <div class="flex flex-col">
                    <h3
                            class="md:text-[24px] font-bold text-[18px] mb-[18px] text-white"
                    >
                        {{trans('business.Our Services')}}
                    </h3>
                    <ul class="grid grid-cols-2">
                        <li
                                class="md:text-[16px] text-[12px] text-white hover:underline"
                        >
                            <a href="#">{{trans('business.Subscriptions')}}</a>
                        </li>
                        <li
                                class="md:text-[16px] text-[12px] text-white hover:underline"
                        >
                            <a href="#">{{trans('business.Offline training')}}</a>
                        </li>
                        <li
                                class="md:text-[16px] text-[12px] text-white hover:underline"
                        >
                            <a href="#">{{trans('business.Professional Certificates')}}</a>
                        </li>
                        <li
                                class="md:text-[16px] text-[12px] text-white hover:underline"
                        >
                            <a href="#">{{trans('business.Digital transformation')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <h3
                            class="md:text-[24px] font-bold text-[18px] mb-[18px] text-white"
                    >
                        {{trans('business.Contact Us')}}
                    </h3>
                    <div>
                        <p class="md:text-[16px] text-[12px] text-white">
                            <strong>{{trans('business.E-mail')}}:</strong>
                            <a href="mailto:info@igts.com" class="hover:underline"
                            >info@igts.com</a
                            >
                        </p>
                        <p class="md:text-[16px] text-[12px] text-white">
                            <strong>{{trans('business.Saudi Arabia')}}:</strong>
                            {{ trans('website.SaudiaAddress') }}
                        </p>
                        <p class="md:text-[16px] text-[12px] text-white">
                            <strong>{{trans('business.Egypt')}}:</strong>
                            {{ trans('website.EgyptAddress Text') }}
                        </p>
                        <p class="md:text-[16px] text-[12px] text-white">
                            <strong>{{trans('business.Emirates')}}:</strong>
                            {{ trans('website.Address Text') }}
                        </p>

                    </div>
                </div>
                <div class="flex flex-col">
                    <h3  class="md:text-[24px] font-bold text-[18px] mb-[18px] text-white" >
                        {{trans('business.Payment methods')}}
                    </h3>
                    <img  src="{{ asset('business/newBusiness') }}/src/images/payment.png"
                            alt="payment-methods"
                            class="md:w-[354px] md:h-[87px] w-full h-full"  />
                </div>
            </div>
        </div>
    </div>
    <div class="border-t footer-bottom border-grey/25 py-[20px]">
        <div
                class="px-[80px] flex flex-col md:flex-row justify-center items-center"
        >
            <div
                    class="flex flex-col items-center justify-center gap-4 md:flex-row md:justify-center"
            >
                <p class="md:text-[18px] text-[14px] text-white">
                    {{trans('business.Certified Global Content Provider')}}
                </p>
                <img
                        src="{{ asset('business/newBusiness') }}/src/images/providedby.png"
                        alt="providedby"
                        class="md:w-[354px] md:h-[87px] w-[254px]"
                />
            </div>
        </div>
    </div>
    <div class="border-t footer-bottom border-grey/25 py-[20px]">
        <div
                class="md:px-[80px] px-[30px] flex flex-col justify-between md:flex-row align-center"
        >
            <!-- Copyright Notice -->
            <p
                    class="md:text-[16px] text-[12px] text-white md:text-right text-center md:mb-0 mb-[20px]"
            >
                {{trans('business.All rights reserved to IGTS © 2025.')}}
            </p>

            <!-- Social Media Icons -->
            <div class="flex justify-center gap-6 md:mb-0 mb-[20px]">
                <a href="{{ getSetting('facebook') }}"
                ><img
                            src="{{ asset('business/newBusiness') }}/src/images/facebook-brands-solid.svg"
                            alt="Facebook"
                            class="w-6 h-6 hover:opacity-50"
                    /></a>
                <a href="{{ getSetting('instagram') }}"
                ><img
                            src="{{ asset('business/newBusiness') }}/src/images/square-instagram-brands-solid.svg"
                            alt="Instagram"
                            class="w-6 h-6 hover:opacity-50"
                    /></a>
                <a href="{{ getSetting('youtube') }}">
                    <img  src="{{ asset('business/newBusiness') }}/src/images/square-youtube-brands-solid.svg"
                            alt="YouTube"
                            class="w-6 h-6 hover:opacity-50" /></a>
                <a href="{{ getSetting('twitter') }}">
                    <img src="{{ asset('business/newBusiness') }}/src/images/square-x-twitter-brands-solid.svg"
                            alt="Twitter"
                            class="w-6 h-6 hover:opacity-50" />
                </a>
            </div>

            <!-- Footer Bottom Links -->
            <div class="flex justify-center gap-1 text-sm text-white md:gap-3">
                <a href="https://igtsservice.com/page/privacyPolicy" class="hover:underline md:text-[16px] text-[12px]" >{{trans('business.Privacy policy')}}</a  >
                <span>-</span>
                <a href="https://igtsservice.com/page/termsOfUse" class="hover:underline md:text-[16px] text-[12px]"
                >{{trans('business.Terms')}}</a
                >
                <span>-</span>
                <a href="https://igtsservice.com/faq" class="hover:underline md:text-[16px] text-[12px]"
                >{{trans('business.Q&A')}}</a
                >
{{--                <span>-</span>--}}
{{--                <a href="#" class="hover:underline md:text-[16px] text-[12px]"--}}
{{--                >انضم كشريك</a--}}
{{--                >--}}
            </div>
        </div>
    </div>
</footer>

{{ Html::script('js/sweetalert.min.js') }}
<!-- Script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('business/newBusiness') }}/src/js/script.js"></script>

@include('sweet::alert')
@stack('js')

</body>
</html>
