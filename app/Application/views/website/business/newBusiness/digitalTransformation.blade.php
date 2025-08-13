@extends(layoutNewBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Groups') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection


@push('css')
    <style>
        .bg-subscriptionsTheme-primary {

            background-color: rgb(244 192 20 / var(--tw-bg-opacity, 1)) !important;
        }

        .bg-primary {

            background-color: rgb(244 192 20 / var(--tw-bg-opacity, 1))  !important;
        }
        .bg-digitalTransformationTheme-primary {

            background-color: rgb(244 192 20 / var(--tw-bg-opacity, 1))  !important;
        }
    </style>

@endpush

@section('content')




    <!-- Hero Section -->
    <div class="hero-section__image mt-[60px] mx-[30px] md:mx-[80px]" style="direction: {{getDir()}}">
        <div class="swiper md:h-[650px] h-[720px] relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="w-full h-[350px] md:h-[650px] object-cover rounded-xl"
                         src="{{ asset('business/newBusiness') }}/src/images/hero-slider.jpg"
                         alt="hero-image" />
                    <div  class="md:absolute md:mt-0 mt-[35px] relative md:w-[418px] md:items-start items-center w-full flex flex-col gap-4 md:bottom-[80px] md:right-[60px] bottom-0 right-0 z-[2]">
                        <h2 class="md:text-[24px] text-[18px] font-bold md:text-white text-secondary md:text-right text-center" >
                            {{trans('business.Transfer Your Organization to Digitalization')}}
                        </h2>
                        <p class="md:text-[14px] text-[12px] md:text-white text-secondary md:text-right text-center" >
                            {{trans('business.Prepare your team for digital transformation to align your organizational goals')}}
                        </p>
                        <a  href="{{url('business/offer-price')}}" class="h-[42px] text-center w-[160px] mt-[20px] md:mt-[15px] leading-[19px] px-4 py-2 text-white rounded-full bg-primary transition ease-in-out hover:bg-secondary">
                            {{trans('business.Request a Quote')}}
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination md:pb-[35px] pb-[0px]"></div>
        </div>
    </div>

    <!-- Digital Transformation Section -->
    <section
            class="digital-transformation-section relative mt-[theme('spacing.90')] py-[theme('spacing.90')] bg-softGrey"
    >
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
               {!! trans('business.digital transformation h1') !!}
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div
                        class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-secondary hover:text-white"
                >
                    <div class="flex items-center justify-start gap-4">
                        <div
                                class="flex items-center justify-center w-[73px] h-[73px] bg-secondary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-secondary group-hover:text-white"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg"
                                    alt="check"
                                    class="w-[38px] h-[38px]"
                            />
                        </div>
                        <h3
                                class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.LMS')}}
                        </h3>
                    </div>

                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Developing online learning academies')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Easy manageable dashboard for leaders')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Customized pages')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Multiple payment gateways')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-secondary hover:text-white"
                >
                    <div class="flex items-center justify-start gap-4">
                        <div
                                class="flex items-center justify-center w-[73px] h-[73px] bg-secondary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-secondary group-hover:text-white"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg"
                                    alt="check"
                                    class="w-[38px] h-[38px]"
                            />
                        </div>
                        <h3
                                class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Digital Training System')}}
                        </h3>
                    </div>
{{--                    <p class="text-bodyColor text-[14px] group-hover:text-white">--}}
{{--                       --}}
{{--                    </p>--}}
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Adding employees on the platform')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Adding specialized courses for each team')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.A full analyzing reports on training process')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-secondary hover:text-white"
                >
                    <div class="flex items-center justify-start gap-4">
                        <div
                                class="flex items-center justify-center w-[73px] h-[73px] bg-secondary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-secondary group-hover:text-white"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg"
                                    alt="check"
                                    class="w-[38px] h-[38px]"
                            />
                        </div>
                        <h3
                                class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Providing Consultancy in')}}
                        </h3>
                    </div>
{{--                    <p class="text-bodyColor text-[14px] group-hover:text-white">--}}
{{--                        سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم--}}
{{--                        أكيسأنتييوم دولاريمكيو لايودانتيوم.--}}
{{--                    </p>--}}
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Financial & Accounting')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Management & Operations')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.AI & Technology')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.HR Management')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-secondary hover:text-white"
                >
                    <div class="flex items-center justify-start gap-4">
                        <div
                                class="flex items-center justify-center w-[73px] h-[73px] bg-secondary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-secondary group-hover:text-white"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg"
                                    alt="check"
                                    class="w-[38px] h-[38px]"
                            />
                        </div>
                        <h3
                                class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Agile Enterprise Transformation')}}
                        </h3>
                    </div>
{{--                    <p class="text-bodyColor text-[14px] group-hover:text-white">--}}
{{--                        سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم--}}
{{--                        أكيسأنتييوم دولاريمكيو لايودانتيوم.--}}
{{--                    </p>--}}
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Empowering Teams')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Data-Driven decision making')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improving Productivity')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Sustainable Customer Satisfaction')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Inner Features Section -->
    <section class="inner-features-section relative pt-[theme('spacing.90')]">
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
                <strong>{{trans('business.Discover')}}</strong> {{trans('business.the features')}}
            </h2>

            <div class="swiper">
                <div class="swiper-wrapper pb-[50px]">
                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-digitalTransformationTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-digitalTransformationTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-digitalTransformationTheme-primary group-hover:text-white"
                                >
                                    <img
                                            src="{{ asset('business/newBusiness') }}/src/images/inner-feat-01.svg"
                                            alt="check"
                                            class="w-[38px] h-[38px]"
                                    />
                                </div>
                                <h3
                                        class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                                >
                                    {{trans('business.For Leaders')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Improve Leadership Skills')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-digitalTransformationTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-digitalTransformationTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-digitalTransformationTheme-primary group-hover:text-white"
                                >
                                    <img
                                            src="{{ asset('business/newBusiness') }}/src/images/inner-feat-02.svg"
                                            alt="check"
                                            class="w-[38px] h-[38px]"
                                    />
                                </div>
                                <h3
                                        class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                                >
                                    {{trans('business.For Employees')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Improve Engagement with Management')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-digitalTransformationTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center justify-center w-[73px] h-[73px] bg-digitalTransformationTheme-primary border-2 border-transparent group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-digitalTransformationTheme-primary group-hover:text-white"
                                >
                                    <img
                                            src="{{ asset('business/newBusiness') }}/src/images/inner-feat-03.svg"
                                            alt="check"
                                            class="w-[38px] h-[38px]"
                                    />
                                </div>
                                <h3
                                        class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                                >
                                    {{trans('business.For Businesses')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Meet Business Goals')}}
                            </p>
                        </div>
                    </div>


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>



@endsection