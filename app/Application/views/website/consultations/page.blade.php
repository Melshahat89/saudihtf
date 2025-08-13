@extends(layoutExtend('website'))
@section('title')
{{ trans('consultation.consultation') }}
@endsection
@section('description')
{{ trans('home.HomeDescription') }}
@endsection
@section('keywords')
{{ trans('home.HomeKeywords') }}
@endsection
@section('content')

<div class="bread-crumb">
    <div class="wrapper">
        <a href="#"><?=  $item->consultationcategories->name_lang ?> </a> > <span><?= $item->title_lang ?></span>
    </div>
</div>


<main class="main_content">
    <div class="course_detail" id="course_detail">
        <section class="bb course_detail_header">
            <div class="video_wrapper">
                <div>
                    <div class="course_detail_title mbsm">
                        <h1>{{$item->title_lang}}</h1>
                    </div>
                    <div class="user_name mt-4 mb-4">
                        <img src="{{ large1($item->consultant->image) }}" style="height: 40px;">
                        &nbsp;
                        {{$item->consultant->Fullname_lang}}
                    </div>
                    <!-- <span class="pt-4">{{$item->consultant->title_lang}}</span> -->

                    <h3>{!! $item->PriceText !!} | 60 {{trans('consultations.minute')}}</h3>
                    {{-- @if($item->ConsultationRating) --}}
                    <div class="course_detail_rating mbsm {{isMobile() ? 'd-flex justify-content-between' : ''}}">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":{{$item->ConsultationRating}}, "readOnly":true, "starSize":19}'></div>
                        <span class="mr-2 ml-2">{{ round($item->ConsultationRating, 1) }} ( {{ $item->ConsultationCountRating}} {{trans('courses.ratings')}} )</span>
                    </div>
                    {{-- @endif --}}
                    <div class="course_price_actions mtmd">
                        <div class="course_ad_to_cart">
                            @if(Auth::check())
                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#directBuyModal" class="button button_primary button_large">
                                {{trans('consultations.Book Now')}}
                            </a>
                            @else
                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary button_large">
                                {{trans('consultations.Book Now')}}
                            </a>
                            @endif
                            <a href="/consultant/view/{{$item->consultant->slug}}" class="button button_primary button_large">
                                {{trans('consultations.View Profile')}}
                            </a>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="flowplayer-embed-container videoContainer pt-4 row" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width:100%;">
                        <img src="{{ large1($item->image) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>
        </section>

        <section class="sec sec_pad_top_sm sec_pad_bottom_sm">
            <div class="wrapper">
                <div class="course_detail_content">

                    <!-- course_detail_content -->
                    <div class="col-md-12">
                        <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_gools">
                            <div class="title mbmd">
                                <h2 class="text_primary text_capitalize">{{ trans('consultations.about consultation') }}</h2>
                            </div>
                            <div class="text mbmd pr-3 pl-3">
                                {!! $item->description_lang !!}
                            </div>

                            @if($item->consultant->description_lang)
                            <div class="title mbmd">
                                <h2 class="text_primary text_capitalize">{{ trans('consultations.about consultant') }}</h2>
                            </div>
                            <div class="text mbmd pr-3 pl-3">
                                {!! $item->consultant->description_lang !!}
                            </div>
                            @endif

                        </section>

                        <section class="sec sec_pad_top_sm sec_pad_bottom_sm d-none" id="learning-adv-section">
                            <div class="accordion accordion_list">
                                <div class="card">
                                    <div class="card_header">
                                        <button data-toggle="collapse" data-target="#learning-adv" aria-expanded="true" aria-controls="coll_1" class="d-flex justify-content-between" style="background-color: #326478; color: white;">
                                            <span class="card_header_title">مزايا الدراسة في IGTS</span>
                                            <i class="fa mr-10 fa-plus" aria-hidden="true" style="place-self: center;"></i>
                                        </button>
                                    </div>
                                    <div id="learning-adv" class="panel_collapse collapse">
                                        <div class="card_body">
                                            <div class="card p-3">
                                                فريق محاضرين الافضل فى مجالاتهم بالوطن العربى
                                            </div>
                                            <div class="card p-3">
                                                جودة المادة العلمية المقدمة و تطوير مناهجنا باستمرار مجانا
                                            </div>
                                            <div class="card p-3">
                                                بمجرد اشتراكك يتاح لك الدخول على الدورات مدى الحياة
                                            </div>
                                            <div class="card p-3">
                                                القدرة على تقييم نفسك من خلال اختبار بعد كل مستوى و دورة
                                            </div>
                                            <div class="card p-3">
                                                سهولة التواصل مع المحاضر اى وقت مباشرة من خلال الاكونت الخاص بك
                                            </div>
                                            <div class="card p-3">
                                                نعمل فى اكثر من 22 دوله بالشرق الاوسط و شمال افريقيا
                                            </div>
                                            <div class="card p-3">
                                                المحتوى المقدم باللغة العربية مع سهولة استخدام المنصة
                                            </div>
                                            <div class="card p-3">
                                                تواصل مستمر و خدمة عملاء 24 ساعة طوال الوقت
                                            </div>
                                            <div class="card p-3">
                                                اقل تكلفة و اعلى جودة فى المادة العلمية باشراف من فريق المنصة العلمى
                                            </div>
                                            <div class="card p-3">
                                                اكتر من جهة اعتماد نقوم من خلالها باعتماد دوراتنا من مؤسسات محلية و دولية
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_reviews">
                                @if($item->ConsultationRating)
                                    <section class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('home.customer reviews')}}</h2>
                                    </section>
                                    <div class="course_review_summary">
                                        <div class="course_review_summary_total">
                                            <div class="course_review_summary_number">{{ round($item->ConsultationRating, 1) }}</div>
                                            <div class="course_review_summary_rating">
                                                <div class="jq_rating jq-stars" data-options='{"initialRating":{{$item->ConsultationRating}}, "readOnly":true, "starSize":22}'></div>
                                            </div>
                                            <small>{{trans('courses.total rating score')}}</small>
                                        </div>
                                        @php
                                            $ratingDetails = $item->ConsultationRatingDetails['ratingDetails'];
                                            $ratingCount = $item->ConsultationRatingDetails['count'];
                                        @endphp
                                        @if($ratingDetails)
                                            <div class="review_summary_chart">
                                                @foreach ($ratingDetails as $ratingItem) 
                                                    @php
                                                        $ratingPercent = round( (( $ratingItem->ratingCount / $ratingCount ) * 100), 1 ) ;
                                                    @endphp
                                                    <div class="review_summary_chart_row">
                                                        <div class="review_summary_chart_prograss">
                                                            <div class="review_summary_chart_buffer" style="width:{{$ratingPercent}}%;"></div>
                                                        </div>
                                                        <div class="review_summary_chart_rating">
                                                            <div class="jq_rating jq-stars" data-options='{"initialRating":{{$ratingItem->rating}}, "readOnly":true, "starSize":16}'></div>
                                                            <div><span class="text_primary">{{round($ratingPercent)}}%</span></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <!-- Reviews -->
                                @include('website.consultations.assets.consultationReviews', ['consultationReviews' => $item->consultationreviews, 'consultationId' => $item->id])

                            </section>
                    </div>
                    <!-- end course_detail_content -->
                </div>
            </div>
        </section>
    </div>
