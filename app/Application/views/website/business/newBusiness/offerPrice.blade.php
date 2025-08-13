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

    <!-- Contact Section -->
    <section class="contact-section relative py-[theme('spacing.90')]">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse gap-8 hero-section md:flex-row">
                <!-- Contact Form -->
                <div class="w-full md:w-[40%] lg:w-[30%] ">
                    <h2 class="md:text-[30px] text-[20px] mb-[35px] text-secondary">

                        {!! trans('business.Contact us via the form below') !!}


                    </h2>
                    <div
                            class="w-full py-[35px] px-[25px] bg-[#f7f7f7] rounded-lg shadow-md"
                    >
                            <form class="space-y-4" action="{{ concatenateLangToUrl('contact') }}" name="contactform"
                                  method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="source" value="business-offer-price">
                            <input
                                    type="text"
                                    name="name"
                                    placeholder="{{ trans('website.Name') }}"
                                    class="w-full p-3 border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />
                            <input
                                    type="email"
                                    name="email"
                                    placeholder="{{ trans('website.Email') }}"
                                    class="w-full p-3 border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />
                            <input
                                    type="tel"
                                    name="phone"
                                    placeholder="{{ trans('website.Phone') }}"
                                    class="w-full p-3 text-right border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />

                            <input
                                    type="text"
                                    name="country_code"
                                    placeholder="{{trans('business.Country')}}"
                                    id="country"
                                    class="w-full p-3 border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />

                            <input
                                    type="text"
                                    name="company_name"
                                    placeholder="{{ trans('website.company_name') }}"
                                    class="w-full p-3 border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />
                            <select
                                    name="company_size"
                                    class="w-full p-3 bg-white border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            >
                                <option value="">{{trans('website.Number_of_trainees')}}</option>
                                <option value="0-50">0 - 50</option>
                                <option value="51-100">51 - 100</option>
                                <option value="101-200">101 - 200</option>
                                <option value="+200">+200</option>
                            </select>
                            <input
                                    type="text"
                                    name="website_url"
                                    placeholder="{{trans('website.website_url')}}"
                                    class="w-full p-3 border border-gray-300 rounded placeholder:text-black focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            />
{{--                            <select--}}
{{--                                    class="w-full p-3 bg-white border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"--}}
{{--                            >--}}
{{--                                <option>الخدمات</option>--}}
{{--                                <option>الاشتراكات</option>--}}
{{--                                <option>التحول الرقمي</option>--}}
{{--                                <option>التدريب اوفلاين</option>--}}
{{--                                <option>شهادات احترافية</option>--}}
{{--                            </select>--}}
{{--                            <div class="g-recaptcha" data-sitekey="your-site-key"></div>--}}

                            <div>
                                <button
                                        type="submit"
                                        class="block w-[160px] m-auto mt-[40px] text-center pb-[10px] pt-[8px] text-white transition ease-in-out rounded-full bg-primary hover:bg-secondary"
                                >
                                    {{ trans('website.send now') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Hero Content -->
                <div
                        class="flex flex-col justify-center items-center w-full md:w-[60%] lg:w-[70%] text-center"
                >
                    <h1 class="md:text-[42px] text-[24px] mb-[20px] text-secondary">
                        <strong class="text-primary">{{trans('business.Discover')}}</strong> {{trans('business.Our Services')}}
                    </h1>
                    <p class="md:text-[14px] text-[12px] text-secondary mb-[40px]">
                        {{trans('business.Home-Slider-Title')}}
                        <br>
                        {{trans('business.Home-Slider-Desc')}}
                    </p>
                    <img
                            src="{{ asset('business/newBusiness') }}/src/images/landingpage-image.png"
                            alt="Landing Page Image"
                            class="lg:w-[681px] lg:h-[406px] w-full"
                    />
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="relative services-section">
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-secondary">
                <strong class="text-primary">{{trans('business.Discover')}}</strong> {{trans('business.Our Services')}}
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div
                        class="flex flex-col gap-4 bg-softGrey shadow-md rounded-xl p-[50px]"
                >
                    <div class="flex items-center justify-start gap-4">
                        <img
                                src="{{ asset('business/newBusiness') }}/src/images/service-01-logo.png"
                                alt="Service 01"
                                class="w-[115px] h-[56px]"
                        />

                        <h3
                                class="text-subscriptionsTheme-primary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Subscriptions')}}
                        </h3>
                    </div>
                    <p class="text-black text-[14px] group-hover:text-white">
                        {{trans('business.Home-Subscription-text1')}}
                    </p>
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Analyzing Training Needs')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Identifying Training Needs')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Defining Training Path')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex flex-col gap-4 bg-softGrey shadow-md rounded-xl p-[50px]"
                >
                    <div class="flex items-center justify-start gap-4">
                        <img
                                src="{{ asset('business/newBusiness') }}/src/images/service-02-logo.png"
                                alt="Service 01"
                                class="w-[113px] h-[52px]"
                        />

                        <h3
                                class="text-offlineTrainingTheme-primary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Offline training')}}
                        </h3>
                    </div>
                    <p class="text-black text-[14px] group-hover:text-white">
                        {{trans('business.Home-Offline-training-text1')}}
                    </p>
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Preparing Training Packages')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Presenting Training Programs')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Experts in Different Industries')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex flex-col gap-4 bg-softGrey shadow-md rounded-xl p-[50px]"
                >
                    <div class="flex items-center justify-start gap-4">
                        <img
                                src="{{ asset('business/newBusiness') }}/src/images/service-03-logo.png"
                                alt="Service 01"
                                class="w-[113px] h-[57px]"
                        />

                        <h3
                                class="text-digitalTransformationTheme-primary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Digital transformation')}}
                        </h3>
                    </div>
                    <p class="text-black text-[14px] group-hover:text-white">
                        {{trans('business.Home-Digital-transformation-text1')}}
                    </p>
                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Leadership Skills')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Engagement with Management')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Meet Business Goals')}}
                        </li>
                    </ul>
                </div>

                <div
                        class="flex flex-col gap-4 bg-softGrey shadow-md rounded-xl p-[50px]"
                >
                    <div class="flex items-center justify-start gap-4">
                        <img
                                src="{{ asset('business/newBusiness') }}/src/images/service-04-logo.png"
                                alt="Service 01"
                                class="w-[115px] h-[52px]"
                        />

                        <h3
                                class="text-certificationsTheme-primary md:text-[24px] text-[18px] font-bold group-hover:text-white"
                        >
                            {{trans('business.Professional Certificates')}}
                        </h3>
                    </div>

                    <p class="text-black text-[14px] group-hover:text-white">
                        {{trans('business.Home-Professional-Certificates-text1')}}
                    </p>

                    <ul class="flex flex-col gap-2">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Refunded from HRDF')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Certified Instructors')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Preparation for Exams')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section relative py-[theme('spacing.90')] mt-[theme('spacing.90')] bg-secondary">
        <div class="container mx-auto">
            <h2 class="md:text-[42px] text-[24px] mb-[35px] text-white">
                <strong class="text-primary">{{trans('business.Discover')}}</strong> {{trans('business.the features')}}
            </h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-primary hover:text-white">
                    <div class="flex items-center justify-start gap-4">
                        <div class="flex items-center justify-center w-[73px] h-[73px] bg-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-primary group-hover:text-white">
                            <img src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg" alt="check" class="w-[38px] h-[38px]">
                        </div>
                        <h3 class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white">{{trans('business.For Leaders')}}</h3>
                    </div>
                    <ul class="flex flex-col gap-2 mt-[30px]">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Leadership Skills')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Focusing on Efficient Training Time')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Team Performance and Productivity')}}
                        </li>
                    </ul>
                </div>

                <div class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-primary hover:text-white">
                    <div class="flex items-center justify-start gap-4">
                        <div class="flex items-center justify-center w-[73px] h-[73px] bg-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-primary group-hover:text-white">
                            <img src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg" alt="check" class="w-[38px] h-[38px]">
                        </div>
                        <h3 class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white">{{trans('business.For Employees')}}</h3>
                    </div>
                    <ul class="flex flex-col gap-2 mt-[30px]">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Engagement with Management')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Tasks Completion')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Production Quality')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Increasing Satisfaction')}}
                        </li>
                    </ul>
                </div>

                <div class="flex feat-card cursor-pointer flex-col gap-4 bg-white rounded-xl p-[30px] group hover:bg-primary hover:text-white">
                    <div class="flex items-center justify-start gap-4">
                        <div class="flex items-center justify-center w-[73px] h-[73px] bg-primary group-hover:border-2 group-hover:border-white rounded-xl group-hover:bg-primary group-hover:text-white">
                            <img src="{{ asset('business/newBusiness') }}/src/images/check-solid.svg" alt="check" class="w-[38px] h-[38px]">
                        </div>
                        <h3 class="text-secondary md:text-[24px] text-[18px] font-bold group-hover:text-white">{{trans('business.For Businesses')}}</h3>
                    </div>
                    <ul class="flex flex-col gap-2 mt-[30px]">
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Meet Business Goals')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Reduce Onboarding Cost')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Improve Company Positioning')}}
                        </li>
                        <li class="list-icon leading-[20px] py-[5px]">
                            {{trans('business.Smart Analyzing for Company Needs')}}
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>



@endsection