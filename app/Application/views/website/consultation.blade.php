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

@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('consultation.consultation')])
<main class="main_content">
    <div class="course_detail" id="course_detail">
        <section class="bb course_detail_header">
            <div class="video_wrapper">
                <div>
                    <div class="course_detail_title mbsm">
                        <h1>{{trans('consultation.family counseling')}}</h1>
                    </div>
                    <div class="user_name d-none">
                        <img src="{{ large1() }}" style="height: 40px;">
                        &nbsp;
                        Ahmed
                    </div>
                    @if(getUserCountryByAPI() == "EGP")
                        <h3>
                            <del class="course_old_price">
                                EGP 500
                            </del>
                            <div class="">
                                EGP 300
                            </div>
                        </h3>
                    @elseif(getUserCountryByAPI() == "SAR")
                        <h3>
                            <del class="course_old_price">
                                SAR 250
                            </del>
                            <div class="">
                                SAR 100
                            </div>
                        </h3>
                    @else
                        <h3>
                            <del class="course_old_price">
                                USD 75
                            </del>
                            <div class="">
                                USD 35
                            </div>
                        </h3>
                    @endif
                    <div class="course_price_actions mtmd">
                        <div class="course_ad_to_cart">
                            @if(Auth::check())
                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#directBuyModal" class="button button_primary button_large">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            @else
                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary button_large">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flowplayer-embed-container videoContainer pt-4 row" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width:100%;">
                        <img src="{{ asset('website') }}/images/consultation.jpeg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>
        </section>

        <section class="sec sec_pad_top_sm sec_pad_bottom_sm">
            <div class="wrapper">
                <div class="course_detail_content">
                    <!--DESKTOP course_column_info -->
                    <div class="course_column_info is_stuck col-md-4 hide-mobile" data-sticky="nav" data-plugin-option="{&quot;offset_top&quot;:130}" style="position: unset;">
                        <div class="b_all">
                            @if(getCurrency() == "EGP")
                                <h3>
                                    <div class="course_price">
                                        <del class="course_old_price">
                                            EGP 500
                                        </del>
                                        <div class="">
                                            EGP 200
                                        </div>
                                    </div>
                                </h3>
                            @else
                                <h3>
                                    <div class="course_price">
                                        <del class="course_old_price">
                                            @php $exchangeRate = App\Application\Model\Payments::exchangeRate(); @endphp
                                            USD {{ round(500 / $exchangeRate) }}
                                        </del>
                                        <div class="">
                                            USD {{ round(200 / $exchangeRate) }}
                                        </div>
                                    </div>
                                </h3>
                            @endif
                            <div class="share_course text_center bt pbsm">
                                <div class="socials" style="height: 50px;">
                                    <span><small>{{trans('courses.share on')}}</small></span>
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons" style="z-index: 0;"></div>
                                    <!-- ShareThis END -->
                                </div>
                            </div>
                        </div>

                        <div class="course_column_info_inner mtxs b_all">
                            <div class="about_auther">
                                <h3 class="text_primary mblg text_capitalize">{{trans('consultation.about consultant')}}</h3>
                                <figure class="mbsm">
                                    <a href="javascript: void(0)">

                                        <img src="{{ asset('website') }}/images/consultation.jpeg" style="width: 100px;">
                                    </a>
                                </figure>
                                <div class="auther_name mbmd">
                                    <h5 class="mbxs"><a href="javascript: void(0)">عبده الأزهري</a></h5>
                                    <span class="auther_title d-none">أخصائي نفسي</span>
                                </div>
                                <div class="d-none">
                                    <p><span>أخصائي نفسي و مدرب في مجال التربية الخاصة و صاحب شركة يوتوبيا للتدريب</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end course_column_info -->

                    <!-- course_detail_content -->
                    <div class="col-md-8">
                        <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_gools">
                            <div class="title mbmd">
                                <h2 class="text_primary text_capitalize">يتم التواصل لتحديد موعد الاستشارة بعد الدفع مباشرة</h2>
                            </div>
                            <div class="title mbmd">
                                <h2 class="text_primary text_capitalize">مهارات المستشار الاسرى و التربوى</h2>
                            </div>
                            <div class="text mbmd pr-3 pl-3">
                                <p>القدرة العملية والعلمية على فهم فروع الإرشاد الأسري - معرفات التفاهم داخل الاسرة واسباب النزاعات والحلول - امثلة عملية المشاكل والتطبيق العملي للحلول - نموذج الجلسة الارشادية القدرة العملية والعلمية على فهم فروع الإرشاد الزواجي - التفاهم داخل الأسرة وأسباب النزاعات والحلول - أمثلة عملية المشاكل والتطبيق العملي للحلول - الطريق للسعادة الزوجية - نموذج الجلسة الإرشادية اهداف الارشاد النفسي;مناهج واستراتيجيات الارشاد النفسي أنواع الارشاد النفسي مفاهيم خاطئة حول الارشاد النفسي مهارات الارشاد النفسي القياس والتشخيص في الارشاد النفسي التقييم والمتابعة في الارشاد النفسي خصائص المرشد النفسي فن التعامل مع الاضطربات النفسية أنواع الجلسات النفسية ورش عمل جلسات الارشاد النفسي اخلاقيات المرشد النفسي</p>
                            </div>
                        </section>

                        <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="learning-adv-section">
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
                            <!-- Reviews -->
                            <div class="course_comments">
                            </div>
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
            <form method="GET" action="/site/cartFinishPaypalConsultation">
                <div class="modal-body p-0 p-0">
                    <div>
                        <div class="form-group mr-4 ml-4">
                            <label for="exampleFormControlTextarea1" style="font-size: 33px;color: black;">{{trans('consultation.Consultation Description')}}</label>
                            <textarea class="form-control" id="consultation-description" name="description" rows="4" required></textarea>
                        </div>
                    </div>
                    <div>
                        {{-- // payments methods --}}
                        <div id="PaymentsMethods">
                            <div class="spinner-border" id="loading-spinner" style="margin-left: 50%;display:none;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="section_title_1 mt-3 direct-buy-modal-title">
                                <h4><i class="fa fa-lock" aria-hidden="true" style="font-size: 33px; margin-right:10px; color: #1f8ebb;"></i> <span style="font-size: 33px;"> {{ trans('website.secure checkout') }} </h4>
                            </div>
                            <div class="row" style="width: 100%;">
                                <div class="col-md-5 item-card rounded-2 payment-method-card-modal visa">
                                    <a href="javascript: void(0)" onclick="visaConsultation()" class="visa">
                                        <div class="d-flex justify-content-center visa">
                                            <img class="payment-method-image-modal visa" src="{{ asset('website') }}/images/new-visa.png">
                                        </div>
                                        <span class="d-flex justify-content-center mt-2 visa"><strong style="color: #4f4f4f;">{{ trans('website.visa') }}</strong></span>
                                    </a>
                                </div>
                                <div class="col-md-5 item-card rounded-2 payment-method-card-modal visa">
                                    <button type="submit" style="border:0; background: white;" class="paypal">
                                        <div class="d-flex justify-content-center visa">
                                            <img class="payment-method-image-modal visa" src="{{ asset('website') }}/images/new-paypal.png">
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
                    </div>
                </div>
            </form>
            <div class="modal-footer p-0 p-0 flexRight" style="border: none;">
                <br>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
<script type="text/javascript" src="{{ asset('website') }}/js/consultations.js"></script>