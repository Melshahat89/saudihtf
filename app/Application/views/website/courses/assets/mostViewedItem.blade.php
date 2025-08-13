<div class="d-flex justify-content-center">
    @php $discountApplied = 0; @endphp
    @if(userCountry()['code'] == "EG")
        @if($data->discount_egp > 0)
            @php $discountApplied = 1; @endphp
            <div class="course_card item promoted-course" style="--colorcode: {{isset($data->categories->color_code) ? $data->categories->color_code : '#18B289'}}" data-awards="{{$data->discount_egp}}% {{trans('home.discount')}}">
        @else
            <div class="course_card">
        @endif

    @else

        @if($data->discount_usd > 0)
            @php $discountApplied = 1; @endphp
            <div class="course_card item promoted-course" style="--colorcode: {{isset($data->categories->color_code) ? $data->categories->color_code : '#18B289'}}" data-awards="{{$data->discount_usd}}% {{trans('home.discount')}}">
        @else
            <div class="course_card">

        @endif
    @endif
        <a href="/courses/view/{{$data->slug}}">
            <span class="course_card_img">
                <img src="{{ medium($data->image) }}" loading="lazy" class="{{ ($discountApplied) ? 'discount-applied' : '' }}" style="height: 200px; object-fit: cover;">
                <div class="play_icon"><i class="fas fa-play"></i></div>
            </span>
            <div class="course_card_detail_name p-2 pm0 ellipse two-lines" title="{{$data->title_lang}}">{{$data->title_lang}}</div>
            <div class="course_card_detail">
                <div class="course_card_rating_price p-2">
                    <div class="course_card_price d-flex justify-content-between w-100">
                        <div>
                            <i class="fas fa-eye visits">
                                <span>
                                    +{{ ($data->visits >= 1000 && $data->visits < 1000000) ? (number_format($data->visits / 1000, 0) . 'K') : (($data->visits >= 1000000) ? (number_format($data->visits / 1000000, 0) . 'M'  ) : $data->visits) }}
                                </span>
                            </i>
                        </div>
                        <div class="jq_rating jq-stars d-none" data-options='{"initialRating":<?php  echo '5'; ?>, "readOnly":true, "starSize":15}'><small class="text_muted pt-2">(<?php  echo '5'; ?>)</small></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
