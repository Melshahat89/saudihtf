@extends(layoutExtend('website'))
@section('title')
    {{ trans('home.HomeTitle') }}
@endsection
@section('description')
    {{ trans('home.HomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.HomeKeywords') }}
@endsection
@section('content')
    <style>
        .plan-card {
            background: #fff;
            border-radius: 15px;
            text-align: center;
            position: relative;
            width: 295px;
            margin: 0 auto;
        }
        .plan-card h3 {
            color: #fff;
            background: #000;
            padding: 20px 0;
            border-radius: 15px 15px 0 0;
            font-size: 25px;
            font-weight: 200;
            text-transform: uppercase;
        }
        .card-footer:last-child {
            border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
        }
        .card-footer {
            border-top: 1px solid #ddd;
            padding: 10px 15px
        }
        .price p {
            color: #000;
            font-size: 24px;
            font-weight: 800;
            display: inline;
        }
        .plans {
            background: url(../../business/subscriptions/images/plan-bg.svg) no-repeat center center;
            background-size: cover;
            margin-top: 40px;
            padding-top: 40px;
            padding-bottom: 20px;
            border-radius: 15px;
        }
    </style>


    <div id="carouselExampleIndicators" class="carousel slide hero-slider" data-ride="carousel">
        <div class="carousel-inner" style="height: 100%;">
            <ol class="carousel-indicators">
                @php $j = 0; @endphp
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$j}}" class="{{$j == 0 ? 'active' : ''}}"></li>
                    @php $j++; @endphp
                @endforeach
            </ol>
            @php $i = 0; @endphp
            @foreach($sliders as $slider)
                <div class="carousel-item {{ ($i == 0) ? 'active' : '' }}" style="height: 100%;background: url({{large1($slider->image)}}) no-repeat center center;background-size: cover;">
                    <div class="d-flex align-items-center text-center h-100" style="place-content: center;">
                        <div>
                            <h2 class="mbmd" style="color: #FFF;font-weight: bold;">{{$slider->title_lang}}</h2>
                            <h3 class="mbmd" style="color: #FFF; font-size: 18px;">{{$slider->description_lang}}</h3>
                            @if($slider->ctatext_lang && !empty($slider->ctatext_lang))
                                <a href="{{$slider->cta_link}}" class="button home-slider-button button_small text_capitalize mt-4 slider-cta" type="button" role="button">

                                    @if($slider->id == 9  && getCurrency() == 'SAR')
                                        {{trans('website.Subscribe Now Saudi')}}
                                    @else
                                        {{$slider->ctatext_lang}}
                                    @endif
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @php $i++; @endphp
            @endforeach
        </div>
    </div>

    <main class="main_content">

        <section class="sec">
            <div class="wrapper">
                <section class="title mblg">
                    <h2 class="text_primary text_capitalize d-none">{{trans('home.specialities')}}</h2>
                    <!-- <div class="actions">
                        <a href="/courses/category/masters" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>
                    </div> -->
                </section>

                <div id="specialities">
                    <div class="owl-carousel owl-theme specialities">

                        @foreach ($categories as $category)
                            @include(sectionSpecialities('website'), ['data' => $category])
                        @endforeach

                    </div>
                </div>
            </div>
        </section>


        {{--    Best Learning Experience Section  --}}

        <section class="sec sec_pad_top  mtxs">
            <div class="wrapper">
                <div class="row plans"  style="background: linear-gradient(90deg, #326478 0%, #326478 50%, #18b289 90%)">
                    <div class="col-md-6 text-center align-self-center">
                        <div style="color: #FFF;font-weight: bold;">
                            <h2 >{{trans('b2b.OUR PLANS')}}</h2>
                            <p>

                                @if(getCurrency() == 'SAR')
                                    {!! trans('b2b.With one subscription, you can view all of our courses Saudi') !!}
                                @else
                                    {{trans('b2b.With one subscription, you can view all of our courses')}}
                                @endif


                            </p>
                            <div class="m-4">




                                @if(Auth::check())
                                    @if($subscription_yearly_after > 0)
                                        <a id="annualSubBtn" data-annualFees="{{$subscription_yearly_after}}" href="javascript:void(0)" class="button home-slider-button button_small text_capitalize mt-4 slider-cta" data-dismiss="modal" data-toggle="modal" data-target="#directBuyModal">
                                            @if(getCurrency() == 'SAR')
                                                {{trans('website.Subscribe Now Saudi')}}
                                            @else
                                                {{trans('b2b.Subscribe Now')}}
                                            @endif
                                        </a>
                                    @else
                                        <a  href="{{url('subscriptions/subscripeNow/yearly')}}" class="button home-slider-button button_small text_capitalize mt-4 slider-cta" >
                                            @if(getCurrency() == 'SAR')
                                                {{trans('website.Subscribe Now Saudi')}}
                                            @else
                                                {{trans('b2b.Subscribe Now')}}
                                            @endif
                                        </a>
                                    @endif
                                @else
                                    <a href="{{url('login')}}"  class="button home-slider-button button_small text_capitalize mt-4 slider-cta">{{trans('b2b.Signup to subscribe')}}</a>
                                @endif


                            </div>
                            <!--Input Form1-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="bestLearning">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-5">



                                    <div class="plan-card" style="width: auto">

                                        <h3>{{trans('b2b.MONTHLY')}}</h3>

                                        <img class="mt-2" src="{{asset('website/subscriptions')}}/image/monthly-icon.svg" alt="...">


                                        <div class="flexBetween card-footer">
                                            <div class="price final-price">
                                                <p class="monthlyPrice">{{$subscription_monthly}} </p>
                                                <span>{{getCurrency()}}/{{trans('website.Mo')}}</span>
                                            </div>
                                            <div class="discount">
                                                <div class="save-percent">
                                                    {{trans('website.Billed Monthly')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="plan-card" style="width: auto">
                                        <h3>{{trans('b2b.ANNUAL')}}</h3>
                                        <img class="mt-2" src="{{asset('website/subscriptions')}}/image/annual-icon.svg" alt="...">
                                        <div class="flexBetween card-footer">
                                            <div class="price final-price">
                                                <p class="annualPriceOutter">{{$subscription_yearly_after}}</p>
                                                <span>{{getCurrency()}}/{{trans('website.Year')}}</span>
                                            </div>
                                            <div class="discount">
                                                <div class="save-percent">
                                                    <del>{{$subscription_yearly_before}}
                                                        <span>{{getCurrency()}}/{{trans('website.Year')}}</span>
                                                    </del>

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






    @isset($forYou)
        @if(count($forYou))
            <section class="sec sec_pad_top sec_pad_bottom bg_lightgray ">
                <div class="wrapper">
                    <section class="title mblg">
                        <h2 class="text_primary text_capitalize">{{trans('website.Selected courses for you')}}</h2>
                        <div class="actions">
                            <a href="/allcourses/category/" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>
                        </div>
                    </section>

                    <div id="latestCourses">
                        <div class="owl-carousel owl-theme latestCourses">

                            @foreach ($forYou as $latestRelease)
                                @include(sectionMasterCourses('website'), ['data' => $latestRelease])
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        @endif
        @endif



{{--        <section class="sec sec_pad_top sec_pad_bottom bg_lightgray ">--}}
{{--            <div class="wrapper">--}}
{{--                <section class="title mblg">--}}
{{--                    <h2 class="text_primary text_capitalize">{{trans('website.partners')}}</h2>--}}
{{--                    <div class="actions">--}}
{{--                        <a href="/allcourses/category/" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>--}}
{{--                    </div>--}}
{{--                </section>--}}

{{--                <style>--}}
{{--                    .container h1 {--}}
{{--                        position: relative;--}}
{{--                        z-index: 2;--}}
{{--                        text-align: center;--}}
{{--                    }--}}

{{--                    .container .numbers {--}}
{{--                        position: relative;--}}
{{--                        z-index: 2;--}}
{{--                        font-size: 2rem;--}}
{{--                        text-align: center;--}}
{{--                    }--}}

{{--                    .logo {--}}
{{--                        position: absolute;--}}
{{--                        width: 100px;--}}
{{--                        height: 100px;--}}
{{--                        opacity: .2;--}}
{{--                        animation: floatUp 40s linear infinite;--}}
{{--                    }--}}

{{--                    @keyframes floatUp {--}}
{{--                        from {--}}
{{--                            transform: translateY(100%);--}}
{{--                        }--}}
{{--                        to {--}}
{{--                            transform: translateY(-100%);--}}
{{--                        }--}}
{{--                    }--}}
{{--                </style>--}}


{{--                <div id="latestCourses">--}}
{{--                    <div class="container">--}}

{{--                        <div class="numbers">+200</div>--}}
{{--                        <h1> شراكاتٌ نوعية نحو مستقبل مزدهر</h1>--}}
{{--                        <center>--}}
{{--                        <a href="/allcourses/category/" class="button button_primary button_small text_center" type="button" role="button">{{trans('home.view all')}}</a>--}}
{{--                        </center>--}}
{{--                        <!-- Example Logos -->--}}


{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/42158_1727792779.png" class="logo" style="left: 10%; animation-duration: 5s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/47795_1727792835.png" class="logo" style="left: 30%; animation-duration: 3s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/84813_1727792865.png" class="logo" style="left: 50%; animation-duration: 8s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/47284_1727792883.png" class="logo" style="left: 70%; animation-duration: 8s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/27016_1727792908.png" class="logo" style="left: 90%; animation-duration: 5s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/94327_1727792726.png" class="logo" style="left: 20%; animation-duration: 3s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/68682_1727792749.png" class="logo" style="left: 40%; animation-duration: 8s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/72571_1727792652.png" class="logo" style="left: 60%; animation-duration: 5s;">--}}
{{--                        <img src="https://subscriptions.igtsservice.com/uploads/files/72045_1727792521.png" class="logo" style="left: 80%; animation-duration: 8s;">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div id="latestCourses">--}}
{{--                    <div class="container">--}}
{{--                        <h1>العنوان هنا</h1>--}}
{{--                        <div class="numbers">1234</div>--}}
{{--                        <div id="logos"></div>--}}
{{--                    </div>--}}

{{--                    <script>--}}
{{--                        const logoContainer = document.getElementById('logos');--}}
{{--                        const logos = ['https://subscriptions.igtsservice.com/uploads/files/42158_1727792779.png', 'https://subscriptions.igtsservice.com/uploads/files/47795_1727792835.png',--}}
{{--                            'https://subscriptions.igtsservice.com/uploads/files/84813_1727792865.png', 'https://subscriptions.igtsservice.com/uploads/files/27016_1727792908.png',--}}
{{--                            'https://subscriptions.igtsservice.com/uploads/files/72571_1727792652.png']; // يمكنك إضافة المزيد من اللوجوهات هنا--}}
{{--                        const totalLogos = 20; // عدد اللوجوهات المطلوب--}}

{{--                        for (let i = 0; i < totalLogos; i++) {--}}
{{--                            const logo = document.createElement('img');--}}
{{--                            logo.src = logos[Math.floor(Math.random() * logos.length)];--}}
{{--                            logo.classList.add('logo');--}}
{{--                            logo.style.left = Math.random() * 100 + '%';--}}
{{--                            logo.style.animationDuration = (5 + Math.random() * 5) + 's'; // مدة الحركة بين 5 و10 ثواني--}}
{{--                            logoContainer.appendChild(logo);--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}




{{--        <section class="sec sec_pad_top sec_pad_bottom sec sec_pad_top bg_gradient_home mtxs">--}}
{{--            <div class="wrapper">--}}
{{--                <section class="title mblg">--}}
{{--                    <h2 class="text_primary text_capitalize">{{trans('website.partners')}}</h2>--}}
{{--                </section>--}}
{{--                <div id="instructors">--}}
{{--                    <div class="owl-carousel owl-theme instructors">--}}
{{--                        @foreach ($Partners as $Partner)--}}
{{--                            @include(sectionPartners('website'), ['data' => $Partner])--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}





    @if($instructors && count($instructors) > 0)
            <section class="sec sec_pad_top sec_pad_bottom " style="height: 357px;">
                <div class="wrapper">
                    <section class="title mblg">
                        <h2 class="text_primary text_capitalize">{{trans('home.instructors')}}</h2>
                        <div class="actions">
                            <a href="/instructors/All" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>
                        </div>
                    </section>

                    <div id="instructors">
                        <div class="owl-carousel owl-theme instructors">

                            @foreach ($instructors as $instructor)
                                @include(sectionHomeInstructors('website'), ['data' => $instructor])
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif





    </main>


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


    {{--    Partners Section  --}}
{{--     @include(sectionPartnerCards('website'), ['Data' => $PartnerCards])--}}

    {{--    Instructors Section  --}}
    {{-- @include(sectionInstructors('website'), ['Data' => $Instructors]) --}}



    {{--    Testimonials Section  --}}
    {{-- @include(sectionTestimonials('website'), ['Data' => $Testimonials]) --}}

@endsection