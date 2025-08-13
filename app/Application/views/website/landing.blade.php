<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iGTS - Home Page</title>
    <link rel="stylesheet" href="{{ asset('landing') }}/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&family=Tajawal:wght@300;400;700&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    {{ Html::style('website/css/sweetalert.css') }}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preload" href="{{ asset('landing') }}/fonts/URWGeometricArabic-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('landing') }}/fonts/URWGeometricArabic-Regular.woff2" as="font" type="font/woff2" crossorigin>


</head>
<body class="h-full {{ getDir() }}">
<section
        class="px-[30px] md:px-[90px] py-[40px] md:py-[80px] container m-auto"
>
    <a href="#" class="block relative z-[2] mb-4">
        <img
                src="{{ asset('landing') }}/src/images/logo.svg"
                alt="igts"
                class="md:w-[124px] md:h-[63px] w-[100px] h-[50px]"
        />
    </a>

    <!-- Hero Section -->
    <div class="hero-section grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact Form -->
        <div class="w-full max-w-lg p-8 bg-[#f7f7f7] rounded-lg shadow-md order-2 md:order-1" >
            <h2 class="p-4 text-xl font-bold text-center text-white rounded-t-lg bg-green" >
                {{ trans('website.Keep in touch') }}
            </h2>
            <form class="mt-4 space-y-4" action="{{ concatenateLangToUrl('contact') }}" name="contactform"
                  method="post">
                {{ csrf_field() }}
                <input type="hidden" value="subscripePage" name="source">
                <div>
                    <input type="text" name="name" id="name"  class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           placeholder="{{ trans('website.Name') }}" aria-label="Name"
                           value="{{ auth()->check() ? auth()->user()->fullname_lang : old('name') ?? '' }}" required>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>

                    <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           placeholder="{{ trans('website.title') }}" aria-label="title"
                           value="{{ auth()->check() ? auth()->user()->title_lang : old('title') ?? '' }}" required>
                </div>
                <div>
                    <input type="text" name="email" id="email"  class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           placeholder="{{ trans('website.Email') }}" aria-label="email" required
                           value="{{ auth()->check() ? auth()->user()->email : old('email') ?? '' }}">

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>
                    <select   class="w-full p-3 bg-white border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500" id="country_code" name="country_code" required="required">
                        <option value="">{{trans('account.Select Country')}}</option>
                        <option value="198"> {{trans('website.Saudi Arabia')}} </option>
                        @foreach(allCountries() as $key => $country)

                            <option value="{{$key}}" {{ ((!$errors->has('mobile')) && ((isset($item->country) && $item->country == $key) || (old('country_id') && old('country_id') == $key))) ? 'selected' : '' }}> {{$country}} </option>
                        @endforeach
                    </select>

                    @if ($errors->has('country_code'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('country_code') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>
                    <input type="tel" name="phone" id="phone"  class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500" aria-label="Tel"
                           placeholder="{{ trans('website.Phone') }}" value="{{ old('phone') ?? '' }}">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>

                    <input type="text" name="company_name" id="company_name" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           placeholder="{{ trans('website.company_name') }}" aria-label="company_name"
                           value="{{ old('company_name') }}" required>
                    @if ($errors->has('company_name'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>

                    <select class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500" id="company_size" name="company_size" required="required">
                        <option value="">{{trans('website.Number_of_trainees')}}</option>
                        <option value="0-50">0 - 50</option>
                        <option value="51-100">51 - 100</option>
                        <option value="101-200">101 - 200</option>
                        <option value="+200">+200</option>

                    </select>
                    @if ($errors->has('company_size'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('company_size') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>

                    <input type="text" name="website_url" id="website_url" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           placeholder="{{ trans('website.website_url') }}" aria-label="website_url"
                           value="{{ old('website_url') }}" required>

                    @if ($errors->has('website_url'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('website_url') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>


                    <input type="text" name="subject" id="subject"  class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                           aria-label="subject" placeholder="{{ trans('website.Subject') }}" required
                           value="{{ old('subject') ?? '' }}">

                    @if ($errors->has('subject'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>
                <div>
                    <textarea class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              name="message" id="comments" cols="30" rows="4"
                              aria-label="message" placeholder="{{ trans('website.Message Below') }}"
                              required>{{ old('message') ?? '' }}</textarea>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                        </div>
                    @endif
                </div>

                @if(config('services.recaptcha.key'))
                    <div class="g-recaptcha"
                         data-sitekey="{{config('services.recaptcha.key')}}">
                    </div>
                @endif
                @if ($errors->has('g-recaptcha-response'))
                    <div class="alert alert-danger">
                                <span class='help-block'>
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                    </div>
                @endif
                <div>
                    <div class="g-recaptcha" data-sitekey="your-site-key"></div>
                </div>
                <div>
                    <button type="submit" class="w-full p-3 text-white rounded bg-green hover:bg-blue focus:outline-none focus:ring-2 focus:ring-blue" >
                        {{ trans('website.send now') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Hero Content -->
        <div class="flex flex-col justify-center gap-6 order-1 md:order-2">
            <div class="hero-section__content border-decoration w-full ltr:pl-[22px] rtl:pr-[22px]" >
                <h1 class="hero-section__title text-blue leading-[30px] text-[22px] md:text-[25px] font-bold" >
                    “{{trans('contact.Our Partnership Provides')}}”
                </h1>
            </div>
            <div class="w-full hero-section__description">
                <h2 class="text-black md:text-[20px] leading-[25px] text-[18px]">
                    {{trans('contact.Develop your team with smart training solutions.')}}
                </h2>
                <p class="text-babydark text-[12px] md:text-[14px] mt-[15px] md:mt-0" >
                    <br>
                    {!! trans('contact.Accredited by: NelC, Future X') !!}
                </p>
            </div>
            <img
                    class="rounded-[10px] w-full md:h-[500px] h-full mt-[30px] md:mt-0"
                    src="{{ asset('landing') }}/src/images/team.svg"
                    alt="hero-image"
            />
        </div>
    </div>
</section>

<!-- IGTS numbers Section -->
<section class="py-16 bg-green">
    <div class="flex flex-col items-center justify-center text-center">
        <h3 class="text-white text-[25px] lg:text-[40px] font-bold">
           {{trans('contact.IGTS Achievements')}}
        </h3>
        <p class="text-white text-[14px] mt-[5px]">
            {{trans('contact.We provide a group of selected courses for you')}}
        </p>
    </div>
    <div class="container px-6 mx-auto mt-10 md:px-12">
        <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-4">
            <!-- Item 1 -->
            <div class="flex flex-col items-center">
                <div class="mb-4 text-4xl text-white">
                    <img
                            src="{{ asset('landing') }}/src/images/trust.svg"
                            alt="complete"
                            class="w-[60px] h-[60px]"
                    />
                </div>
                <span
                        class="text-white md:text-[35px] text-[25px] counter"
                        data-target="600"
                >0</span
                >
                <h3 class="mt-2 text-lg font-bold text-white">{{trans('contact.Courses Completed')}}</h3>
{{--                <p class="text-sm text-white">Lorem ipsum dolor sit amet.</p>--}}
            </div>
            <!-- Item 1 -->
            <div class="flex flex-col items-center">
                <div class="mb-4 text-4xl text-white">
                    <img
                            src="{{ asset('landing') }}/src/images/complete.svg"
                            alt="complete"
                            class="w-[60px] h-[60px]"
                    />
                </div>
                <span
                        class="text-white md:text-[35px] text-[25px] counter"
                        data-target="300"
                >0</span
                >
                <h3 class="mt-2 text-lg font-bold text-white">{{trans('contact.Expertise instructor')}}</h3>
{{--                <p class="text-sm text-white">Lorem ipsum dolor sit amet.</p>--}}
            </div>

            <!-- Item 3 -->
            <div class="flex flex-col items-center">
                <div class="mb-4 text-4xl text-white">
                    <img
                            src="{{ asset('landing') }}/src/images/cert.svg"
                            alt="cert"
                            class="w-[60px] h-[60px]"
                    />
                </div>
                <span
                        class="text-white md:text-[35px] text-[25px] counter"
                        data-target="2700"
                >0</span
                >
                <h3 class="mt-2 text-lg font-bold text-white">
                    {{trans('contact.Learning hours')}}
                </h3>
{{--                <p class="text-sm text-white">Lorem ipsum dolor sit amet.</p>--}}
            </div>

            <!-- Item 4 -->
            <div class="flex flex-col items-center">
                <div class="mb-4 text-4xl text-white">
                    <img src="{{ asset('landing') }}/src/images/trust.svg" alt="trust"  class="w-[60px] h-[60px]" />
                </div>
                <span
                        class="text-white md:text-[35px] text-[25px] counter"
                        data-target="300000"
                >0 </span
                >
                <h3 class="mt-2 text-lg font-bold text-white">{{trans('contact.Trust Clients')}}</h3>
{{--                <p class="text-sm text-white">Lorem ipsum dolor sit amet.</p>--}}
            </div>
        </div>
    </div>
</section>

<!-- Our Partners Section -->
<section
        class="our-partners-section bg-white md:mt-[100px] mt-[50px] md:px-[90px] px-[30px] pb-[50px]"
>
    <div class="flex flex-col items-center justify-center text-center">
        <h3 class="text-black text-[25px] lg:text-[40px] font-bold">
            {{trans('contact.Our Partners')}}
        </h3>
        <p class="text-babydark text-[14px] mt-[10px]">
            {{trans('contact.Discover our success partners')}}
        </p>
    </div>

    <div class="partners-section__image relative mt-[60px]">
        <div class="swiper h-[250px]">
            <div class="swiper-wrapper pb-[50px]">
                @foreach ($Partners as $partner)
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="flex p-[50px] items-center justify-center bg-coolgrey md:rounded-full rounded-[10px] md:w-[150px] md:h-[150px] w-full h-full">--}}
{{--                            <img src="{{large1($partner->logo)}}"--}}
{{--                                 alt="{{$partner->title_lang}}"--}}
{{--                                 class="h-[145px] w-[265px]"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="swiper-slide">
                        <div class="flex p-[50px] m-auto items-center justify-center bg-coolgrey md:rounded-full rounded-[10px] md:w-[200px] md:h-[200px] w-full h-full">
                            <img src="{{large1($partner->logo)}}"
                                    alt="{{$partner->title_lang}}"
                                    class=" h-full m-auto"  />
                        </div>
                    </div>
                @endforeach


{{--                <div class="swiper-slide">--}}
{{--                    <div--}}
{{--                            class="flex p-[50px] m-auto items-center justify-center bg-coolgrey md:rounded-full rounded-[10px] md:w-[200px] md:h-[200px] w-full h-full"--}}
{{--                    >--}}
{{--                        <img--}}
{{--                                src="{{ asset('landing') }}/src/images/partneer-logo.svg"--}}
{{--                                alt="partner-image"--}}
{{--                                class="w-full h-full m-auto"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="-bottom-[20px] swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Specialities Section -->
<section class="specialities-section relative mt-[50px] md:px-[90px] px-[30px] md:py-[60px] py-[30px] bg-coolgrey reverse-cols-md grid md:grid-cols-2 grid-cols-1 items-center">
    <div class="Specialities-slider mt-[30px] ltr:pr-0 rtl:pl-0 md:ltr:pr-[50px] md:rtl:pl-[50px]" >
        <div class="swiper md:h-[600px] h-[400px]">
            <div class="swiper-wrapper">


                @foreach($homeCategories as $cats)
                    {{--                    @if(!$cats->childs->isEmpty())--}}
                    <div class="swiper-slide">
                        <div class="relative">
                            <a href="/allcourses/category/{{$cats->slug}}">
                                <img src="{{large1($cats->image)}}"
                                     alt="{{$cats->name_lang}}"
                                     class="object-cover w-full h-full rounded-lg"/>
                                <div class="absolute inset-0 bg-black rounded-lg opacity-50"></div>
                                <h2 class="absolute w-full md:text-lg text-[12px] font-bold text-center text-white bottom-4 px-[10px]">
                                    {{$cats->name_lang}}
                                </h2>
                            </a>
                        </div>
                    </div>
                    {{--                    @endif--}}
                @endforeach

{{--                <div class="swiper-slide">--}}
{{--                    <div class="relative">--}}
{{--                        <img src="{{ asset('landing') }}/src/images/top-courses.png"--}}
{{--                                alt="Child Education"--}}
{{--                                class="object-cover w-full h-full rounded-lg" />--}}
{{--                        <div class="absolute inset-0 bg-black rounded-lg opacity-50" ></div>--}}
{{--                        <h2 class="absolute w-full md:text-lg text-[12px] font-bold text-center text-white bottom-4 px-[10px]" >--}}
{{--                            CHILD EDUCATION--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="block swiper-pagination md:hidden"></div>
        </div>
        <div
                class="items-center justify-center hidden gap-4 rotate-90 md:flex Specialities-slider__buttons"
        >
            <div class="button-prev">
                <img src="{{ asset('landing') }}/src/images/arrow-left.svg" alt="arrow-left" />
            </div>
            <div class="button-next">
                <img src="{{ asset('landing') }}/src/images/arrow-right.svg" alt="arrow-right" />
            </div>
        </div>
    </div>
    <div
            class="md:ltr:pl-[100px] ltr:pl-0 md:rtl:pr-[100px] rtl:pr-0 order-first md:order-last"
    >
        <div class="border-decoration ltr:pl-[22px] rtl:pr-[22px] relative">
            <h2 class="text-black md:text-[40px] text-[25px]">{{trans('website.Specialities')}}</h2>
            <p class="text-babydark md:text-[32px] text-[18px]">
                {{trans('contact.Discover, the powerful specialties')}}
            </p>
        </div>
        <p class="text-babydark md:text-[14px] text-[12px] mt-[21px]">
            {{trans('website.Specialities description')}}
        </p>
    </div>
</section>

<!-- Request a Demo Section -->
<section class="md:mt-[100px] mt-[50px] pb-[100px] md:px-[90px] px-[30px] text-center h-[400px]" >
    <div
            class="bg-blue rounded-[15px] py-[25px] h-full w-full flex items-center justify-center"
    >
        <div class="md:w-[70%] w-[100%] px-[10px]">
            <h2 class="md:text-[40px] text-[28px] font-bold text-white">
                <span class="font-light text-[24px]">{{trans('contact.It’s Time to')}}</span>
                <br />
                {{trans('contact.Grow Your Business')}}
            </h2>

            <a href="#" class="text-white pb-[3px] m-auto mt-[20px] transition ease-in-out bg-green hover:bg-white hover:text-blue w-[265px] h-[55px] flex items-center justify-center rounded-full">
                {{trans('contact.Request a Demo')}}
            </a>
        </div>


    </div>

</section>

<footer class="mt-[40px] text-center md:px-[90px] px-[30px]">
    <!-- Footer Links -->


    <div class="flex justify-center gap-4 mt-6 text-gray-800  flex-col w-full fw-400 flex items-center">

        <p class="text-babydark mt-[14px] text-[18px]">
            {{trans('website.Certified by')}}
        </p>
        <img src="{{ asset('subscription-new/src') }}/images/nec.png" alt="Payments" class="w-[265px] h-full "/>

        <img src="{{ asset('subscription-new/src') }}/images/payments2.png" alt="Payments" class="w-[265px] h-full "/>

        <p class="text-babydark mt-[12px] text-[16px]">
            Powered By <a href="http://igtsservice.com/">IGTS</a>
        </p>
    </div>



{{--  --}}
</footer>



<!-- Script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('landing') }}/src/js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".counter");
        const speed = 50;

        counters.forEach((counter) => {
            const updateCount = () => {
                const target = +counter.getAttribute("data-target");
                const count = +counter.innerText;
                const increment = Math.ceil(target / speed);

                if (count < target) {
                    counter.innerText = count + increment;
                    setTimeout(updateCount, 50);
                } else {
                    counter.innerText = target;
                }
            };

            updateCount();
        });
    });
</script>
{{ Html::script('website/js/sweetalert.min.js') }}




@include('sweet::alert')

</body>
</html>
