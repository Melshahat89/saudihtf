@if (auth()->check())
    <div class="" style="margin: 40px;">
        <div class="row">
            <div class="col-md-12">
                <form class="coupon" action="{{ concatenateLangToUrl('site/insertCoupon') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if(isset($type) AND $type == App\Application\Model\Promotionactive::TYPE_B2C)
                        @php
                            $promoCode = getCurrentPromoCode(null, \App\Application\Model\Promotionactive::TYPE_B2C);
                        @endphp
                    @else
                        @php
                            $promoCode = getCurrentPromoCode();
                        @endphp
                    @endif

                    @if($promoCode)
                        <div class="text-right">
                            <label> {{ trans('website.Coupon Applied, Click to remove') }} </label>
                            <br>
                            <a href="{{ url('/removePromo') }}" class="add-to-cart">
                                "   <b>{{ $promoCode['promotions']['code'] }}</b> "
                                {{ trans('website.Applied Now')  }}
                            </a>
                        </div>
                    @else
                        <div class="input-group mb-20">
                            <label style="font-weight: bold;color:black;">
                                {{ trans('website.Do you have a discount coupon?') }}
                            </label>
                            <br>
                            <div style="display: contents;">
                                <input class="coupons form-control input-item" required name="code" aria-label='coupon' placeholder='{{ trans('website.Add Coupon Code') }}'>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="add-to-cart" style="">
                                {{ trans('website.Add') }}
                            </button>
                        </div>
                    @endif
                </form>
                <div id="promotionAlert"></div>
            </div>
        </div>
    </div>
@endif
