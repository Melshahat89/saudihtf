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
                            {{trans('business.Invest in Your Team by Providing Them the Professional')}}
                        </h2>
                        <p class="md:text-[14px] text-[12px] md:text-white text-secondary md:text-right text-center" >
                            {{trans('business.Develop your teams professional skills by obtaining professional certifica')}}
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

    <!-- Professional Certificates Section -->
    <section
            class="professional-certificates-section relative mt-[theme('spacing.90')] py-[theme('spacing.90')] bg-softGrey"
    >
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
       {!! trans('business.Professional Certificate') !!}
            </h2>

            <div class="swiper">
                <div class="swiper-wrapper pb-[50px]">

                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/shrm-main.svg"
                                    alt="partner-image"
                                    class="w-[150px] h-[150px]"
                            />
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/Meta-01.svg"
                                    alt="partner-image"
                                    class="w-full h-full"
                            />
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white  m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/PMI.svg"
                                    alt="partner-image"
                                    class="w-full h-full"
                            />
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white  m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/PMI.svg"
                                    alt="partner-image"
                                    class="w-full h-full"
                            />
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white  m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/Meta-01.svg"
                                    alt="partner-image"
                                    class="w-full h-full"
                            />
                        </div>
                    </div>



                    <div class="swiper-slide">
                        <div
                                class="flex p-[50px] items-center justify-center bg-white  m-auto rounded-full border border-grey"
                        >
                            <img
                                    src="{{ asset('business/newBusiness') }}/src/images/courses/PMI.svg"
                                    alt="partner-image"
                                    class="w-full h-full"
                            />
                        </div>
                    </div>


                </div>
                <div class="swiper-pagination"></div>
                <div class="flex items-center justify-center gap-4 swiper-button-container z-[100]">
                    <div class="button-prev">
                        <img src="{{ asset('business/newBusiness') }}/src/images/arrow-left.svg" alt="arrow-left">
                    </div>
                    <div class="button-next">
                        <img src="{{ asset('business/newBusiness') }}/src/images/arrow-right.svg" alt="arrow-right">
                    </div>
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
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-certificationsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-certificationsTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-certificationsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Refunded from HRDF')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.The cost of programs and exams are fully refunded from HRDF for Saudi citizens')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-certificationsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center border-2 border-transparent justify-center w-[73px] h-[73px] bg-certificationsTheme-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-certificationsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Certified Instructors')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Certified instructors at the international institutes of professional certificates')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-certificationsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center justify-center w-[73px] h-[73px] bg-certificationsTheme-primary border-2 border-transparent group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-certificationsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Preparation for Exams')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Practical training on international exams to ensure passing')}}
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                                class="flex transition ease-in-out feat-card cursor-pointer flex-col gap-4 bg-softGrey rounded-xl p-[30px] group hover:bg-certificationsTheme-primary hover:text-white"
                        >
                            <div class="flex items-center justify-start gap-4">
                                <div
                                        class="flex items-center justify-center w-[73px] h-[73px] bg-certificationsTheme-primary border-2 border-transparent group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-certificationsTheme-primary group-hover:text-white"
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
                                    {{trans('business.Practical Cases')}}
                                </h3>
                            </div>
                            <p class="text-bodyColor text-[14px] group-hover:text-white">
                                {{trans('business.Training on real case studies of international organizations')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>




@endsection