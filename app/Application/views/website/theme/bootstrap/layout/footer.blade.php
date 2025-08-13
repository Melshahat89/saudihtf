<div class="main-footer">
    <!-- <footer>
        <div class="wrapper">
            <div class="row">
                {{-- <div class="col-md-4">--}}
                    {{-- <h4 class="footer-title"><a style="color: white" href="{{url('business')}}">{!!
                            trans('website.Mobile App')!!}</a></h4>--}}
                    {{-- --}}
                    {{-- <p>--}}
                        {{-- {{trans('website.Our mobile application is coming soon')}}--}}
                        {{-- </p>--}}
                    {{-- <a href="https://play.google.com/store/apps/details?id=com.igts.igts" target="_blank"><img
                            src="{{ asset('website') }}/images/front/play-store.svg"></a>--}}
                    {{-- <img src="{{ asset('website') }}/images/front/app-store.svg">--}}
                    {{-- </div>--}}
                <div class="col-md-6">
                    <h4 class="footer-title">{!! trans('website.Quick Links')!!}</h4>
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
                        {{-- <li>--}}
                            {{-- <a href="{{url('careers')}}">{{trans('careers.careers')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('verifycertificate')}}">{{trans('page.Certificate
                                Verification')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('page/partners')}}">{{trans('page.Accreditations')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('business')}}">{{trans('home.IGTS For Business')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('joinAsInstructor')}}">{{trans('home.become an instructor')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a
                                href="{{url('consultants/category')}}">{{trans('consultation.consultation')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('testimonials')}}">{{trans('testimonials.testimonials')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('blog/category/events')}}">{{trans('website.events')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('blog/category/news')}}">{{trans('website.news')}}</a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('page/partners')}}">{{trans('home.accreditations')}} </a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="{{url('instructors/All')}}">{{trans('home.instructors')}} </a>--}}
                            {{-- </li>--}}
                    </ul>
                </div>

                <div class="col-md-6">
                    <h4 class="footer-title">{!! trans('website.Keep Connected')!!}</h4>

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
                    <img src="{{ asset('subscription-new/src') }}/images/payments2.png"
                        style="    width: auto  !important;height: 50px" loading="lazy" alt="Voda Cash">
                    {{-- <img src="{{ asset('website') }}/images/front/mastercardlogo.svg" width="100" height="40"
                        loading="lazy" alt="mastercardlogo Cash">--}}
                    {{-- <img src="{{ asset('website') }}/images/front/paypallogo.svg" width="100" height="40"
                        loading="lazy" alt="paypallogo Cash">--}}
                    {{-- <img src="{{ asset('website') }}/images/front/voda-cash.png" width="100" height="40"
                        loading="lazy" alt="voda Cash">--}}
                </div>
                <p>{{trans('business.Copyright')}} © {{currentYear()}} <span>IGTS</span>.
                    {{trans('business.All rights reserved.')}}
                </p>
            </div>
        </div>
    </footer> -->

    <!-- Footer Section -->
    <footer class="px-4 mt-5 text-center px-md-5">
        <!-- Footer Links -->
        <div class="mt-4 d-flex justify-content-center color-dark-blue" style="gap: 1rem;">
            <a href="{{ url('allcourses/category') }}" class="text-decoration-hover fs-6 fs-md-5">
                {{ trans('website.Specialities') }}
            </a>
            {{-- <a href="{{ url('page/about') }}" class="hover:underline text-[16px] md:text-[18px]">--}}
                {{-- {{ trans('website.About Us') }}--}}
                {{-- </a>--}}
            <a href="{{ url('contact') }}" class="text-decoration-hover fs-6 fs-md-5">
                {{ trans('website.Contact') }}
            </a>
            <a href="{{ url('faq') }}" class="text-decoration-hover fs-6 fs-md-5">
                {{ trans('faq.faq') }}
            </a>
        </div>

        {{-- <div class="flex flex-col items-center justify-center w-full gap-4 mt-6 text-gray-800 fw-400">--}}

            {{-- <p class="text-babydark mt-[14px] text-[18px]">--}}
                {{-- {{ trans('website.Certified by') }}--}}
                {{-- </p>--}}

            {{-- <img src="{{ asset('subscription-new/src') }}/images/nec.png" alt="Payments"
                class="w-[265px] h-full " />--}}
            {{-- </div>--}}

        <!-- Social Media Icons -->
        <div class="my-5 d-flex justify-content-center align-items-center">
            <div class="d-flex" style="gap: 1rem;">
                <a href="https://www.youtube.com/channel/UCYGhbTVNiAbgQ--d5-yo8bQ" target="_blank">
                    <img src="{{ asset('subscription-new/src') }}/images/square-youtube-brands-solid.svg" alt="YouTube"
                        style="width: 25px; height: 25px;" />
                </a>
                <a href="https://x.com/FutureWork_ksa" target="_blank">
                    <img src="{{ asset('subscription-new/src') }}/images/square-x-twitter-brands-solid.svg"
                        alt="Twitter" style="width: 25px; height: 25px;" />
                </a>
                <a href="https://www.linkedin.com/company/futureworkksa/posts/?feedView=all" target="_blank">
                    <img src="{{ asset('subscription-new/src') }}/images/linked.png" alt="Instagram"
                         class="w-6 h-6"  style="width: 25px; height: 25px;" />
                </a>
            </div>
        </div>

        <div
            class="pt-4 pb-4 d-flex flex-column flex-md-row align-items-center justify-content-between border-top pb-md-0 pt-md-0">
            <!-- Copyright Notice -->
            <p class="text-dark copyright-text" style="font-size: 20px">
                حقوق الطبع والنشر © 2025 Future Work.
                <br>

                مطور محتوى

{{--                iGTS--}}
                <img src="https://igtsservice.com/website/images/logonew.webp" alt="Instagram"
                     class="w-6 h-6"  style="width: 50px; height: 30px;" />

            </p>

            <!-- Payment Methods -->
            <div class="flex justify-center gap-4 md:py-0 py-[20px]" style="max-height: 100px;font-size: 20px">
                <div class="w-[300px]">
                    <a>
                        المحتوى معتمد من المركز الوطني
                        <br>
                        للتعليم الإلكتروني و FUTURE X
                    </a>
                </div>
            </div>

            <!-- Footer Bottom Links -->
            <div class="d-flex justify-content-center" style="gap: 1rem;font-size: 20px">
                <a href="{{ url('page/termsOfUse') }}" class="copyright-links">
                    {{ trans('website.Terms and Conditions') }}
                </a>
{{--                <span class="color-dark-blue">-</span>--}}
                <a href="{{ url('page/privacyPolicy') }}" class="copyright-links">
                    {{ trans('website.Privacy Policy') }}
                </a>
            </div>
        </div>
    </footer>
</div>
@if(!Auth::check() && Illuminate\Support\Facades\Route::currentRouteName() != 'post')
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        @include('website.theme.bootstrap.layout.popup.login');
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal"
        aria-hidden="true">
        @include('website.theme.bootstrap.layout.popup.register');
    </div>
@endif