@php
    use App\Application\Model\Courses;
    use App\Application\Model\User;
    use App\Application\Model\Events;
    use Illuminate\Support\Facades\Auth;

@endphp

@extends(layoutExtend('website'))
@section('title')
    {{$lecture->title_lang}} - {{ trans('home.IGTS') }}
@endsection
@section('description')
    {{ ($lecture->courses->seo_desc) ? $lecture->courses->seo_desc_lang : $lecture->courses->description_lang }}
@endsection
@section('keywords')
    {{ ($lecture->courses->seo_keys) ? extractSeoKeys($lecture->courses->seo_keys) : defaultSeoKeys($lecture->courses->title_lang) }}
@endsection

@section('content')

    <header class="inner-page main-header lectureHead">
        <div class="conatiner-fluid">
            <div class="row">
                <div class="col-md-6 flexLeft">

                    <h5>
                        {{ $lecture->title_lang }}
                    </h5>
                </div>
                <div class="col-md-6 flexBetween">


                    <div class="progress-level">
                        @if($enrolled)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div style="color: white;">{{ trans('progress.Your Progress') }}</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="progress ">
                                        <div class="progress-bar" role="progressbar" style="width: {{$coursePercent}}%" aria-valuenow="{{$coursePercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <a href="{{ url('/courses/view/'.$lecture->courses->slug) }}" class="flexBetween back-bg">
                        <i class="flaticon-left-arrow"></i>
                        {{ trans('courses.Back to course') }}
                    </a>
                </div>
            </div>
        </div>

    </header>

    <div class="smart_bar">
        <div class="alert alert-info2 alert-dismissible fade show">
            <div class="text_center ptsm pbsm">
                <h4>{{ trans('courses.Use Google Chrome') }}</h4>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="lecturePlayer" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 p-0">
                    <div class="talk_video_wrapper">
                        <div class="flowplayer-embed-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width:100%;">
                            @if(($lecture->vdocipher_id))
                                @php
                                    $response =  \App\Application\Model\Courses::getVdoCipherOTP($lecture->vdocipher_id);
                                @endphp
                                <iframe src="https://player.vdocipher.com/v2/?otp=<?= $response->otp ?>&playbackInfo=<?= $response->playbackInfo ?>" style="width:100%;height:100%;border:none;max-width: 100%;position: absolute; right: 0px;" allowFullScreen="true" allow="encrypted-media"></iframe>
                            @elseif($lecture->vid_playbackInfo)
                                <iframe name="iframe1" id="myVideo" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="{{$lecture->vid_playbackInfo}}" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay" oncontextmenu="return false"></iframe>
                            @else
                                <iframe name="iframe1" id="myVideo" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="https://player.vimeo.com/video/<?php echo $lecture->video_file; ?>" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay" oncontextmenu="return false"></iframe>
                            @endif
                        </div>

                        <!-- end video -->
                    </div>
                    <div class="container">
                        <div class="lecture-content">
                            <div class="tabs-container">
                                <ul class="nav nav-pills flexBetween custom-tab" id="pills-tab" role="tablist" style="justify-content: center;">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"> {{ trans('courses.Overview') }} </a>
                                    </li>
                                    <?php if($enrolled) {?>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">--}}
{{--                                            {{ trans('courses.Discuss') }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" data-toggle="pill" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">--}}
{{--                                            {{ trans('courses.notes') }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                                            {{ trans('courses.Resources') }}
                                        </a>
                                    </li>
                                    <?php }else{?>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link disabled" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">{{ trans('courses.Discuss') }}</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link disabled" data-toggle="pill" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">{{ trans('courses.notes') }}</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link disabled" data-toggle="pill" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">{{ trans('courses.Resources') }}</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                        <p>
                                            {!! $lecture->courses->description_lang !!}
                                        </p>
                                        <div class="card-data">
                                            <p>
                                                {{ trans('courses.This course includes') }} :</p>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 flexCol">
                                              <span><i class="flaticon-play-button"></i>
                                              {{ $lecture->courses->getHoursLectures() }}
                                                  {{ trans('courses.hours on-demand video') }}
                                                </span>

                                                    <?php if($lecture->courses->getTotalResourcesCount() > 0){ ?>
                                                    <span><i class="flaticon-download-arrow"></i><?=$lecture->courses->getTotalResourcesCount(); ?>  {{ trans('courses.downloadable resources') }}</span>
                                                    <?php }?>
                                                    <span><i class="flaticon-global"></i> {{ trans('courses.Full lifetime access') }} </span>
                                                </div>
                                                <div class="col-md-6 flexCol">


                                                    <span><i class="flaticon-graduation-cap"></i> {{ trans('courses.Certificate of Completion') }} </span>
                                                    <span><i class="flaticon-speaker"></i>{{ languages()[1] }}</span>
                                                    @if($lecture->courses->created_at)
                                                        <span><i class="flaticon-book"></i> {{ trans('courses.created at') }} {{ $lecture->courses->created_at }}</span>
                                                    @endif
                                                    @if($lecture->courses->updated_at)
                                                        <span><i class="flaticon-book"></i> {{ trans('courses.updated at') }} {{ $lecture->courses->updated_at }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @if($enrolled)
{{--                                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">--}}
{{--                                            <section class="Discuss">--}}
{{--                                                @if($lecture->lecturequestions)--}}
{{--                                                    <!-- Question Card-->--}}
{{--                                                    @foreach($lecture->lecturequestions as $question )--}}
{{--                                                        <div class="comment-card mb-20">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-3 flexLeft">--}}
{{--                                                                    @if($question->user)--}}
{{--                                                                        <img width="50px"  src="{{ large($question->user->image) }}">--}}
{{--                                                                    @else{--}}
{{--                                                                    <img width="50px"  src="{{ asset('meduo') }}/placeholder.png">--}}
{{--                                                                    @endif--}}
{{--                                                                    <p>--}}
{{--                                                                        {{ $question->created_at->format('d-m-Y') }}--}}
{{--                                                                        <br>--}}
{{--                                                                        <a href="#">{{  ($question->user) ? charlimit($question->user->name, 10) : trans('website.Anonymous')  }}</a>--}}
{{--                                                                    </p>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-9 flexCol">--}}
{{--                                                                    <h5>--}}
{{--                                                                        {{ ($question->question_title) ? $question->question_title : $question->question_description }}--}}
{{--                                                                    </h5>--}}
{{--                                                                    <div class="comment-action">--}}
{{--                                                                        <a  href="#" class="addAnswerModal"  data-id="<?php echo $question->id?>" data-target="#addAnswerModal" data-toggle="modal" data-dismiss="modal">--}}
{{--                                                                            <i class="flaticon-comment"></i> {{ trans('courses.Reply') }}--}}
{{--                                                                        </a>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- Answer Card-->--}}
{{--                                                        @if($question->lecturequestionsanswers)--}}
{{--                                                            <!--Answer Card-->--}}
{{--                                                            @foreach($question->lecturequestionsanswers as $answer )--}}
{{--                                                                <div class="comment-card answer-q mb-20 mr-20 ml-20">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-3 flexLeft">--}}
{{--                                                                            <p>{{ $answer->created_at->format('d-m-Y') }}<br>--}}
{{--                                                                                <a href="#">{{ ($answer->user) ? $answer->user->name :  trans('website.Anonymous') }}</a>--}}
{{--                                                                            </p>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            @if($answer->user->group_id == User::TYPE_INSTRUCTOR)--}}
{{--                                                                                <div class="badges">--}}
{{--                                                                                    <span class="best-seller-badge">Instructor Answer</span>--}}
{{--                                                                                </div>--}}
{{--                                                                            @endif--}}
{{--                                                                            <p>--}}
{{--                                                                                {{$answer->answer}}--}}
{{--                                                                            </p>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}

{{--                                                @include('website.courses.assets.addQuestionForm', ['lectureId'=>$lecture->id])--}}

{{--                                                <div class="clear"></div>--}}
{{--                                            </section>--}}
{{--                                        </div>--}}
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                                            <h3 class="mb-20"> {{ trans('courses.Downloadable Content') }}</h3>
                                            <div class="download-rows">

                                                @foreach ($lecture->courses->courseresources as $item)
                                                    <a target="_blank" href="{{ url(env("UPLOAD_PATH")."/".$item->file) }}" class="flexLeft">
                                                        <i class="download-res mr-10"></i>
                                                        <p>{{ $item->title_lang }}</p>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>

{{--                                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <h3 class="mb-20"> {{ trans('courses.notes') }}</h3>--}}
{{--                                                <div>--}}
{{--                                                    <button class="button button_primary addNoteModal" data-target="#addNoteModal" data-toggle="modal" data-dismiss="modal">{{ trans('courses.Add Note') }} <i class="fas fa-plus"></i></button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="download-rows">--}}

{{--                                                @foreach ($lecture->coursesnotes as $item)--}}
{{--                                                    <a target="_blank" class="flexLeft">--}}
{{--                                                        <p class="mr-2 ml-2"><i class="fas fa-clock mr-2 ml-2"></i> {{$item->Time}}</p>--}}
{{--                                                        <p>{{ $item->note }}</p>--}}
{{--                                                    </a>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 p-0 side-lect">
                    @if($enrolled)
                        <div class="p-2">
                            {{ trans('courses.locked lectures note') }}
                        </div>
                    @endif
                    <div class="accordion course-accordion" id="accordionExample">

                        <?php $sectionNo = 1;?>
                        @foreach ($lecture->courses->coursesections as $section)
                            @php $i = 0; @endphp
                            @php $lecturesArr = $section->courselectures->pluck('id'); @endphp

                            <div class="card">
                                <div class="card-header" id="headingOne_<?php echo $sectionNo; ?>">
                                    <h2 class="mb-0">
                                        <a type="button" class="btn btn-link flexBetween" data-toggle="collapse" data-target="#collapse_<?php echo $sectionNo; ?>">
                                            <div class="acco-title flexLeft">
                                                <i class="fa fa-plus mr-10"></i>
                                                <span>{{ $section->title_lang }}</span>
                                            </div>
                                            <p>{{ count($section->courselectures) }}   {{ trans('courses.lectures') }}</p>
                                            <p>{{ $section->HoursLectures }}</p>

                                        </a>
                                    </h2>
                                </div>
                                <div id="collapse_<?php echo $sectionNo; ?>" class="collapse show" aria-labelledby="headingOne_<?php echo $sectionNo++; ?>" data-parent="#accordionExample">

                                    @foreach ($section->courselectures as $lecture1)

                                        <div class="course-line flexBetween watched">
                                            <div class="flexLeft">
                                                @if($lecture1->event_id)
                                                    @php $event = Events::find($lecture1->event_id); @endphp
                                                    <i class="flaticon-play-button mr-10 ml-20"></i>
                                                    {{ $event->title_lang }}
                                                @else
                                                    <i class="flaticon-play-button mr-10 ml-20"></i>
                                                    {{ $lecture1->title_lang }}
                                                @endif

                                                @if($lecture1->courses->type == 6)
                                                    (
                                                    @php
                                                        $status = getEventStatus($lecture1);
                                                    @endphp
                                                    <p class="card-date"> {{ ($status == "passed") ? trans('website.Started at') : trans('website.Starts at') }}  : {{$lecture->start_date }}</p>

                                                    )
                                                @endif
                                            </div>
                                            <div class="flexBetween">

                                                @if(Auth::check())


                                                    @if ($lecture1->event_id)
                                                        @php $event = Events::find($lecture1->event_id); $i++; @endphp
                                                        <a class="mr-20" href="{{ url('/events/view/' . $lecture1->event_id) }}">

                                                            {{ $event->title_lang }}

                                                        </a>

                                                    @else

                                                        @if ($lecture1->is_free)
                                                            <a class="mr-20 ml-20" href="{{ url('/courses/courseLecture/id/'.$lecture1->id) }}" {{ ($lecture1->is_webinar) ? 'target="_blank"' : ''}}>
                                                                {{ ($lecture1->is_free)? trans('courses.Watch Free') : trans('courses.Preview') }}
                                                            </a>
                                                        @elseif(!$lecture1->is_free && $enrolled)

                                                            @if($i > 0)

                                                                @if(hasProgressed(Auth::user()->id, $lecturesArr[$i - 1]))

                                                                    <a class="mr-20 ml-20"  href="{{ url('/courses/courseLecture/id/' . $lecture1->id) }}" {{ ($lecture1->is_webinar) ? 'target="_blank"' : ''}}>
                                                                        {{ trans('courses.Preview') }}
                                                                    </a>
                                                                @else
                                                                    <a class="mr-20 ml-20 disabled">
                                                                        {{ trans('courses.Preview') }}
                                                                    </a>
                                                                @endif
                                                            @else
                                                                <a class="mr-20 ml-20"  href="{{ url('/courses/courseLecture/id/' . $lecture1->id) }}" {{ ($lecture1->is_webinar) ? 'target="_blank"' : ''}}>
                                                                    {{ trans('courses.Preview') }}
                                                                </a>
                                                            @endif

                                                        @else
                                                            <a class="mr-20 ml-20 disabled">
                                                                {{ trans('courses.Preview') }}
                                                            </a>
                                                        @endif

                                                        @php $i++; @endphp

                                                    @endif

                                                @else
                                                    @if($lecture1->event_id)

                                                        @php $event = Events::find($lecture1->event_id); @endphp

                                                        <a class="mr-20  <?= $lecture1->is_free ? '' : 'disabled' ?>" href="#" data-dismiss="modal" data-remote="/login"data-toggle="modal" data-target="#loginModal">{{ $event->title_lang }}
                                                        </a>

                                                    @else

                                                        <a class="mr-20  <?= $lecture1->is_free ? '' : 'disabled' ?>" href="#" data-dismiss="modal" data-remote="/login"data-toggle="modal" data-target="#loginModal">{{ $lecture1->is_free ? trans('courses.Watch Free') : trans('courses.Preview') }}
                                                        </a>

                                                    @endif
                                                @endif
                                                <p class="mb-0">
                                                @if($lecture1->web_id)
                                                    <h5><span class="badge badge-secondary">{{ getZoomStatus($lecture1) }}</span></h5>
                                                @else
                                                    @if($lecture1->video_file)
                                                        @php
                                                            $duration = $lecture1->length;
                                                        @endphp

                                                        @if($lecture1->event_id)

                                                            <h5><span class="badge badge-secondary">{{ trans('events.event') }}</span></h5>

                                                            @else

                                                                @if ($duration >= 3600)
                                                                    {{ gmdate('H:i:s', $duration) }}
                                                                @else
                                                                    {{ gmdate('i:s', $duration) }}
                                                                @endif

                                                            @endif
                                                            @endif
                                                            @endif
                                                            </p>
                                            </div>
                                        </div>

                                    @endforeach


                                        {{-- Sectio Quiz Start--}}
                                        @if(Auth::check())
                                            @if ($enrolled)
                                                @if($section->sectionquiz)
                                                    @foreach($section->sectionquiz as $sectionQuiz)
                                                        <div class="course-line flexBetween watched">
                                                            <div class="flexLeft">
                                                                <i class="flaticon-pencil mr-10 ml-20"></i>
                                                                    {{$sectionQuiz['title']}}
                                                            </div>
                                                            <div class="flexBetween">

                                                                <a class="mr-20 ml-20"  href="/courses/sectionQuiz/id/{{$sectionQuiz->id}}">

                                                                    {{trans('account.Start Now')}}
                                                                    <span class="play_puse"><i class="fa fa-play-circle"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>


                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                        {{-- Sectio Quiz End--}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addAnswerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header flexRight">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 p-0 sign-tabs">
                    {{-- <div class="m-search-modal"> --}}

                    @if(Auth::check())
                        <form action="{{ concatenateLangToUrl('lecturequestionsanswers/item') }}" id="" class="login-form  col-md-12" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="lecturequestions_id" id="lecturequestions_id" value="">
                            <input type="hidden" name="instructor_id" value="{{ $lecture->courses->instructor_id }}">
                            @if ($errors->has("lecturequestions_id"))
                                <div class="alert alert-danger">
                                        <span class="help-block">
                                            <strong>{{ $errors->first("lecturequestions_id") }}</strong>
                                        </span>
                                </div>
                            @endif
                            <div class="input-group">
                                <textarea name="answer" type="text" class="form-control" placeholder="{{ trans('faq.answer') }}" aria-label="Your answer"></textarea>
                            </div>
                            <div class="text-right p-20">
                                <button type="submit" class="add-to-cart">
                                    {{ trans('courses.Send Now') }}
                                </button>
                            </div>
                        </form>
                    @else
                        <a class="button button_primary_reverse text_capitalize" href="#" data-dismiss="modal" data-remote="/login"data-toggle="modal" data-target="#loginModal">{{ trans('website.Register now to be able to add a comment') }} </a>

                    @endif
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>


    @if(Auth::check())
        <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header flexRight">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0 p-0 sign-tabs">
                        <form action="{{ concatenateLangToUrl('coursesnotes/item') }}" id="" class="login-form  col-md-12" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="courses_id" value="{{ $lecture->courses->id }}">
                            <input type="hidden" name="lecture_id" value="{{ $lecture->id }}">
                            <input type="hidden" name="seconds" id="seconds" value="">
                            <div class="input-group">
                                <textarea name="note" type="text" class="form-control" placeholder="{{ trans('courses.notes') }}" aria-label="Your answer"></textarea>
                            </div>
                            <div class="text-right p-20">
                                <button type="submit" class="add-to-cart">
                                    {{ trans('courses.Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>

        $(document).ready(function(){

            const iframe = document.querySelector("iframe");
            const player = VdoPlayer.getInstance(iframe);

            @if(request()->get('seconds'))
                player.video.currentTime = {{ request()->get('seconds') }};
            @elseif(request()->old('seconds'))
                player.video.currentTime = {{ request()->old('seconds') }};
            @endif

            $(document).on("click", ".addAnswerModal", function () {
                var questionID = $(this).data('id');

                $(".modal-body #lecturequestions_id").val( questionID );
            });

            $(document).on("click", ".addNoteModal", function () {

                player.video.pause();

                let seconds = player.video.currentTime;

                $(".modal-body #seconds").val( seconds );
            });

            $(document).on("click", ".submit-assessment", function () {
                var assessmentID = $(this).data('id');

                $(".modal-body #assessment_id").val( assessmentID );
            });
        });

        $(window).on('keydown',function(event)
        {
            if(event.keyCode==123)
            {
                // alert('Entered F12');
                return false;
            }
            else if(event.ctrlKey && event.shiftKey && event.keyCode==73)
            {
                // alert('Entered ctrl+shift+i')
                return false;  //Prevent from ctrl+shift+i
            }
            else if(event.ctrlKey && event.keyCode==73)
            {
                // alert('Entered ctrl+shift+i')
                return false;  //Prevent from ctrl+shift+i
            }
        });
        $(document).on("contextmenu",function(e)
        {
            // alert('Right Click Not Allowed')
            //e.preventDefault();
        });
    </script>

    <script>
        $(document).on('ready', function(){
            const iframe = document.querySelector("iframe");
            const player = VdoPlayer.getInstance(iframe);
            // setInterval(() => {
            //     player.api.getTotalPlayed().then((tp) => {
            //         // tpEl.innerHTML = `Total Played(s): ${tp}`;
            //         console.log(`Total Played(s): ${tp}`);
            //     });
            //     player.api.getTotalCovered().then((tc) => {
            //         // tcEl.innerHTML = `Total Covered(s): ${tc}`;
            //         console.log(`Total Covered(s): ${tc}`);
            //     });
            // }, 10000);
        });

    </script>
@endsection
