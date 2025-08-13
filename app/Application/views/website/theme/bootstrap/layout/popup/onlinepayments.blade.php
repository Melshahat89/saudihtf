{{-- // payments methods --}}
<div id="PaymentsMethods">
    <div class="spinner-border" id="loading-spinner" style="margin-left: 50%;display:none;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="section_title_1 mt-3 direct-buy-modal-title">
        <h4><i class="fa fa-lock" aria-hidden="true" style="font-size: 33px; margin-right:10px; color: #1f8ebb;"></i> <span style="font-size: 33px;"> {{ trans('website.secure checkout') }} </h4>
    </div>
    <div class="row" style="width: 100%;">


            <div class="col-md-5 item-card rounded-2 payment-method-card-modal visa justify-content-center">
                <a href="javascript: void(0)" onclick="visa('{{json_encode($data)}}')" class="visa">
                    <div class="d-flex justify-content-center visa">
                        <img class="payment-method-image-modal visa" src="{{asset('website/subscriptions')}}/image/new-visa.png">
                    </div>
                    <span class="d-flex justify-content-center mt-2 visa">
                        <strong style="color: #4f4f4f;">{{ trans('website.visa') }}</strong>
                    </span>
                </a>
            </div>


        <div class="col-md-5 item-card rounded-2 payment-method-card-modal hyperpay">
            <a href="javascript: void(0)" onclick="hyperpay('{{json_encode($data)}}')" class="hyperpay">
                <div class="d-flex justify-content-center hyperpay">
                    <img class="payment-method-image-modal hyperpay" src="{{asset('subscription-new')}}/src/images/payments2.png">
                </div>

                <span class="d-flex justify-content-center mt-2 hyperpay">
                    <strong style="color: #4f4f4f;">{{ trans('website.hyperpay') }}</strong>
                </span>
            </a>
        </div>

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
{{-- //hyperpay Div --}}
<div id="hyperpayDiv" style="display: none;">
    <form action="{{url('payments/verify/hyperpay')}}" class='paymentWidgets' data-brands="MADA"></form>
</div>

<script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=CC574C0788637C98138C590EADC478E0.uat01-vm-tx02"></script>
<script type='text/javascript'>
    const subTotalAmount = parseFloat(24346);
    const shippingAmount = 0;
    const taxAmount = 0;
    const currency = "SAR";
    const applePayTotalLabel = "";

    function getAmount() {
        return ((subTotalAmount + shippingAmount + taxAmount)).toFixed(2);
    }
    function getLineItems() {
        return [{
            label: 'Subtotal',
            amount: (subTotalAmount).toFixed(2)
        }, {
            label: 'Shipping',
            amount: (shippingAmount).toFixed(2)
        }, {
            label: 'Tax',
            amount: (taxAmount).toFixed(2)
        }];
    }

    const wpwlOptions = {
        locale: "ar",
        applePay: {
            displayName: "",
            total: {
                label: ""
            },
            paymentTarget:'_top',
            merchantCapabilities: ['supports3DS'],
            supportedNetworks: ['mada','masterCard', 'visa' ],
            supportedCountries: ['SA'],
        }
    };
    wpwlOptions.createCheckout = function() {
        return $.post("{{url('payments/verify/hyperpay')}}")
            .then(function(response) {
                return response.checkoutId;
            });
    };
</script>
