@php
use Illuminate\Support\Facades\Session as Session;

    $VERSION_NUMBER = 1.2;

@endphp

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MEDUO | {{trans('b2b.Business')}} </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('business/subscriptions') }}/css/bootstrap.min.css?v={{$VERSION_NUMBER}}" rel="stylesheet">

    @if(getDir() == "rtl")
      <!-- Custom styles -->
      <link href="{{ asset('business/subscriptions') }}/css/main-rtl.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('business/subscriptions') }}/css/responsive-rtl.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('meduo') }}/css/main-rtl.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('meduo') }}/css/custom-rtl.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
    @else
      <!-- Custom styles -->
      <link href="{{ asset('business/subscriptions') }}/css/main.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('business/subscriptions') }}/css/responsive.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('meduo') }}/css/main.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
      <link href="{{ asset('meduo') }}/css/custom.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    


    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400,700&display=swap" rel="stylesheet">

    @if(getDir() == 'rtl')
        <!-- Bootstrap core CSS -->
            <link href="{{ asset('meduo') }}/css/inner-rtl.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
    @else
        <!-- Bootstrap core CSS -->
            <link href="{{ asset('meduo') }}/css/inner.css?v={{$VERSION_NUMBER}}" rel="stylesheet">
    @endif

    {{ Html::style('css/sweetalert.css') }}

  </head>

  <body role="document">

    <div class="loading flexCenter">
      <div class="loader-logo">
        <div class="loader">Loading...</div>
        <img src="{{ asset('business/subscriptions') }}/images/loading-logo.svg" alt="..." >
      </div>
    </div>

