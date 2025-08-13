@php $discountApplied = 0; @endphp
@if(userCountry()['code'] == "EG")
	@if($data->discount_egp > 0)
		@php $discountApplied = 1; @endphp
		<div class="course_card item promoted-course" style="min-width: 100%;--colorcode: {{isset($data->categories->color_code) ? $data->categories->color_code : '#18B289'}}" data-awards="<?php echo round($data->discount_egp) ?>% {{trans('home.discount')}}">
	@else
		<div class="course_card" style="min-width: 100%;">
    @endif

@else
	@if($data->discount_usd > 0)
		@php $discountApplied = 1; @endphp
        <div class="course_card item promoted-course" style="min-width: 100%;--colorcode: {{isset($data->categories->color_code) ? $data->categories->color_code : '#18B289'}}" data-awards="<?php echo round($data->discount_usd) ?>% {{trans('home.discount')}}">
    @else
        <div class="course_card" style="min-width: 100%;">

    @endif
@endif		<a href="/courses/view/<?php echo $data->slug?>">
			<span class="course_card_img">
			<img src="{{ medium($data->image) }}" loading="lazy" class="{{ ($discountApplied) ? 'discount-applied' : '' }}" style="height: 200px; width: 100%; object-fit: cover;">
				<div class="play_icon"><i class="fas fa-play"></i></div>
			</span>

			<div class="course_card_detail_name p-2 pm0 ellipse two-lines">
				{{$data->title_lang}}
			</div>

			<div class="course_card_detail card-content-height">
				<div class="course_card_rating_price p-2">
{{--					<div class="course_card_price align-items-center"> {!! $data->PriceText !!}</div>--}}
					<div class="course_card_price home-bestlearning-visits"> 
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