</main>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=612247d00596560012d381ab&product=inline-share-buttons' async='async'></script>


@if(Auth::check())
<div class="modal fade" id="directBuyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flexRight">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black; font-weight: bold; font-size: 35px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 p-0">
                <input type="hidden" id="consultation_id" value="{{$item->id}}">
                <div class="col-md-12">
                    <div class="content w-100">
                        <div class="calendar-container">
                            <div class="calendar">
                                <div class="year-header">
                                    <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                    <span class="year" id="label"></span>
                                    <span class="right-button fa fa-chevron-right" id="next"> </span>
                                </div>
                                <table class="months-table w-100">
                                    <tbody class="consultation-calendar-table">
                                        <tr class="months-row">
                                            <td class="month">Jan</td>
                                            <td class="month">Feb</td>
                                            <td class="month">Mar</td>
                                            <td class="month">Apr</td>
                                            <td class="month">May</td>
                                            <td class="month">Jun</td>
                                            <td class="month">Jul</td>
                                            <td class="month">Aug</td>
                                            <td class="month">Sep</td>
                                            <td class="month">Oct</td>
                                            <td class="month">Nov</td>
                                            <td class="month">Dec</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="days-table w-100">
                                    <td class="day">Sun</td>
                                    <td class="day">Mon</td>
                                    <td class="day">Tue</td>
                                    <td class="day">Wed</td>
                                    <td class="day">Thu</td>
                                    <td class="day">Fri</td>
                                    <td class="day">Sat</td>
                                </table>
                                <div class="frame">
                                    <table class="dates-table w-100">
                                        <tbody class="tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="events-container row">
				    </div>
				    <div class="dialog" id="dialog">
				        <h2 class="dialog-header"> {{trans('consultation.Consultation Description')}} </h2>
				          <div class="mt-4" align="center">
                            <textarea class="input-textarea" id="consultation-description" name="description" rows="4"></textarea>
                            <div>
                                <h2 class="dialog-header"> {{trans('website.secure checkout')}} </h2>
                                {{-- // payments methods --}}
                                <div id="PaymentsMethods">
                                    <div class="spinner-border" id="loading-spinner" style="margin-left: 50%;display:none;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="row" style="width: 100%;">
                                        <div class="col-md-4 item-card rounded-2 consultations-payment-method-card-modal visa" id="consultation-visa" style="height: 117px;">
                                            <a href="javascript: void(0)" class="visa">
                                                <div class="d-flex justify-content-center visa">
                                                    <img class="consultations-payment-method-image-modal visa" src="{{ asset('website') }}/images/new-visa.png">
                                                </div>
                                                <span class="d-flex justify-content-center mt-2 visa"><strong style="color: #4f4f4f;">{{ trans('website.visa') }}</strong></span>
                                            </a>
                                        </div>
                                        <div class="col-md-4 item-card rounded-2 consultations-payment-method-card-modal visa" id="consultation-paypal" style="height: 117px;">
                                            <a href="javascript:void(0)" id="consultation-paypal" style="border:0; background: white;" class="paypal">
                                                <div class="d-flex justify-content-center visa">
                                                    <img class="consultations-payment-method-image-modal visa" src="{{ asset('website') }}/images/new-paypal.png">
                                                </div>
                                                <span class="d-flex justify-content-center mt-2 visa"><strong style="color: #4f4f4f;">{{ trans('website.paypal') }}</strong></span>
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
                                <div class="mt-3 pb-3">
				                    <button type="button" class="button button_primary" id="cancel-button">{{trans('consultations.change dates')}}</button>
                                </div>
                            </div>

				            <!-- <input type="button" value="OK" class="button button-white" id="ok-button"> -->
				          </div>
				      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-0 p-0 flexRight" style="border: none;">
                <br>
            </div>
        </div>
    </div>
</div>
@endif
@endsection