<header class="header-container  fixed-top">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-lg w-100">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('business/subscriptions') }}/images/logo-Ai.png" alt="...">
          <span>{{trans('b2b.Business')}}</span>
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">{{ trans('b2b.Home') }} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features">{{ trans('b2b.About Us') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#plans">{{ trans('b2b.Plans') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">{{ trans('b2b.FAQ') }}</a>
            </li>
           
          </ul>
          <div class="mobileCenter">
          <a class="switcher" href="{{LaravelLocalization::getLocalizedURL((config('app.locale') == 'en') ? 'ar':'en') }}">{{trans('website.other lang')}} </a>
          </div>

          <div class="mobileCenter">
            @if(Auth::check() && Auth::user()->businessdata && isValidBusiness(Auth::user()->businessdata->id))
              <a class="solid_btn ml-20" href="/business/home">{{trans('b2b.Dashboard')}}</a>
            @else
              <a class="solid_btn ml-20" href="#plans">{{trans('b2b.Subscribe Now')}}</a>
            @endif
          </div>
          
        </div>
      </nav>
    </div>
  </div>
</header>

<section class="hero-section" id="home">
  <div class="container-fluid p-0">
    <img src="{{ asset('business/subscriptions') }}/images/hero_img.jpg" class="w-100 fit-image"  alt="..." >

      <div class="w-60 content_area">
        <h1>
          {{trans('b2b.Build Your')}}
          <br>
          {{trans('b2b.Critical Skills')}}
        </h1>
        <h2>{{trans('b2b.Achieve Your Business Goals')}}</h2>
  
        <p>
          {{trans('website.Footer Meduo')}}
        </p>
        <div class="mt-40">
        @if(Auth::check() && Auth::user()->businessdata && isValidBusiness(Auth::user()->businessdata->id))
        <a href="/business/home" class="solid_btn">{{trans('b2b.Dashboard')}}</a>
        @else
        <a href="#plans" class="solid_btn">{{trans('b2b.Subscribe Now')}}</a>
        @endif
        </div>
       </div>

  </div>
</section>

<section class="features" id="features">
  <div class="container">
    <h2 class="feat-title">{{trans('b2b.WHY MEDUO?')}}</h2>
    <div class="row">
      <div class="col-lg-6 col-md-6 flexCenter">
        <img src="{{ asset('business/subscriptions') }}/images/feat.svg" class="w-100 mb-mobile-50" alt="..." />
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-1.svg" alt="..." />
          <p>
            {{trans('b2b.Accredited Certifications')}}
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-2.svg" alt="..." />
          <p>
            {{trans('b2b.Certificate Of Completion')}}
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-3.svg" alt="..." />
          <p>
            {{trans('b2b.All Specialties in Healthcare')}} 
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-4.svg" alt="..." />
          <p>
            {{trans('b2b.7000+ Videos')}}
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-7.svg" alt="..." />
          <p>
            {{trans('b2b.700+ Hours')}}
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-5.svg" alt="..." />
          <p>
            {{trans('b2b.New Video Every Week')}}
          </p>
        </div>
        <div class="feature-item flexLeft">
          <img src="{{ asset('business/subscriptions') }}/images/icon-6.svg" alt="..." />
          <p>
            {{trans('b2b.Downloadable Materials')}}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

@if(Auth::check() && Auth::user()->businessdata && isValidBusiness(Auth::user()->businessdata->id))

@else
<input type="hidden" id="numberOfUsersLimit" value="{{$numberOfUsersLimit}}">
<section class="plans" id="plans">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 plan-content flexCenter">
        <div class="mb-4 sub-plans-desc-container">
          <h2>{{trans('b2b.OUR PLANS')}}</h2>
          <p>{{trans('b2b.OUR PLANS Description')}}.</p>
          <br>
          <p>{{trans('b2b.NUMBER OF USERS')}}</p>
          <h2 class="pt-4">{{trans('b2b.Need more users?')}}</h2>
          <a href="javascript:void(0)" class="solid_btn_reverse" data-dismiss="modal" data-toggle="modal" data-target="#contactUsModal">{{trans('b2b.Contact us now')}}</a>

          <!--Input Form1-->
          <!-- <div class="input-group customSpinner pb-4">
            <div class="input-group-prepend">
              <button class="btn btn-primary spinnerbutton spinnerMinus spinner-roundbutton" style="background-color: #000">
                  <span class = "fa fa-minus"></span>
                </button>
            </div>
            <input id="users-spinner" type="number" readonly value="5" class="form-control spinnerVal spinner-roundVal text-center" />
            <div class="input-group-append">
              <button class="btn btn-primary spinnerbutton spinnerPlus spinner-roundbutton" style="background-color: #000">
                  <span class = "fa fa-plus"></span>
                </button>
            </div>
          </div> -->
        </div>
      </div>  
      <div class="col-lg-7">
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-5">
          
            <div class="plan-card">

              <h3>{{trans('b2b.MONTHLY')}}</h3>
              <img class="mt-5" src="{{ asset('business/subscriptions') }}/images/monthly-icon.svg" alt="..." />
              <div class="mt-5 mb-5">
                @if(Auth::check())
                  <a id="monthlySubBtn" data-monthlyFees="{{$monthlyPrice}}" href="javascript:void(0)" class="solid_btn" data-dismiss="modal" data-toggle="modal" data-target="#directBuyModal">{{trans('b2b.Subscribe Now')}}</a>
                @else
                  <a href="javascript:void(0)" class="solid_btn" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal">{{trans('b2b.Signup to subscribe')}}</a>
                @endif
              </div>
  
              <div class="flexBetween card-footer">
                <div class="price final-price">
                    <p class="monthlyPrice">{{$monthlyPrice}}</p>
                    <span>{{ getCurrency()->currency_code }}</span>
                </div>
                <div class="discount">
                  <div class="price before-discount-price">
                    <p>{{$monthlyPerUser}}</p>
                    <span>{{getCurrency()->currency_code}}</span>
                  </div>
                  <div class="save-percent">
                    {{trans('b2b.Per User')}}
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-6 col-md-6">
            <div class="plan-card">
              <div class="recommend">
                {{trans('b2b.Recommended')}}
              </div>
              <h3>{{trans('b2b.ANNUAL')}}</h3>
              <img class="mt-5" src="{{ asset('business/subscriptions') }}/images/annual-icon.svg" alt="..." />
              <div class="mt-5 mb-5">
                @if(Auth::check())
                  <a id="annualSubBtn" data-annualFees="{{$annualPrice * 12}}" href="javascript:void(0)" class="solid_btn" data-dismiss="modal" data-toggle="modal" data-target="#directBuyModal">{{trans('b2b.Subscribe Now')}}</a>
                @else
                  <a href="javascript:void(0)" class="solid_btn" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal">{{trans('b2b.Signup to subscribe')}}</a>
                @endif
              </div>
  
              <div class="flexBetween card-footer">
                <div class="price final-price">
                    <p class="annualPriceOutter">{{$annualPrice}}</p>
                    <span>{{getCurrency()->currency_code}}</span>
                </div>
                <div class="discount">
                  <div class="price before-discount-price">
                    <p>{{$annualPerUser}}</p>
                    <span>{{getCurrency()->currency_code}}</span>
                  </div>
                  <div class="save-percent">
                    {{trans('b2b.Per User')}}
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
@endif



<section class="faq" id="faq">
  <div class="container">
    <h2>{{trans('b2b.FAQ')}}</h2>
    <p>
      {{trans('b2b.FAQ Description')}}
    </p>

    <div class="accordion" id="faq-accordion">
      <div class="card">
          <div class="card-header" id="faqhead2">
              <a href="#" class="btn-header-link" data-toggle="collapse" data-target="#faq2"
              aria-expanded="true" aria-controls="faq2">{{trans('b2b.Q2')}}</a>
          </div>

          <div id="faq2" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq-accordion">
              <div class="card-body">
                  {{trans('b2b.Q2 Answer')}}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead3">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
              aria-expanded="true" aria-controls="faq3">{{trans('b2b.Q3')}}</a>
          </div>

          <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq-accordion">
              <div class="card-body">
                  {{trans('b2b.Q3 Answer')}}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead4">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
              aria-expanded="true" aria-controls="faq4">{{trans('b2b.Q4')}}</a>
          </div>

          <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq-accordion">
              <div class="card-body">
                  {{trans('b2b.Q4 Answer')}}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead5">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
              aria-expanded="true" aria-controls="faq5">{{trans('b2b.Q5')}}</a>
          </div>

          <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq-accordion">
              <div class="card-body">
                  {{trans('b2b.Q5 Answer')}}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead6">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
              aria-expanded="true" aria-controls="faq6">{{trans('b2b.Q6')}}</a>
          </div>

          <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq-accordion">
              <div class="card-body">
                  {!!trans('b2b.Q6 Answer')!!}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead8">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq8"
              aria-expanded="true" aria-controls="faq8">{{trans('b2b.Q8')}}</a>
          </div>

          <div id="faq8" class="collapse" aria-labelledby="faqhead8" data-parent="#faq-accordion">
              <div class="card-body">
                  {!!trans('b2b.Q8 Answer')!!}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead9">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq9"
              aria-expanded="true" aria-controls="faq9">{{trans('b2b.Q9')}}</a>
          </div>

          <div id="faq9" class="collapse" aria-labelledby="faqhead9" data-parent="#faq-accordion">
              <div class="card-body">
                  {!!trans('b2b.Q9 Answer')!!}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead10">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq10"
              aria-expanded="true" aria-controls="faq10">{{trans('b2b.Q10')}}</a>
          </div>

          <div id="faq10" class="collapse" aria-labelledby="faqhead10" data-parent="#faq-accordion">
              <div class="card-body">
                  {!!trans('b2b.Q10 Answer')!!}
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-header" id="faqhead11">
              <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq11"
              aria-expanded="true" aria-controls="faq11">{{trans('b2b.Q11')}}</a>
          </div>

          <div id="faq11" class="collapse" aria-labelledby="faqhead11" data-parent="#faq-accordion">
              <div class="card-body">
                  {!!trans('b2b.Q11 Answer')!!}
              </div>
          </div>
      </div>
  </div>


  </div>
</section>



@include(layoutFooter('website'))



    <!-- Bootstrap core JavaScript  -->
    
    {{ Html::script('js/sweetalert.min.js') }}

    <script src="{{ asset('business/subscriptions') }}/js/jquery-3.6.0.min.js?v={{$VERSION_NUMBER}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js?v={{$VERSION_NUMBER}}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('business/subscriptions') }}/js/bootstrap.min.js?v={{$VERSION_NUMBER}}"></script>
    <script src="{{ asset('business/subscriptions') }}/js/script.js?v={{$VERSION_NUMBER}}"></script>
    <script src="{{ asset('meduo') }}/js/custom.js?v={{$VERSION_NUMBER}}"></script>
    
  </body>
</html>

@if(Auth::check())
  @php 
    $data['test'] = null;
  @endphp
<div class="modal fade" id="directBuyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <img class="mt-5" src="{{asset('business/subscriptions')}}/images/annual-icon.svg" alt="...">
                    <div class="flexBetween card-footer">
                      <div class="price final-price">
                          <p class="annualPriceInner">{{$annualPrice * 12}}</p>
                          <span>{{getCurrency()->currency_code}}</span>
                      </div>
                      <div class="discount">
                        <div class="price before-discount-price">
                          <p>{{$annualPerUser}}</p>
                          <span>{{getCurrency()->currency_code}}</span>
                        </div>
                        <div class="save-percent">
                          {{trans('b2b.Per User')}}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="plan-card" id="monthly-plan-card">
                    
                    <h3>{{trans('b2b.MONTHLY')}}</h3>
                    <img class="mt-5" src="{{asset('business/subscriptions')}}/images/monthly-icon.svg" alt="...">
                    <div class="flexBetween card-footer">
                      <div class="price final-price">
                          <p class="monthlyPrice">{{$monthlyPrice}}</p>
                          <span>{{getCurrency()->currency_code}}</span>
                      </div>
                      <div class="discount">
                        <div class="price before-discount-price">
                          <p>{{$monthlyPerUser}}</p>
                          <span>{{getCurrency()->currency_code}}</span>
                        </div>
                        <div class="save-percent">
                          {{trans('b2b.Per User')}}
                        </div>
                      </div>
                    </div>
                  </div>

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


<div class="modal fade" id="contactUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flexRight">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black; font-weight: bold; font-size: 35px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 p-0 flexRight">
            <div class="col-md-12 form-container">
              @include('website.theme.bootstrap.layout.blocks.contactus-form')
            </div>
            </div>
            <div class="modal-footer p-0 p-0 flexRight" style="border: none;">
                <br>
            </div>
        </div>
    </div>
</div>

@if(Session::get('contactError') )
<script>$('#contactUsModal').modal('show');</script>
@php Session::pull('contactError'); @endphp
@endif