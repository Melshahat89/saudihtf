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

            background-color: rgb(24 178 137 / var(--tw-bg-opacity, 1)) !important;
        }

        .bg-primary {

            background-color: rgb(24 178 137 / var(--tw-bg-opacity, 1))  !important;
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
                            {{trans('business.Unlimited Accredited Courses in All Categories')}}
                        </h2>
                        <p class="md:text-[14px] text-[12px] md:text-white text-secondary md:text-right text-center" >
                            {{trans('business.Provide your team in all departments with the needed')}}
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

    <!-- Inner Features Section -->
    <section class="inner-features-section relative pt-[theme('spacing.90')]">
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
                <strong>{{trans('business.the features')}}</strong> {{trans('business.Subscriptions')}}
            </h2>

            <div class="swiper">
                <div class="swiper-wrapper pb-[50px]">
                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-subscriptionsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-subscriptionsTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-subscriptionsTheme-primary group-hover:text-white"
                                >
                                    <img
                                            src="{{ asset('business/newBusiness') }}/src/images/inner-feat-01.svg"
                                            alt="check"
                                            class="w-[38px] h-[38px]"
                                    />
                                </div>
                                <h3 class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white">
                                    {{trans('business.Analyzing Training Needs')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Were analyzing the training needs for')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-subscriptionsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-subscriptionsTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-subscriptionsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Identifying Training Needs')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.We provide a full')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-subscriptionsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center justify-center w-[73px] h-[73px] bg-subscriptionsTheme-primary border-2 border-transparent group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-subscriptionsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Defining Training Path')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.We provide a training plan and analyzing reports')}}
                            </p>
                        </div>
                    </div>


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Business Features Section -->
    <section
            class="business-features-section relative mt-[theme('spacing.90')] py-[theme('spacing.90')] bg-subscriptionsTheme-primary"
    >
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-white">
                {!! trans('business.Advantages of the business system')!!}
            </h2>

            <div class="swiper">
                <div class="swiper-wrapper pb-[50px]">
                    <div class="swiper-slide">
                        <div
                                class="flex flex-col gap-2 p-[30px] bg-white rounded-xl w-full shadow-md"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/1.PNG"
                                    alt="L&D لوحة إدارة لإدارة فرق"
                                    class="w-full h-[215px] object-cover shadow-md"
                            />
                            <h3
                                    class="text-bodyColor font-bold md:text-[24px] text-[18px] py-[20px]"
                            >
                                {{trans('business.Easy Manageable Dashboard')}}
                            </h3>
                            <p class="text-bodyColor text-[14px]">
                                {{trans('business.The operating model allows for L&Ds to add')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex flex-col gap-2 p-[30px] bg-white rounded-xl w-full shadow-md"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/2.PNG"
                                    alt="L&D لوحة إدارة لإدارة فرق"
                                    class="w-full h-[215px] object-cover shadow-md"
                            />
                            <h3
                                    class="text-bodyColor font-bold md:text-[24px] text-[18px] py-[20px]"
                            >
                                {{trans('business.Easy Access for Leaders & Employees')}}
                            </h3>
                            <p class="text-bodyColor text-[14px]">
                                {{trans('business.Easy subscribe on the')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex flex-col gap-2 p-[30px] bg-white rounded-xl w-full shadow-md"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/3.PNG"
                                    alt=" {{trans('business.Insights Reports')}}"
                                    class="w-full h-[215px] object-cover shadow-md"
                            />
                            <h3
                                    class="text-bodyColor font-bold md:text-[24px] text-[18px] py-[20px]"
                            >
                                {{trans('business.Insights Reports')}}
                            </h3>
                            <p class="text-bodyColor text-[14px]">
                                {{trans('business.Allowing insights reports and full')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex flex-col gap-2 p-[30px] bg-white rounded-xl w-full shadow-md"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/4.PNG"
                                    alt="L&D لوحة إدارة لإدارة فرق"
                                    class="w-full h-[215px] object-cover shadow-md"
                            />
                            <h3
                                    class="text-bodyColor font-bold md:text-[24px] text-[18px] py-[20px]"
                            >
                                {{trans('business.Reduce Training Budget')}}
                            </h3>
                            <p class="text-bodyColor text-[14px]">
                                {{trans('business.The subscription plans makes it easy')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex flex-col gap-2 p-[30px] bg-white rounded-xl w-full shadow-md"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/5.PNG"
                                    alt=" لوحة إدارة لإدارة فرق"
                                    class="w-full h-[215px] object-cover shadow-md"
                            />
                            <h3  class="text-bodyColor font-bold md:text-[24px] text-[18px] py-[20px]">
                                {{trans('business.Easy Customized and Developed')}}
                            </h3>
                            <p class="text-bodyColor text-[14px]">
                                {{trans('business.Possibility of developing the platform')}}
                            </p>
                        </div>
                    </div>




                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us-section relative pt-[theme('spacing.90')]">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse gap-10 md:flex-row">
                <div class="flex justify-center flex-col md:w-[60%]">
                    <h2 class="md:text-[42px] text-[24px] mb-[25px] text-secondary">
                        <strong> {{trans('business.Why')}} </strong> {{trans('business.join us?')}}
                    </h2>
                    <ul class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Customized Subscription Plans')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">{{trans('business.Accredited by NeLC & Future X')}}</li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Customized Content Inner the Plan')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                           {{trans('business.Presented by Specialized Expertise')}}
                        </li>
                    </ul>
                    <a
                            href="{{url('business/offer-price')}}"
                            class="h-[42px] inline-block text-center w-[160px] mt-[35px] leading-[19px] px-4 py-2 text-white rounded-full bg-secondary transition ease-in-out hover:bg-subscriptionsTheme-primary"
                    >{{trans('business.Request a Quote')}}</a
                    >
                </div>

                <img
                        src="{{ asset('business/newBusiness') }}/src/images/why-us.jpg"
                        alt="why us"
                        class="object-cover md:w-[40%] w-full rounded-xl"
                />
            </div>
        </div>
    </section>



@endsection