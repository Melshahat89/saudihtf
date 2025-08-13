@php
    use App\Application\Model\Courses;
    use App\Application\Model\User;

@endphp

@extends(layoutExtend('website'))
@section('title')
    {{$course->title_lang}} - {{ trans('home.IGTS') }}
@endsection
@section('canonical')<link rel="canonical" href="{{$course->canonical ? $course->canonical : url()->current() }}">@endsection
@section('description')
    {{ ($course->seo_desc) ? $course->seo_desc_lang : $course->description_lang }}
@endsection
@section('keywords')
    {{ ($course->seo_keys) ? extractSeoKeys($course->seo_keys) : defaultSeoKeys($course->title_lang) }}
@endsection

@push('css')
    <style>
        .description ul li {
            list-style: circle;
        }

    </style>


    <style>
        .subscription-card {
            cursor: pointer;
            transition: transform 0.3s ease;
            border: 2px solid transparent;
        }

        .subscription-card:hover {
            transform: scale(1.02);
        }

        .selected-plan {
            border: 2px solid #4CAF50 !important;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.3);
        }


        .modal-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .rate {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .meta {
            font-size: 16px;
            color: #777;
        }

    </style>

@endpush

@push('js')
    <script src="{{ asset('website/subscriptions') }}/js/custom.js"></script>
@endpush
@section('content')


    <div class="bread-crumb">
        <div class="wrapper">
            <a href="/{{getCourseTypeText($course)}}/category/<?= $course->categories->slug ?>"><?=  $course->categories->name_lang ?> </a> > <span><?= $course->title_lang ?></span>
        </div>
    </div>

    <main class="main_content">
        <div class="course_detail" id="course_detail">
            <section class="bb course_detail_header">
                <div class="video_wrapper">
                    <div>
                        @if($course->type != Courses::TYPE_BUNDLES && $course->type != Courses::TYPE_MASTERS)
                            {{-- <div class="user_name">

                                @if($course->instructor->image)
                                    <img src="{{ large1($course->instructor->image) }}" style="height: 40px;">
                                @endif
                                &nbsp;  {{$course->instructor->Fullname_lang}}
                            </div> --}}
                        @endif
                        <div class="course_detail_title mbsm"><h1>{{ $course->title_lang }}</h1>

                            <p class="d-none">{{ $course->title_ar }}</p>

                        </div>
                        <div class="course_detail_sub_info mbmd">
                            <strong>

                            </strong>
                        </div>

                        <div class="course_detail_rating mbsm {{isMobile() ? 'd-flex justify-content-between' : ''}}">
                            {{--<div class="jq_rating jq-stars" data-options='{"initialRating":{{$course->CourseRating}}, "readOnly":true, "starSize":19}'></div>
                            <span class="mr-2 ml-2">{{ round($course->CourseRating, 1) }} ( {{ $course->CourseCountRating}} {{trans('courses.ratings')}} )</span>--}}
                            <div class="show-mobile d-none">
                                @if(Auth::check())
                                    @if($enrolled)

                                        <a class="button button_primary button_large add_cart track" href="{{ url('/courses/courseLecture/id/' . $course->courselectures[0]['id']) }}">
                                            <i class="fas fa-play track"></i>
                                            {{ trans('b2b.Start Learn') }}
                                        </a>
                                    @endif
                                    <a href="/courses/toggleFavourite/id/{{$course->id}}" class=" button button_primary2 button_large add_wishlist <?= ($wishListed) ? 'active' :  '' ?>"  data-course-id="{{$course->id}}">
                                        @else
                                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary2 button_large">
                                                @endif
                                                <i class="far fa-heart"></i>
                                            </a>
                            </div>
                        </div>


                        @if($course->type == Courses::TYPE_WEBINAR)
                            <h3>{{ localizeDate($course->start_date) }}</h3>
                            <br>
                            <p>({{trans('courses.egypt')}}) @php $datetime = new DateTime($course->start_date); @endphp {{ $datetime->format('h:i A') }}</p>
                            <p>({{trans('courses.ksa')}}) @php $datetime = new DateTime($course->start_date); $datetime->add(new DateInterval('PT1H')); @endphp {{ $datetime->format('h:i A') }}</p>

                        @else

                            {{--                            <h3>--}}
                            {{--                                <del class='course_old_price'>--}}
                            {{--                                    {{getSubscriptionPrices()['subscription_yearly_after']  }} {{getCurrency()}}--}}
                            {{--                                </del>--}}
                            {{--                                <div class=''>--}}
                            {{--                                    {{getSubscriptionPrices()['subscription_yearly_before']}} {{getCurrency()}}--}}
                            {{--                                </div>--}}



                            {{--                            </h3>--}}

                        @endif

                        @if($course->course_hubspot_form)
                            <br>
                            <h2 class="text_primary text_capitalize">معتمدة بـ 10 CME</h2>
                        @endif

                        <div class="course_price_actions mtmd">
                            <div class="course_ad_to_cart hide-mobile">
                                @if(!$shoppingCart && !$enrolled)
                                    @if(Auth::check())
                                        @if($course->type == Courses::TYPE_WEBINAR)
                                            @if(getEventStatus($course) == "passed")
                                                <a href="javascript:void(0)" class="button button_primary button_large add_cart" style="background-color: #cf2626;">
                                                    {{ trans('courses.This Webinar Has Ended') }}
                                                </a>
                                            @else
                                                <a href="/site/enrollWebinar/{{$course->id}}" class="button button_primary button_large add_cart">
                                                    {{ trans('courses.Watch This Webinar') }}
                                                </a>
                                            @endif
                                        @else
                                            @if($course->OriginalPrice > 0)
                                                <a href="javascript:void(0);"
                                                   onclick="openSubscriptionModal()"
                                                   class="button button_primary button_large add_cart track">
                                                    <i class="fas fa-cart-plus track"></i>
                                                    {{ trans('b2b.Subscribe Now') }}
                                                </a>
                                            @else
                                                <a class="button button_primary button_large add_cart track" href="{{ url('/courses/enrollNow/id/' . $course->id) }}">
                                                    {{ trans('b2b.Start Learn') }}
                                                </a>
                                            @endif
                                        @endif
                                    @else
                                        @if($course->type == Courses::TYPE_WEBINAR)
                                            @if(getEventStatus($course) == "passed")
                                                <a href="javascript:void(0)" class="button button_primary button_large add_cart" style="background-color: #cf2626;">
                                                    {{ trans('courses.This Webinar Has Ended') }}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary button_large">
                                                    {{ trans('courses.Sign in to join this webinar') }}
                                                </a>
                                            @endif
                                        @else
                                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary button_large">
                                                <i class="fas fa-cart-plus"></i>
                                                {{trans('b2b.Subscribe Now')}}
                                            </a>
                                        @endif
                                    @endif

                                @elseif($enrolled)
                                    <a class="button button_primary button_large add_cart track" href="{{ url('/courses/courseLecture/id/' . $course->courselectures[0]['id'])  }}">
                                        {{ trans('b2b.Start Learn') }}
                                        <i class="fas fa-play track"></i>
                                    </a>
                                @endif

                                @if($enrolled && $course->type == Courses::TYPE_WEBINAR)
                                    @if(getEventStatus($course) == "passed")
                                        <a href="javascript:void(0)" class="button button_primary button_large add_cart" style="background-color: #cf2626;">
                                            {{ trans('courses.This Webinar Has Ended') }}
                                        </a>
                                    @else
                                        <a href="{{($course->webinar_url) ? $course->webinar_url : 'javascript:void(0)'}}" target="_blank" class="button button_primary button_large add_cart">
                                            {{ trans('courses.Watch This Webinar') }}
                                        </a>
                                    @endif

                                @endif

                                {{--                                <a href="/cart" class="button button_primary button_large go_to_cart" style="<?= (!$shoppingCart) ? 'display:none' : '' ?>">--}}
                                {{--                                    ابدأ التعلم الآن--}}
                                {{--                                </a>--}}



                                @if(Auth::check())
                                    <a href="/courses/toggleFavourite/id/{{$course->id}}" class=" button button_primary2 button_large add_wishlist {{ ($wishListed) ? 'active' :  '' }}"  data-course-id="{{$course->id}}">
                                @else
                                     <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="button button_primary2 button_large">
                                @endif
                                     <i class="far fa-heart"></i>
                                     </a>

                            </div>
                        </div>

                        <!-- <div class="" style="background-color: #0e385e; color: white;margin-top: 20px;border-radius: 4px;">
                            <div>
                                <img alt="time" src="https://unihance.com/images/CoursePage/A3.png?v=1" class="CoursePage-MuiAvatar-img">
                            </div>
                            <div>
                                TEST Title
                            </div>
                        </div> -->

                        <div class="imagesBoxes CoursePage-MuiPaper-elevation3 hide-mobile">
                            <div>
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <img alt="time" src="{{asset('website')}}/images/duration.png" class="CoursePage-MuiAvatar-img">
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.duration') }} <br> {{$course->getHoursLectures()}} </p>
                                </div>
                                @if($course->CourseRating > 0)
                                    <div class="imagesBox">
                                        <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                            <img alt="time" src="{{asset('website')}}/images/rate.png" class="CoursePage-MuiAvatar-img">
                                        </div>
                                        <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.rate') }} <br>  ({{ round($course->CourseRating, 1) }}) </p>
                                    </div>
                                @endif
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <img alt="time" src="{{asset('website')}}/images/lifetime.png" class="CoursePage-MuiAvatar-img">
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.access') }} <br> {{ trans('courses.lifetime') }} <br>  </p>
                                </div>
                            </div>
                            <div class="course-insight-devider-mobile" style="display: none;"></div>
                            <div>
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <img alt="time" src="{{asset('website')}}/images/language.png" class="CoursePage-MuiAvatar-img">
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.language') }} <br> {{ trans('courses.arabic') }} </p>
                                </div>
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <img alt="time" src="{{asset('website')}}/images/resources.png" class="CoursePage-MuiAvatar-img">
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.resources') }}  <br> ({{ $course->getTotalResourcesCount() }}) </p>
                                </div>
                                @if($course->skill_level)
                                    @if(is_array(json_decode($course->skill_level)))

                                        <div class="imagesBox">
                                            <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                                <img style="height: 30px" alt="time" src="{{asset('website')}}/images/levels.png" class="CoursePage-MuiAvatar-img">
                                            </div>
                                            <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1">{{ trans('courses.skill_level') }}
                                                <br>
                                                (
                                                @foreach(json_decode($course->skill_level) as $key => $skill_level)
                                                    @if($key > 0)

                                                        -

                                                    @endif
                                                    {{ courseLevels()[$skill_level]}}
                                                @endforeach
                                                )
                                            </p>
                                        </div>

                                    @else
                                        <div class="imagesBox">
                                            <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                                <img style="height: 30px" alt="time" src="{{asset('website')}}/images/levels.png" class="CoursePage-MuiAvatar-img">
                                            </div>
                                            <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1">{{ trans('courses.skill_level') }}
                                                <br>
                                                ( {{courseLevels()[$course->skill_level]}} )
                                            </p>
                                        </div>
                                    @endif
                                @endif
                                @if($course->file)
                                    <div class="imagesBox">
                                        <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                            <a href="/uploads/files/{{$course->file}}" download> <img alt="time" src="{{asset('website')}}/images/Download -01.png" class="CoursePage-MuiAvatar-img"></a>
                                        </div>
                                        <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1">{{ trans('courses.Download file') }}  <br> <i class="fa fa-download"></i> </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($course->type == Courses::TYPE_WEBINAR)
                        <div>
                            <div class="flowplayer-embed-container">
                                <img src="{{ large1($course->image) }}" style="height: 600px; width: 100%; object-fit: contain;" class="webinar-poster">
                            </div>
                        </div>
                    @else

                        <div>
                            <div class="flowplayer-embed-container videoContainer" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width:100%;">

                                @if($course->promo_video)
                                    <!-- <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="https://player.vimeo.com/video/{{ $course->promo_video }}" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay"></iframe> -->
                                    <!-- <a href="#"><img src="{{ large1($course->image) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;"></a> -->
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#promoModal">
                                        <img src="{{ large1($course->image) }}" alt="{{$course->alt_image}}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                        <img src="{{ asset('website') }}/play-button.png" alt="play" class="playBtn">
                                        <span class="badge badge-primary views-badge"><i class="fas fa-eye"></i> <span>{{$course->visits}}</span></span>
                                    </a>
                                @else
                                    <img src="{{ large1($course->image) }}"  alt="{{$course->alt_image}}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                @endif
                            </div>
                        </div>
                </div>

                <div class="imageBoxesContrainer">
                    <div class="imagesBoxes CoursePage-MuiPaper-elevation3 show-mobile" style="display: none;">
                        <div>
                            <div class="imagesBox">
                                <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                    <img alt="time" src="{{asset('website')}}/images/duration.png" class="CoursePage-MuiAvatar-img">
                                </div>
                                <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.duration') }} <br> {{$course->getHoursLectures()}} </p>
                            </div>
                            @if($course->CourseRating > 0)
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <img alt="time" src="{{asset('website')}}/images/rate.png" class="CoursePage-MuiAvatar-img">
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.rate') }} <br>  ({{ round($course->CourseRating, 1) }}) </p>
                                </div>
                            @endif
                            <div class="imagesBox">
                                <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                    <img alt="time" src="{{asset('website')}}/images/lifetime.png" class="CoursePage-MuiAvatar-img">
                                </div>
                                <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.access') }} <br> {{ trans('courses.lifetime') }} <br>  </p>
                            </div>
                        </div>
                        <div class="course-insight-devider-mobile" style="display: none;"></div>
                        <div>
                            <div class="imagesBox">
                                <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                    <img alt="time" src="{{asset('website')}}/images/language.png" class="CoursePage-MuiAvatar-img">
                                </div>
                                <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.language') }} <br> {{ trans('courses.arabic') }} </p>
                            </div>
                            <div class="imagesBox">
                                <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                    <img alt="time" src="{{asset('website')}}/images/resources.png" class="CoursePage-MuiAvatar-img">
                                </div>
                                <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.resources') }}  <br> ({{ $course->getTotalResourcesCount() }}) </p>
                            </div>
                            @if($course->skill_level)
                                @if(is_array(json_decode($course->skill_level)))

                                    <div class="imagesBox">
                                        <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                            <img style="height: 30px" alt="time" src="{{asset('website')}}/images/levels.png" class="CoursePage-MuiAvatar-img">
                                        </div>
                                        <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1">{{ trans('courses.skill_level') }}
                                            <br>

                                            (
                                            @foreach(json_decode($course->skill_level) as $key => $skill_level)
                                                @if($key > 0)
                                                    -
                                                @endif
                                                {{ courseLevels()[$skill_level]}}
                                            @endforeach
                                            )
                                        </p>
                                    </div>

                                @else
                                    <div class="imagesBox">
                                        <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                            <img style="height: 30px" alt="time" src="{{asset('website')}}/images/levels.png" class="CoursePage-MuiAvatar-img">
                                        </div>
                                        <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1">{{ trans('courses.skill_level') }}
                                            <br>
                                            ( {{courseLevels()[$course->skill_level]}} )
                                        </p>
                                    </div>
                                @endif
                            @endif
                            @if($course->file)
                                <div class="imagesBox">
                                    <div class="CoursePage-MuiAvatar-root CoursePage-MuiAvatar-square headerImages">
                                        <a href="/uploads/files/{{$course->file}}" download> <img alt="time" src="{{asset('website')}}/images/Download -01.png" class="CoursePage-MuiAvatar-img"> </a>
                                    </div>
                                    <p class="CoursePage-MuiTypography-root imageDesciption CoursePage-MuiTypography-body1"> {{ trans('courses.Download file') }}  <br> <i class="fa fa-download"></i> </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        </section>

        <nav class="course_detail_nav" data-sticky="nav" data-plugin-option='{"offset_top":59, "parent": "#course_detail"}'>
            <div class="wrapper">
                <ul>

                    @if($course->description_lang)
                        <li><a data-secId="nav_course_gools" class="smooth_scroll" href="#nav_course_gools">{{trans('courses.course description head')}}</a></li>
                    @endif
                    {{--@if($course->willlearn_lang)
                        <li><a data-secId="will_learn_section" class="smooth_scroll" href="#will_learn_section">{{trans('courses.You Will Learn')}}</a></li>
                    @endif--}}
                    {{-- @if($course->dynamicfields)

                        @foreach($course->dynamicfields as $field)
                            <li><a class="smooth_scroll" href="#{{$field->name}}">{{$field->title_lang}}</a></li>
                        @endforeach

                    @endif --}}
                    @if($course->requirments_lang)
                        <li><a data-secId="requirements_section" class="smooth_scroll" href="#requirements_section">{{trans('courses.Requirments')}}</a></li>
                    @endif
                    @if(count($course->courseincludes) > 0)
                        <li><a data-secId="instructors_section" class="smooth_scroll" href="#instructors_section">{{trans('home.instructors')}}</a></li>
                    @endif
                    @if($course->targetstudents_lang)
                        <li><a data-secId="target_students_section" class="smooth_scroll" href="#target_students_section">{{trans('courses.target_students')}}</a></li>
                    @endif
                    @if($course->coursesections)
                        <li><a data-secId="nav_course_list" class="smooth_scroll" href="#nav_course_list">{{trans('courses.lectures')}}</a></li>
                    @endif
                    @if($enrolled  && !empty($course->resources) )
                        <li><a data-secId="nav_course_resource" class="smooth_scroll" href="#nav_course_resource">{{trans('courses.course resources head')}}</a></li>
                    @endif

                    @if($course->course_hubspot_form)
                        <li><a data-secId="cme_section" class="smooth_scroll" href="#cme_section">{{trans('courses.course cme form head')}}</a></li>
                    @endif
                    @if($course->CourseRating > 0)
                        <li><a data-secId="nav_course_reviews" class="smooth_scroll" href="#nav_course_reviews">{{trans('courses.course rating and reviews head')}}</a></li>
                    @endif
                    <li><a data-secId="learning-adv-section" class="smooth_scroll" href="#learning-adv-section">{{trans('courses.learning benefits')}}</a></li>
                </ul>
            </div>
        </nav>

        <div class="course_detail_nav_tabs bg_lightgray">
            <!-- course_streamer -->

            <!-- end course_streamer -->

            <section class="sec sec_pad_top_sm sec_pad_bottom_sm">
                <div class="wrapper">
                    <div class="course_detail_content">
                        <!--DESKTOP course_column_info -->
                        <div class="course_column_info is_stuck col-md-4 hide-mobile" data-sticky="nav" data-plugin-option='{"offset_top":130}' style="position: unset;">
                            @if($course->type != Courses::TYPE_WEBINAR)
                                <div class="b_all">
                                    {{--                                    <h3>--}}
                                    {{--                                        <div class="course_price">--}}

                                    {{--                                            <del class='course_old_price'>--}}
                                    {{--                                                {{getSubscriptionPrices()['subscription_yearly_after']  }} {{getCurrency()}}--}}
                                    {{--                                            </del>--}}
                                    {{--                                            <div class=''>--}}
                                    {{--                                                {{getSubscriptionPrices()['subscription_yearly_before']}} {{getCurrency()}}--}}
                                    {{--                                            </div>--}}

                                    {{--                                        </div>--}}
                                    {{--                                    </h3>--}}
                                    <div class="share_course text_center bt pbsm">
                                        <div class="socials" style="height: 50px;">
                                            <span><small>{{trans('courses.share on')}}</small></span>
                                            <!-- ShareThis BEGIN -->
                                            <div class="sharethis-inline-share-buttons" style="z-index: 0;"></div>
                                            <!-- ShareThis END -->
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="course_column_info_inner mtxs b_all">
                                <div class="about_auther">
                                    @if(count($course->courseincludes) > 0)
                                        <h3 class="text_primary mblg text_capitalize">{{trans('website.about igts')}}</h3>
                                        <figure class="mbsm">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('website') }}/images/igts-instructor-logo.jpeg" style="width: 100px;">
                                            </a>
                                        </figure>
                                        <div class="auther_name mbmd">
                                            <h5 class="mbxs"><a href="javascript: void(0)">IGTS</a></h5>
                                        </div>
                                        <div>{{trans('website.About IGTS')}}</div>
                                    @else
                                        <h3 class="text_primary mblg text_capitalize">{{trans('courses.about instructor')}}</h3>
                                        <figure class="mbsm">
                                            <a href="/instructors/view/{{$course->instructor->slug}}">

                                                @if($course->instructor->image)
                                                    <img src="{{large1($course->instructor->image)}}" style="width: 100px;">
                                                @endif
                                            </a>
                                        </figure>
                                        <div class="auther_name mbmd">
                                            <h5 class="mbxs"><a href="/instructors/view/{{$course->instructor->slug}}">{{$course->instructor->Fullname_lang}}</a></h5>
                                            <span class="auther_title">{{$course->instructor->title_lang}}</span>
                                        </div>
                                        <div>{!!$course->instructor->about_lang!!}</div>
                                    @endif
                                </div>
                            </div>

                            @if($course->tags)
                                <div class="course_column_info_inner mtxs b_all">
                                    <div class="about_auther">
                                        <h3 class="text_primary mblg text_capitalize">{{trans('courses.tags')}}</h3>

                                        <div>
                                            @foreach(json_decode($course->tags) as $tag)
                                                <a href="/allcourses/category?key={{$tag}}"><span class="badge badge-primary m-1" style="font-size: 1em;">{{$tag}}</span></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($enrolled && $course->type != Courses::TYPE_WEBINAR && isset($course->quiz))
                                <div class="course_column_info_inner mtxs b_all">
                                    <div class="about_auther">

                                        @if($coursePercent > 90  OR  (count($course->courseincludes) > 0))

                                            <a href="/courses/startExam/{{$course->slug}}" class="button button_primary button_shadow">{{trans('courses.start exam')}}</a>

                                        @endif

                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- end course_column_info -->

                        <!-- course_detail_content -->
                        <div class="col-md-8 description">
                            @if($course->type == Courses::TYPE_WEBINAR && $enrolled)
                                @if(getEventStatus($course) == "passed")
                                    <section class="title mbmd" id="target_students_section">
                                        <h2 class="text_primary text_capitalize">{{trans('courses.Event Certificate')}}</h2>
                                    </section>
                                    @if(isset($enrollment->certificate))
                                        <div class="certificate_list">
                                            <div class="item">
                                                <div>
                                                    <span class="item_icon text_primary"><i class="fas fa-certificate"></i></span>
                                                    <h5 class="item_name">{{ $course->title_lang }}</h5>
                                                </div>
                                                <div>
                                                    <a href="{{ url(env("CERTIFICATE_PATH_1")."/".$enrollment->certificate) }}" class="button button_link" target="_blank"><i class="far fa-eye"></i></a>
                                                    <a href="{{ url(env("CERTIFICATE_PATH_1")."/".$enrollment->certificate) }}" class="button button_link" target="_blank"><i class="fas fa-cloud-download-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('website') }}/images/igts certificate placeholder.jpg" id="webinar-certificate-placeholder">
                                        <form action="{{concatenateLangToUrl('savewebinarcertificate')}}/{{$course->id}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="name">{{ trans('courses.Name') }}</label>
                                                <input type="text" name="name" required class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{ trans('courses.Your Full Name In English') }}">
                                                <small id="nameHelp" class="form-text text-muted">{{ trans('courses.Type in the name') }} <strong>({{trans('courses.In English')}})</strong> {{ trans('courses.that you want to be shown on the certificate') }}</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">{{ trans('courses.Save') }}</button>
                                        </form>
                                    @endif
                                @endif
                            @endif

                            @if($course->paragraph_lang)
                                <div class="text mbmd pr-3 pl-3">{!! $course->paragraph_lang !!}</div>
                            @endif


                            @if($course->description_lang)
                                <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_gools">
                                    <div class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('courses.course description content')}} {{$course->title_lang}}</h2>
                                    </div>
                                    <div class="text mbmd pr-3 pl-3">{!! $course->description_lang !!}</div>
                                </section>
                            @endif

                            @if($course->willlearn_lang)
                                <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="will_learn_section">
                                    <div class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('courses.You Will Learn')}}</h2>
                                    </div>
                                    <div class="text mbmd pr-3 pl-3"> {!! $course->willlearn_lang !!} </div>
                                </section>
                            @endif
                            @if($course->targetstudents_lang)
                                <section class="title mbmd" id="target_students_section">
                                    <h2 class="text_primary text_capitalize">{{trans('courses.target_students')}}</h2>
                                </section>
                                <div class="text mbmd pr-3 pl-3">{!! $course->targetstudents_lang !!}</div>


                            @endif


                            @if($course->dynamicfields)
                                @foreach($course->dynamicfields as $field)
                                    <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="{{$field->name}}">

                                        <div class="title mbmd">
                                            <h5 class="">{{$field->title_lang}}</h5>
                                        </div>
                                        <div class="text mbmd pr-3 pl-3">
                                            <h3>
                                                {!! $field->description_lang !!}
                                            </h3>
                                        </div>

                                    </section>
                                @endforeach
                            @endif

                            @if($course->requirments_lang)
                                <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="requirements_section">
                                    <div class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('courses.Requirments')}}</h2>
                                    </div>
                                    {!! $course->requirments_lang !!}
                                </section>
                            @endif


                            <section class="sec">
                                <div class="mtlg">
                                    @if($course->created_at)
                                        {{trans('courses.created at')}} {{ $course->created_at }}
                                    @endif
                                    <br>
                                    @if($course->updated_at)
                                        {{trans('courses.updated at')}} {{ $course->updated_at }}
                                    @endif
                                    {{--                                    <div class="socials contact_whatsapp">--}}
                                    {{--                                        @if($course->type != Courses::TYPE_WEBINAR)--}}
                                    {{--                                            <span class="contact_whatsapp"><h6><a href="https://contactus.igtsservice.com/">{{trans('home.contact us on whatsapp')}}</a></h6></span>--}}
                                    {{--                                            <a href="https://contactus.igtsservice.com/" class="social_link contact_whatsapp" style="background-color: #4AC959;"><i class="fab fa-whatsapp"></i></a>--}}
                                    {{--                                        @endif--}}
                                    {{--                                    </div>--}}
                                </div>
                            </section>

                            @if(count($course->courseincludes) > 0)
                                <section  class="sec sec_pad_top_sm sec_pad_bottom_sm" id="instructors_section">
                                    <div class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('home.instructors')}}</h2>
                                    </div>
                                    <div class="row text-center">
                                        @include('website.courses.assets.instructors', ['instructor' => $course->instructor])
                                        @foreach(getInstructors($course) as $instructor)
                                            @include('website.courses.assets.instructors', ['instructor' => $instructor])
                                        @endforeach
                                    </div>
                                </section>
                            @endif

                            <!-- Course Content -->
                            @if($course->coursesections)
                                @include('website.courses.assets.courseContent', ['course' => $course, 'enrolled' => $enrolled])
                            @endif

                            @if($course->coursesincluded)
                                @foreach ($course->courseincludes as $course1)
                                    @if($course1->includedCourse->coursesections)
                                        @include('website.courses.assets.courseContent', ['course' => $course1->includedCourse, 'includedTitle' => $course1->includedCourseTitle_lang, 'enrolled' => $enrolled])
                                        {{-- @include('website.courses.assets.includedCourseCard', ['data' => $course1->includedCourse, 'includedTitle' => $course1->includedCourseTitle_lang, 'enrolled' => $enrolled]) --}}
                                    @endif
                                @endforeach
                            @endif


                            @if($enrolled)
                                @if($course->course_hubspot_form)
                                    <section id="cme_section">
                                        <header class="course_list_header">
                                            <div class="title">{{trans('courses.course cme form content')}}</div>
                                        </header>
                                        <br>
                                        <p>{{trans('courses.course cme form email')}}</p>
                                        <br>
                                        <p class="text-center">{{Auth::user()->email}}</p>
                                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
                                        <script>
                                            hbspt.forms.create({
                                                portalId: "4880007",
                                                formId: '{{ $course->course_hubspot_form }}',
                                            });
                                        </script>
                                    </section>
                                @endif
                            @endif

                            <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="learning-adv-section">
                                <div class="accordion accordion_list">
                                    <div class="card">
                                        <div class="card_header">
                                            <button data-toggle="collapse" data-target="#learning-adv" aria-expanded="true" aria-controls="coll_1" class="d-flex justify-content-between" style="background-color: #244092; color: white;">
                                                <span class="card_header_title">{{trans('courses.learning benefits')}}</span>
                                                <i class="fa mr-10 fa-plus" aria-hidden="true" style="place-self: center;"></i>
                                            </button>
                                        </div>
                                        <div id="learning-adv" class="panel_collapse collapse">
                                            <div class="card_body">
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-1')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-2')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-3')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-4')}}
                                                </div>
                                                {{--                                                <div class="card p-3">--}}
                                                {{--                                                    {{trans('courses.benefits-5')}}--}}
                                                {{--                                                </div>--}}
                                                {{--                                                <div class="card p-3">--}}
                                                {{--                                                    {{trans('courses.benefits-6')}}--}}
                                                {{--                                                </div>--}}
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-7')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-8')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-9')}}
                                                </div>
                                                <div class="card p-3">
                                                    {{trans('courses.benefits-10')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            @if(isMobile())
                                <!--Mobile course_column_info -->
                                <div class="course_column_info">
                                    @if($course->type != Courses::TYPE_WEBINAR)
                                        <div class="b_all">
                                            <div class="share_course text_center bt pbsm">
                                                <div class="socials" style="height: 50px;">
                                                    <span><small>{{trans('courses.share on')}}</small></span>
                                                    <!-- ShareThis BEGIN -->
                                                    <div class="sharethis-inline-share-buttons" style="z-index: 0;"></div>
                                                    <!-- ShareThis END -->
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="course_column_info_inner mtxs b_all">
                                        <div class="about_auther">
                                            @if(count($course->courseincludes) > 0)
                                                <h3 class="text_primary mblg text_capitalize">{{trans('website.about igts')}}</h3>
                                                <figure class="mbsm">
                                                    <a href="javascript: void(0)">
                                                        <img src="{{ asset('website') }}/images/igts-instructor-logo.jpeg" style="width: 100px;">
                                                    </a>
                                                </figure>
                                                <div class="auther_name mbmd">
                                                    <h5 class="mbxs"><a href="javascript: void(0)">IGTS</a></h5>
                                                </div>
                                                <div>{{trans('website.Footer IGTS')}}</div>
                                            @else
                                                <h3 class="text_primary mblg text_capitalize">{{trans('courses.about instructor')}}</h3>
                                                <figure class="mbsm">
                                                    <a href="/instructors/view/{{$course->instructor->slug}}">

                                                        @if($course->instructor->image)
                                                            <img src="{{large1($course->instructor->image)}}" style="width: 100px;">
                                                        @endif
                                                    </a>
                                                </figure>
                                                <div class="auther_name mbmd">
                                                    <h5 class="mbxs"><a href="/instructors/view/{{$course->instructor->slug}}">{{$course->instructor->Fullname_lang}}</a></h5>
                                                    <span class="auther_title">{{$course->instructor->title_lang}}</span>
                                                </div>
                                                <div>{!!$course->instructor->about_lang!!}</div>
                                            @endif
                                        </div>
                                    </div>

                                    @if($course->tags)
                                        <div class="course_column_info_inner mtxs b_all">
                                            <div class="about_auther">
                                                <h3 class="text_primary mblg text_capitalize">{{trans('courses.tags')}}</h3>

                                                <div>
                                                    @foreach(json_decode($course->tags) as $tag)
                                                        <span class="badge badge-primary m-1" style="font-size: 1em;">{{$tag}}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($enrolled && $course->type != Courses::TYPE_WEBINAR)
                                        @if($course->type == Courses::TYPE_BUNDLES)
                                            <div class="course_column_info_inner mtxs b_all">
                                                <div class="about_auther">
                                                    <button type="button" data-dismiss="modal" data-remote="/courses/bundleExams/{{$course->slug}}" data-toggle="ajaxModal" class="button button_primary2 text_capitalize">{{trans('courses.start exam')}}</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="course_column_info_inner mtxs b_all">
                                                <div class="about_auther">
                                                    @if($coursePercent > 90  OR  (count($course->courseincludes) > 0))

                                                        <a href="/courses/startExam/{{$course->slug}}" class="button button_primary button_shadow">{{trans('courses.start exam')}}</a>

                                                    @endif

                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <!-- end course_column_info -->
                            @endif
                            <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_reviews">
                                @if($course->CourseRating)
                                    <section class="title mbmd">
                                        <h2 class="text_primary text_capitalize">{{trans('home.customer reviews')}}</h2>
                                    </section>
                                    <div class="course_review_summary">
                                        <div class="course_review_summary_total">
                                            <div class="course_review_summary_number">{{ round($course->CourseRating, 1) }}</div>
                                            <div class="course_review_summary_rating">
                                                <div class="jq_rating jq-stars" data-options='{"initialRating":{{$course->CourseRating}}, "readOnly":true, "starSize":22}'></div>
                                            </div>
                                            <small>{{trans('courses.total rating score')}}</small>
                                        </div>
                                        @php
                                            $ratingDetails = $course->CourseRatingDetails['ratingDetails'];
                                            $ratingCount = $course->CourseRatingDetails['count'];
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
                                @include('website.courses.assets.courseReviews', ['courseReviews' => $course->coursereviews, 'courseId' => $course->id])

                            </section>
                        </div>
                        <!-- end course_detail_content -->
                    </div>
                </div>
            </section>

            @if(count($course->courserelatedPublished) > 0)
                <section class="sec sec_pad_top sec_pad_bottom">
                    <div class="wrapper">
                        <section class="title mbmd">
                            <h2 class="text_primary text_capitalize">{{trans('courses.Recommended courses')}}</h2>
                        </section>
                        <div id="relatedCourses">
                            <div class="courses_cards owl-carousel owl-theme relatedCourses">
                                @foreach($course->courserelatedPublished as $data)
                                    @include('website.courses.assets.mostViewedItem', ['data' => $data->relatedCourse])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>

        <!-- START MOBILE FIXED BUTTONS -->
        <div class="show-mobile fixed-buttons text-center d-none">
            @if(!$shoppingCart && !$enrolled)
                @if(Auth::check())
                    @if($course->type == Courses::TYPE_WEBINAR)
                        @if(getEventStatus($course) == "passed")
                            <a href="javascript:void(0)" class="more_button button_primary w-50 text-center mb-10 p-3" style="background-color: #cf2626;">
                                {{ trans('courses.This Webinar Has Ended') }}
                            </a>
                        @else
                            <a href="/site/enrollWebinar/{{$course->id}}" class="more_button button_primary w-50 text-center mb-10 p-3" style="background-color: #cf2626;">
                                {{ trans('courses.Watch This Webinar') }}
                            </a>
                        @endif
                    @else
                        @if($course->OriginalPrice > 0)
                            @if(count($course->certificatesContainer) > 0)


                                <a href="javascript:void(0);"
                                   onclick="openSubscriptionModal()"
                                   class="more_button button_primary w-50 text-center mb-10 p-3">
                                    <i class="fas fa-cart-plus track"></i>
                                    {{ trans('b2b.Subscribe Now') }}
                                </a>

                            @else
                                <a href="{{url('subscriptions')}}" class="more_button button_primary w-50 text-center mb-10 p-3">
                                    <i class="fas fa-cart-plus track"></i>
                                    {{trans('b2b.Subscribe Now')}}

                                    {{--                                    <div class=''>--}}
                                    {{--                                        {{getSubscriptionPrices()['subscription_yearly_before']}} {{getCurrency()}}--}}
                                    {{--                                    </div>--}}
                                </a>
                            @endif
                        @else
                            <a class="button button_primary button_large add_cart track" href="{{ url('/courses/enrollNow/id/' . $course->id) }}">
                                {{ trans('courses.Get It For Free') }}
                            </a>
                        @endif
                    @endif
                @else
                    @if($course->type == Courses::TYPE_WEBINAR)
                        @if(getEventStatus($course) == "passed")
                            <a href="javascript:void(0)" class="more_button button_primary w-50 text-center mb-10 p-3" style="background-color: #cf2626;">
                                {{ trans('courses.This Webinar Has Ended') }}
                            </a>
                        @else
                            <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="more_button button_primary w-50 text-center mb-10 p-3">
                                {{ trans('courses.Sign in to join this webinar') }}
                            </a>
                        @endif
                    @else
                        <a href="javascript:void(0)" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal" class="more_button button_primary w-50 text-center mb-10 p-3">
                            <i class="fas fa-cart-plus"></i>
                            {{trans('b2b.Subscribe Now')}}
                        </a>
                    @endif
                @endif
            @endif

            @if($enrolled && $course->type == Courses::TYPE_WEBINAR)
                @if(getEventStatus($course) == "passed")
                    <a href="javascript:void(0)" class="more_button button_primary w-50 text-center mb-10 p-3" style="background-color: #cf2626;">
                        {{ trans('courses.This Webinar Has Ended') }}
                    </a>
                @else
                    <a href="{{($course->webinar_url) ? $course->webinar_url : 'javascript:void(0)'}}" target="_blank" class="more_button button_primary w-50 text-center mb-10 p-3">
                        {{ trans('courses.Watch This Webinar') }}
                    </a>
                @endif
            @endif

            @if($enrolled && $course->type != Courses::TYPE_WEBINAR && isset($course->quiz))

                @if($coursePercent > 90  OR  (count($course->courseincludes) > 0))
                    <a href="/courses/startExam/{{$course->slug}}" class="more_button button_primary w-50 text-center mb-10 p-3">
                        {{trans('courses.start exam')}}
                    </a>
                @endif

            @endif
        </div>
        <!-- END MOBILE FIXED BUTTONS -->
        </div>
    </main>

    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=612247d00596560012d381ab&product=inline-share-buttons' async='async'></script>

    @if($course->promo_video)
        <!-- Modal -->
        <div class="modal fade" style="overflow: hidden;width: 100%;" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="Promo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered2" role="document" style="top: 20%;">
                <div class="modal-content" style="background: transparent;border: 0;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <iframe style="position: relative;width: 100%;" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="https://player.vimeo.com/video/{{ $course->promo_video }}" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
        </div>
    @endif



    <div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-4">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>


                {{-- Subscription selection section --}}
                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        {{-- Annual subscription card --}}
                        <div class="card subscription-card text-center p-3" id="annual-plan-card" data-annualFees="{{ $subscription_yearly_after }}" onclick="selectPlan('annual')">
                            <h4 class="text-primary">{{ trans('b2b.ANNUAL') }}</h4>

                            {{-- Annual icon --}}
                            <img src="{{ asset('website/subscriptions/image/annual-icon.svg') }}" alt="Annual Icon" class="img-fluid my-3" style="max-height: 120px;">

                            <div class="price-section mb-2">
                                <h5 class="fw-bold">{{ $subscription_yearly_after }} {{ getCurrency() }}/{{ trans('website.Year') }}</h5>
                                <del>{{ $subscription_yearly_before }} {{ getCurrency() }}/{{ trans('website.Year') }}</del>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        {{-- Monthly subscription card --}}
                        <div class="card subscription-card text-center p-3" id="monthly-plan-card" data-monthlyFees="{{ $subscription_monthly }}" onclick="selectPlan('monthly')">
                            <h4 class="text-success">{{ trans('b2b.MONTHLY') }}</h4>

                            {{-- Monthly icon --}}
                            <img src="{{ asset('website/subscriptions/image/monthly-icon.svg') }}" alt="Monthly Icon" class="img-fluid my-3" style="max-height: 120px;">

                            <div class="price-section mb-2">
                                <h5 class="fw-bold">{{ $subscription_monthly }} {{ getCurrency() }}/{{ trans('website.Mo') }}</h5>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Promo code form --}}
                {{--                <form id="promoForm" method="post" action="javascript:void(0);" enctype="multipart/form-data">--}}
                {{--                    {{ csrf_field() }}--}}
                {{--                    @php $promoCode = getCurrentPromoCode(null, \App\Application\Model\Promotionactive::TYPE_B2C); @endphp--}}
                {{--                    <div class="form-group">--}}
                {{--                        @if ($promoCode && $promoCode['promotions'])--}}
                {{--                            --}}{{-- Display applied promo --}}
                {{--                            <label>{{ trans('website.Coupon Applied, Click to remove') }}</label>--}}
                {{--                            <a href="javascript:void(0);" id="removePromoBtn" class="btn btn-danger btn-sm mt-1">--}}
                {{--                                <b>{{ $promoCode['promotions']['code'] }}</b> {{ trans('website.Applied Now') }}--}}
                {{--                            </a>--}}
                {{--                        @else--}}
                {{--                            --}}{{-- Promo input and submit --}}
                {{--                            <label for="code">{{ trans('website.Add Coupon Code') }}</label>--}}
                {{--                            <div class="input-group">--}}
                {{--                                <input type="text" name="code" id="code" class="form-control" placeholder="أضف كود الخصم">--}}
                {{--                                <div class="input-group-append">--}}
                {{--                                    <button type="submit" id="addPromoBtn" class="btn btn-success">--}}
                {{--                                        {{ trans('website.Add Coupon') }}--}}
                {{--                                    </button>--}}

                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endif--}}
                {{--                    </div>--}}
                {{--                </form>--}}

                {{-- Promo alert and payment container --}}
                <div id="promotionAlert" class="mt-3"></div>
                <div id="PaymentsMethods" class="mt-3"></div>

                {{-- Payment method heading --}}
                <div class="mt-4 text-center">
                    <h4 class="text-dark">{{ trans('website.Payment Method') }}</h4>
                    <p class="text-muted">{{ trans('website.Secure Checkout') }}</p>
                </div>

                {{-- Payment loading spinner --}}
                <center>
                    <div id="loading-spinner" class="text-center mt-4" style="display:none;">
                        <div class="spinner-border text-success text-center" role="status"><span class="sr-only">Loading...</span></div>
                        <p class="mt-2 text-center">جاري تحميل بوابة الدفع ... </p>
                    </div>
                </center>

                {{-- HyperPay form --}}
                <div id="hyperpayDiv" class="mt-4">
                    <form lang="ar" action="{{url('payments/verify/hyperpay')}}" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
                </div>


                <script type="text/javascript">
                    var wpwlOptions = {
                        locale: "ar",
                        paymentTarget: "_top",
                    }
                </script>

                {{--            <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=CC574C0788637C98138C590EADC478E0.uat01-vm-tx02"></script>--}}
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


                <div class="text-center mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        إغلاق
                    </button>
                </div>





            </div>
        </div>
    </div>

    <script>
        window.openSubscriptionModal = function () {
            const modal = document.getElementById('subscriptionModal');
            if (modal && typeof modal.showModal === 'function') {
                modal.showModal();
            } else {
                $('#subscriptionModal').modal('show');
            }
        }

        function selectPlan(type)
        {
            // Hide previous form and clean up (in both cases)
            $('#hyperpayDiv').hide(); // Hide the payment form
            $('#VisaDiv').hide();     // Hide VISA iframe if shown previously
            $('#PaymentsMethods').hide(); // Hide payment method section if needed

            // Optional: remove any previously injected payment script
            $("script[src*='oppwa']").remove();

            // Remove any previous selection
            $('#annual-plan-card').removeClass('selected-plan');
            $('#monthly-plan-card').removeClass('selected-plan');

            // Highlight the selected card
            if (type === 'annual') {
                $('#annual-plan-card').addClass('selected-plan');

                // Gather subscription data
                const annualFees = $('#annual-plan-card').data('annualFees') ;
                const data = {
                    amount: annualFees,
                    subscriptionType: 2,
                    numberOfUsers: null // Make sure it's globally available
                };

                $('#loading-spinner').show();
                hyperpay(JSON.stringify(data));

            } else {
                $('#monthly-plan-card').addClass('selected-plan');

                const monthlyFees = $('#monthly-plan-card').data('monthlyFees') ;
                const data = {
                    amount: monthlyFees,
                    subscriptionType: 1,
                    numberOfUsers: null
                };

                $('#loading-spinner').show();
                hyperpay(JSON.stringify(data));
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#addPromoBtn').on('click', function (e) {
                e.preventDefault();
                const form = $('#promoForm');

                $.ajax({
                    url: "{{ concatenateLangToUrl('site/insertCouponAjax') }}",
                    type: 'GET',
                    data: form.serialize(),
                    success: function (response) {
                        alert(response.text);
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function () {
                        alert('حدث خطأ أثناء إدخال الكود');
                    }
                });
            });


            $('#removePromoBtn').on('click', function () {
                $.ajax({
                    url: "{{ url('/removePromoAjax') }}",
                    type: 'GET',
                    success: function (response) {
                        if (response.success) {
                            alert(response
                                .text); // Replace with your desired success message display logic
                            location.reload(); // Optionally reload the page to reflect changes
                        } else {
                            alert(response
                                .text); // Replace with your desired error message display logic
                        }
                    },
                    error: function () {
                        alert(
                            'An error occurred. Please try again.'); // Replace with your desired error handling
                    }
                });
            });
        });
    </script>



@endsection
