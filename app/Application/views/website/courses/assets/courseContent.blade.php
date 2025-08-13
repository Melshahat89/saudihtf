<?php
use App\Application\Model\Courses;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonInterval;

$isEnrolledCourse = Courses::isEnrolledCourse($course->id);
?>

@if(count($course->coursesections) > 0)
    <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_list">
        <div class="text_left mbxs">
            <button type="button"
                    data-active-text="{{trans('courses.hide lectures')}}" data-text="{{trans('courses.show lectures')}}" accordion-id="#course_content_accordion_{{$course->id}}" class="button button_large button_link nopad toggle_collapse"></button>
        </div>
        <header class="course_list_header d-flex justify-content-between">
            <div class="title">{{ isset($includedTitle) ? $includedTitle : $course->title_lang}}</div>
            <div>
                @if($enrolled)
                    @if($coursePercent > 90)
                        <a href="/courses/startExam/{{$course->slug}}" style="color: white;">
                            {{trans('courses.start exam')}}
                        </a>
                    @endif
                @endif
            </div>
            <div>{{ timeLength($course->CourseDuration) }}</div>
        </header>
        <div class="accordion accordion_list" id="course_content_accordion_{{$course->id}}">
            @php $sectionNo = 1; @endphp
            @foreach ($course->coursesections as $section)

                @php $i = 0; @endphp
                @php $lecturesArr = $section->courselectures->pluck('id'); @endphp

                @if($section->courselectures)
                    <div class="card">
                        <div class="card_header ">
                            <button data-toggle="collapse" data-target="#coll_{{$course->id}}_{{$sectionNo}}" aria-expanded="true" aria-controls="coll_1" class="d-flex justify-content-between">
                                <span class="card_header_title">{{$section->title_lang}}</span>
                                <i class="fa mr-10 fa-plus" aria-hidden="true" style="place-self: center;"></i>
                            </button>
                        </div>
                        <div id="coll_{{$course->id}}_{{$sectionNo++}}" class="panel_collapse collapse">
                            <div class="card_body">
                                @foreach ($section->courselectures as $lecture)
                                    @if(Auth::check())
                                        @if($lecture->is_free OR $isEnrolledCourse)
                                            {{-- <a href="javascript:void(0)" onclick="loadModal('/courses/courseLecture/id/', {{$lecture->id}} )" data-toggle="modal" data-target="#exampleModal" class="card_body_row d-flex justify-content-between"> --}}

                                            @if($i > 0)
                                                @if(hasProgressed(Auth::user()->id, $lecturesArr[$i - 1]))

                                                    <a href="/courses/courseLecture/id/{{$lecture->id}}" class="card_body_row d-flex justify-content-between">
                                                        <div class="sub_title">
                                                            {{$lecture->title_lang}}
                                                        </div>
                                                        <span class="timing float-right">
                                                            {{durationCalc($lecture->length)}}
                                                        </span>
                                                        <span class="play_puse"><i class="far fa-play-circle"></i></span>
                                                    </a>

                                                @else
                                                    <a href="#" class="card_body_row d-flex justify-content-between">
                                                        <div class="sub_title">
                                                            {{$lecture->title_lang}}
                                                        </div>
                                                        <span class="timing float-right">
                                                            {{durationCalc($lecture->length)}}
                                                        </span>
                                                        <span class="lock"><img src="{{ asset('website') }}/images/padlock.svg"  alt=""></span>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="/courses/courseLecture/id/{{$lecture->id}}" class="card_body_row d-flex justify-content-between">
                                                    <div class="sub_title">
                                                        {{$lecture->title_lang}}
                                                    </div>
                                                    <span class="timing float-right">
                                                            {{durationCalc($lecture->length)}}
                                                        </span>
                                                    <span class="play_puse"><i class="far fa-play-circle"></i></span>
                                                </a>
                                            @endif



                                        @else
                                            <a href="javascript:void(0)" class="card_body_row d-flex justify-content-between">
                                                <div class="sub_title">
                                                    {{$lecture->title_lang}}
                                                </div>
                                                <span class="timing float-right">
                                                    {{durationCalc($lecture->length)}}
                                                </span>
                                                <span class="lock"><img src="{{ asset('website') }}/images/padlock.svg"  alt=""></span>
                                            </a>
                                        @endif
                                        @php $i++; @endphp
                                    @else
                                        <a href="javascript:void(0)" data-remote="/register" data-toggle="modal" data-dismiss="modal" data-target="#registerModal" class="card_body_row d-flex justify-content-between">
                                            <div class="sub_title">
                                                {{$lecture->title_lang}}
                                            </div>
                                            <span class="timing float-right">
                                                {{durationCalc($lecture->length)}}
                                            </span>
                                            <span class="lock"><img src="{{ asset('website') }}/images/padlock.svg"  alt=""></span>
                                        </a>
                                    @endif

                                @endforeach

                                {{-- Sectio Quiz Start--}}
                                @if(Auth::check())
                                    @if ($isEnrolledCourse)
                                        @if($section->sectionquiz)
                                            @foreach($section->sectionquiz as $sectionQuiz)
                                                <a href="/courses/sectionQuiz/id/{{$sectionQuiz->id}}" class="card_body_row d-flex justify-content-between">
                                                    <div class="sub_title">
                                                        {{$sectionQuiz['title']}}
                                                    </div>
                                                    <span class="play_puse"><i class="fa fa-check"></i></span>
                                                </a>
                                            @endforeach
                                        @endif
                                    @endif
                                @endif
                                {{-- Sectio Quiz End--}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    @if ($enrolled && !empty($course->courseresources))
        <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_resource">

            <div class="text_left mbxs">
                <button type="button" data-active-text="{{trans('courses.hide files')}}" data-text="{{trans('courses.show files')}}" accordion-id="#resource_content_accordion_{{$course->id}}"
                        class="button button_large button_link nopad toggle_collapse"></button>
            </div>

            <header class="course_list_header">
                <div class="title">{{ trans('website.Resources') }}</div>

            </header>

            <div class="accordion accordion_list" id="resource_content_accordion_{{$course->id}}">

                <div class="card">
                    <div class="card_header">
                        <button data-toggle="collapse" data-target="#coll2_{{$sectionNo}}" aria-expanded="true" aria-controls="coll_1" class="d-flex justify-content-between">
                            <span class="card_header_title">{{ trans('website.Files') }}</span>
                            <i class="fa mr-10 fa-plus" aria-hidden="true" style="place-self: center;"></i>
                        </button>
                    </div>

                    <div id="coll2_{{$sectionNo++}}" class="panel_collapse collapse">
                        <div class="card_body">
                            @foreach ($course->courseresources as $item)

                                @if($enrolled)
                                    <a href="{{url('/' . env('UPLOAD_PATH') . '/' . $item->file) }}" download class="card_body_row">
                                        @else
                                            @if(Auth::check())
                                                <a href="#p_wrapper" class="card_body_row">
                                                    @else
                                                        <a data-remote="/register" data-toggle="ajaxModal" data-dismiss="modal" class="card_body_row">
                                                            @endif
                                                            @endif

                                                            <div class="sub_title">
                                            <span class="play_puse">

                                            <i class="fas fa-cloud-download-alt"></i>
                                            </span>{{ $item->title_lang }}</div>
                                                        </a>

                                    @endforeach
                        </div>
                    </div>
                </div>



            </div>
        </section>
    @endif

@endif