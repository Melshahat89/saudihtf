@extends(layoutBusiness())
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
    <style>
        .payment-method-card-modal {
            height: 150px;
            margin: 5px;
            margin-left: 46px;
        }
        .justify-content-center {
            -webkit-box-pack: center!important;
            justify-content: center!important;
        }
        .d-flex {
            display: -webkit-box!important;
            display: flex!important;
        }
        .payment-method-image-modal {
            width: 87%;
            padding-top: 15px;
        }
    </style>
    <link href="{{ asset('business/subscriptions') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('business/subscriptions') }}/css/responsive.css" rel="stylesheet">


    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.newLicense') }}</h3>
        </div>

        <div class="panel-body">
            <div>
            <?php $amount = 0;  ?>

                @if($type == 'annual')
                    <div class="plan-card" id="annual-plan-card">
                        <h3>Annual</h3>
                        <img class="mt-5" src="{{asset('business/subscriptions')}}/images/annual-icon.svg" alt="...">
                        <div class="flexBetween card-footer">
                            <div class="price final-price">
                                <p id="annualPrice">{{ round($data['annualPrice'] * $remaining,2)}}</p>
                                <span>{{getCurrency()->currency_code}}</span>
                            </div>
                            <div class="discount">
                                <div class="price before-discount-price">
                                    <p>{{$data['annualPerUser']}}</p>
                                    <span>{{getCurrency()->currency_code}}</span>
                                </div>
                                <div class="save-percent">
                                    User/Month
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $amount =  round($data['annualPrice'] * $remaining,2); ?>
                @else
                    <div class="plan-card" id="monthly-plan-card">

                        <h3>Monthly</h3>
                        <img class="mt-5" src="{{asset('business/subscriptions')}}/images/monthly-icon.svg" alt="...">
                        <div class="flexBetween card-footer">
                            <div class="price final-price">
                                <p id="annualPrice">{{round($data['monthlyPrice'] * $remaining,2) }}</p>
                                <span>{{getCurrency()->currency_code}}</span>
                            </div>
                            <div class="discount">
                                <div class="price before-discount-price">
                                    <p>{{$data['monthlyPerUser']}}</p>
                                    <span>{{getCurrency()->currency_code}}</span>
                                </div>
                                <div class="save-percent">
                                    User/Month
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $amount =  round($data['monthlyPrice'] * $remaining,2); ?>
                @endif

                <input type="hidden" id="subscriptionType" name="subscription-type" value="{{ ($type == 'annual') ? '2' : '1' }}">
                <input type="hidden" id="numberOfLicenses" name="number-licenses" value="{{$noLicense}}">
                <input type="hidden" id="newLicensesAmount" name="new-licenses-amount" value="{{$amount}}">;

                {{-- // payments methods --}}
                <div id="PaymentsMethods" class="row panel-body">
                    <div class="spinner-border" id="loading-spinner" style="margin-left: 50%;display:none;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="panel-heading section_title_1 mt-3 direct-buy-modal-title">
                        <h4><i class="fa fa-lock" aria-hidden="true" style="font-size: 33px; margin-right:10px; color: #1f8ebb;"></i> <span style="font-size: 33px;"> {{ trans('website.secure checkout') }} </h4>
                    </div>
                    <div class="row" style="width: 100%;">

                        <div class="col-md-5 item-card rounded-2 payment-method-card-modal visa">
                            <a href="javascript: void(0)" onclick="visa({{$noLicense}})" class="visa">
                            <div class="d-flex justify-content-center visa">
                                <img class="payment-method-image-modal visa" src="{{ asset('meduo') }}/images/new-visa.png">
                            </div>
                            <span class="d-flex justify-content-center mt-2 visa"><strong style="color: #4f4f4f;">{{ trans('website.visa') }}</strong></span>
                            </a>
                        </div>

                        <div class="col-md-5 item-card rounded-2 payment-method-card-modal fawry">
                            <a href="javascript: void(0)" onclick="fawry({{$noLicense}})" class="fawry">
                                <div class="d-flex justify-content-center fawry">
                                    <img class="payment-method-image-modal fawry" src="{{ asset('meduo') }}/images/new-fawry.png">
                                </div>

                                <span class="d-flex justify-content-center mt-2 fawry"><strong style="color: #4f4f4f;">{{ trans('website.fawry') }}</strong></span>
                            </a>
                        </div>


                        <div class="col-md-5 item-card rounded-2 payment-method-card-modal aman">
                            <a href="javascript: void(0)" onclick="KioskAman({{$noLicense}})" class="aman">
                                <div class="d-flex justify-content-center aman">
                                    <img class="payment-method-image-modal aman" src="{{ asset('meduo') }}/images/new-aman.png">
                                </div>
                                <span class="d-flex justify-content-center mt-2 aman"><strong style="color: #4f4f4f;">{{ trans('website.aman') }}</strong></span>
                            </a>
                        </div>

                        <div class="col-md-5 item-card rounded-2 payment-method-card-modal masary">
                            <a href="javascript: void(0)" onclick="KioskMasary({{$noLicense}})" class="masary">
                                <div class="d-flex justify-content-center masary">
                                    <img class="payment-method-image-modal masary" src="{{ asset('meduo') }}/images/new-masary.png">
                                </div>
                                <span class="d-flex justify-content-center mt-2 masary"><strong style="color: #4f4f4f;">{{ trans('website.masary') }}</strong></span>
                            </a>
                        </div>


                        <div class="col-md-5 item-card rounded-2 payment-method-card-modal wallet">
                            <a href="javascript: void(0)" onclick="mobileWallet({{$noLicense}})" class="wallet">
                                <div class="d-flex justify-content-center wallet">
                                    <img class="payment-method-image-modal wallet" src="{{ asset('meduo') }}/images/new-wallet.png">
                                </div>

                                <span class="d-flex justify-content-center mt-2 wallet"><strong style="color: #4f4f4f;">{{ trans('website.wallet') }}</strong></span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- //Change Payments Div --}}
<div class="row">
                <div class="row ml-4 mt-4 mb-4" id="ChangePaymentsDiv" style="display: none;padding: 20px;">

                    <div class="col-md-3">
                        <strong style="color: black;">{{ trans('website.payment method') }}</strong>
                    </div>

                    <div class="col-md-9">
                        <a href="javascript: void(0)" onclick="changeMethod()">{{ trans('website.choose another payment method') }}</a>
                    </div>


                </div>
                {{-- //Visa Div --}}
                <div id="VisaDiv" style="display: none;">
                    <iframe style="height: 585px; width:-webkit-fill-available;" name="iframe1" id="visaiframe" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay" oncontextmenu="return false"></iframe>
                </div>

                {{-- //Fawry Div --}}
                <div id="FawryDiv" style="display: none;padding: 20px;">
                    <div class="total">
                        <h3 style="font-size: 30px;">
                            <strong>
                                {{ trans('website.Thank You')  }} "{{ Auth::user()->firstname_lang }}"
                            </strong>
                        </h3>
                        <br>

                        {!! trans('website.Fawry Payment Tips') !!}

                        <br>
                        <br>
                        <h4><strong> {{ trans('website.bill reference') }} : </strong></h4>
                        <h1>
                            <div id="FawryDivReference"></div>
                        </h1>

                    </div>
                </div>

                {{-- //KioskAman Div --}}
                <div id="KioskAmanDiv" style="display: none;padding: 20px;">
                    <div class="total">
                        <h3 style="font-size: 30px;">
                            <strong>
                                {{ trans('website.Thank You')  }} "{{ Auth::user()->firstname_lang }}"
                            </strong>
                        </h3>
                        <br>

                        {!! trans('website.Kiosk Aman Steps') !!}

                        <br>
                        <br>
                        <h4><strong> {{ trans('website.bill reference') }} : </strong></h4>
                        <h1>
                            <div id="KioskAmanDivReference"></div>
                        </h1>

                    </div>
                </div>

                {{-- //KioskMasary Div --}}
                <div id="KioskMasaryDiv" style="display: none;padding: 20px;">
                    <div class="total">
                        <h3 style="font-size: 30px;">
                            <strong>
                                {{ trans('website.Thank You')  }} "{{ Auth::user()->firstname_lang }}"
                            </strong>
                        </h3>
                        <br>

                        {!! trans('website.Kiosk Masary Steps') !!}

                        <br>
                        <br>
                        <h4><strong> {{ trans('website.bill reference') }} : </strong></h4>
                        <h1>
                            <div id="KioskMasaryDivReference"></div>
                        </h1>

                    </div>
                </div>

                {{-- //vodafone Div --}}
                <div id="vodafoneDiv" style="display: none;padding: 20px;">
                    <div class="total">
                        <h3 style="font-size: 30px;">
                            <strong>
                                {{ trans('website.Thank You')  }} "{{ Auth::user()->firstname_lang }}"
                            </strong>
                        </h3>
                        <br>

                        {!! trans('website.a Vodafone Cash Wallet') !!}

                        <div class="container text-center">
                            <a class="view-more-section" id="directHasWallet" href="javascript: void(0)" onclick="mobileWallet()">
                                {{ trans('website.Buy Now') }}
                            </a>
                        </div>


                        <br>

                        {!! trans('website.Vodafone Cash Steps') !!}
                        <br>
                        <br>

                    </div>
                </div>

                {{-- //mobileWallet Div --}}
                <div id="mobileWalletDiv" style="display: none;padding: 20px;">
                    <div class="total">
                        <div class="spinner-border" id="loading-spinner-mobile" style="margin-left: 50%;display:none;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <form id="mobileForm" class="login-form form-vertical" onsubmit="return validateForm(this)" name="contactform" method="post">
                            {{ csrf_field() }}

                            <div class="input-group" style="width: 100%;">
                                <input class="form-control input-item user-login-ico" label="Username" placeholder="ex: 010 xxxxxxxx " name="mobile" id="mobile" required type="tel">
                            </div>
                            <span class="help-block error" id="mobile_form_error" style="display: none"></span>

                            <div class="text-center" style="padding: 20px;">

                                <button type="submit" class="add-to-cart sign-in">

                                    {{ trans('website.Buy Now') }}
                                </button>


                                <p class="pt-20">* Enter Mobile Wallet Number</p>

                            </div>

                        </form>

                    </div>
                </div>
</div>

            </div>


        </div>
    </div>
    <script src="{{ asset('business/subscriptions') }}/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('business/subscriptions') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('business/subscriptions') }}/js/script2.js?v=1.1"></script>

@endsection
