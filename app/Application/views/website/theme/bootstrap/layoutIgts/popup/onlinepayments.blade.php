{{-- // payments methods --}}
<div id="PaymentsMethods">
    <div class="spinner-border" id="loading-spinner" style="margin-left: 50%;display:none;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="section_title_1 mt-3 direct-buy-modal-title">
        <h4><i class="fa fa-lock" aria-hidden="true" style="font-size: 33px; margin-right:10px; color: #1f8ebb;"></i> <span style="font-size: 33px;"> {{ trans('website.secure checkout') }} </h4>
    </div>
    <div class="row" style="width: 100%;">


            <div class="col-md-6 item-card rounded-2 payment-method-card-modal visa justify-content-center">
                <a href="javascript: void(0)" onclick="visa('{{json_encode($data)}}')" class="visa">
                    <div class="d-flex justify-content-center visa">
                        <img class="payment-method-image-modal visa" src="{{asset('website/subscriptions')}}/image/new-visa.png">
                    </div>
                    <span class="d-flex justify-content-center mt-2 visa">
                        <strong style="color: #4f4f4f;">{{ trans('website.visa') }}</strong>
                    </span>
                </a>
            </div>


{{--        <div class="col-md-5 item-card rounded-2 payment-method-card-modal fawry">--}}
{{--            <a href="javascript: void(0)" onclick="fawry('{{json_encode($data)}}')" class="fawry">--}}
{{--                <div class="d-flex justify-content-center fawry">--}}
{{--                    <img class="payment-method-image-modal fawry" src="{{asset('website/subscriptions')}}/image/new-fawry.png">--}}
{{--                </div>--}}

{{--                <span class="d-flex justify-content-center mt-2 fawry"><strong style="color: #4f4f4f;">{{ trans('website.fawry') }}</strong></span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <div class="col-md-5 item-card rounded-2 payment-method-card-modal aman">--}}
{{--            <a href="javascript: void(0)" onclick="KioskAman('{{json_encode($data)}}')" class="aman">--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <img class="payment-method-image-modal aman" src="{{asset('website/subscriptions')}}/image/new-aman.png">--}}
{{--                </div>--}}
{{--                <span class="d-flex justify-content-center mt-2 aman"><strong style="color: #4f4f4f;">{{ trans('website.aman') }}</strong></span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <div class="col-md-5 item-card rounded-2 payment-method-card-modal masary">--}}
{{--            <a href="javascript: void(0)" onclick="KioskMasary('{{json_encode($data)}}')" class="masary">--}}
{{--                <div class="d-flex justify-content-center masary">--}}
{{--                    <img class="payment-method-image-modal masary" src="{{asset('website/subscriptions')}}/image/new-masary.png">--}}
{{--                </div>--}}
{{--                <span class="d-flex justify-content-center mt-2 masary"><strong style="color: #4f4f4f;">{{ trans('website.masary') }}</strong></span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <!-- <div class="col-md-5 item-card rounded-2 payment-method-card-modal vodafone">--}}
{{--                                <a href="javascript: void(0)" onclick="vodafone()" class="vodafone">--}}
{{--                                    <div class="d-flex justify-content-center vodafone">--}}
{{--                                        <img class="payment-method-image-modal vodafone" src="{{asset('website/subscriptions')}}/image/new-vodafone.png">--}}
{{--                                    </div>--}}

{{--                                    <span class="d-flex justify-content-center mt-2 vodafone"><strong style="color: #4f4f4f;">{{ trans('website.vodafone') }}</strong></span>--}}
{{--                                </a>--}}
{{--                            </div> -->--}}

{{--        <div class="col-md-5 item-card rounded-2 payment-method-card-modal wallet">--}}
{{--            <a href="javascript: void(0)" onclick="mobileWallet('{{json_encode($data)}}')" class="wallet">--}}
{{--                <div class="d-flex justify-content-center wallet">--}}
{{--                    <img class="payment-method-image-modal wallet" src="{{asset('website/subscriptions')}}/image/new-wallet.png">--}}
{{--                </div>--}}

{{--                <span class="d-flex justify-content-center mt-2 wallet"><strong style="color: #4f4f4f;">{{ trans('website.wallet') }}</strong></span>--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</div>

{{-- //Change Payments Div --}}

<div class="row ml-4 mt-4 mb-4" id="ChangePaymentsDiv" style="display: none;">

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
<div id="FawryDiv" style="display: none;">
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
<div id="KioskAmanDiv" style="display: none;">
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
<div id="KioskMasaryDiv" style="display: none;">
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
<div id="vodafoneDiv" style="display: none;">
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
<div id="mobileWalletDiv" style="display: none;">
    <div class="total">
        <div class="spinner-border" id="loading-spinner-mobile" style="margin-left: 50%;display:none;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <form id="mobileForm" class="login-form form-vertical" name="contactform">
            <div class="input-group">
                <input class="form-control input-item user-login-ico" label="Username" placeholder="ex: 010 xxxxxxxx " name="mobile" id="mobile" required type="tel">
            </div>


            <div class="text-center">
                <p class="pt-20">* Enter Mobile Wallet Number</p>
                <span class="help-block error" id="mobile_form_error" style="display: none;">{{trans('website.please enter a valid number')}}</span>
            </div>

        </form>

        <button onclick="mobileWallet('{{json_encode($data)}}')" class="add-to-cart sign-in">
            {{ trans('website.Buy Now') }}
        </button>

    </div>
</div>