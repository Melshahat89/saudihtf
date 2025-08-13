@php
    use App\Application\Model\Courses;
    use App\Application\Model\User;
    use App\Application\Model\Events;
    use Illuminate\Support\Facades\Auth;

@endphp

@extends(layoutExtend('website'))
@section('title')
    {{ $model->title }} - {{ trans('home.IGTS') }}
@endsection
@section('description')
    {{ ($model->courses->seo_desc) ? $model->courses->seo_desc_lang : $model->courses->description_lang }}
@endsection
@section('keywords')
    {{ ($model->courses->seo_keys) ? extractSeoKeys($model->courses->seo_keys) : defaultSeoKeys($model->courses->title_lang) }}
@endsection


@push('css')
    <style>
        /* Hidden class most be use for hide element is examwizerd, usally it's exsists by defualt in bootstrap' */
        .hidden {
            display: none!important;
        }

        /* Disabled class used for disable element is examwizerd, usally it's exsists by defualt in bootstrap' */
        .disabled {
            pointer-events: none;
            cursor: not-allowed;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            box-shadow: none;
            opacity: .2;
        }


        /* Temp Style Just For demo */
        body {
            padding-bottom: 60px;
        }


    </style>
@endpush

@section('content')

    <header class="inner-page main-header lectureHead">
        <div class="conatiner-fluid">
            <div class="row">
                <div class="col-md-6 flexLeft">
                    <h5>
                        {{ $model->title }}
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
                    <a href="{{ url('/courses/view/'.$model->courses->slug) }}" class="flexBetween back-bg">
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
                        {{--                        <div class="flowplayer-embed-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width:100%;">--}}
                        <div class="flowplayer-embed-container">


                            @if($studentExam->status == 4 )

                                    <?php if($isPassed == 1){?>
                                <section class="questions mt-40">
                                    <div class="container">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('website') }}/images/succes.svg" alt="..." >
                                            </div>
                                            <div class="col-md-8 succes-container">
                                                <div class="grade mt-20">
                                                    <h1><?php echo $percentage . "%";?></h1>
                                                    {{--                                                    <span><strong> {{ trans('website.Congratulations') }} ,</strong>--}}
                                                    {{--                                                  {{ trans('website.You are passed the exam successfully') }}--}}
                                                    </span>
                                                </div>
                                                <br>
                                                <p class="succes-msg mb-10"><i class="right-answers" ></i> <?php echo $correctansweredQuestions;?>  {{ trans('website.Correct answers') }} </p>
                                                <p class="wrong-msg mb-10"><i class="wrong-answers" ></i> <?php echo $totalQuestions - $correctansweredQuestions;?>  {{ trans('website.Wrong answers') }}</p>
                                                <p class="total-msg mb-10"><i class="all-answers" ></i> <?php echo $totalQuestions;?>  {{ trans('website.Total questions') }}</p>
                                            </div>
                                        </div>
                                        {{--                                        --}}
                                        {{--                                        <div class="action">--}}
                                        {{--                                            <a class="button button_primary button_large m-4 d-flex justify-content-center text_capitalize" href="{{url('/quiz/answers')}}/{{$studentExam->id}}" ><span>{{ trans('website.View Answers') }} </span></a>--}}
                                        {{--                                        </div>--}}
                                    </div>


                                </section>

                                <?php }else{?>
                                <section class="questions mt-40">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('website') }}/images/fail.svg" alt="..." >
                                            </div>
                                            <div class="col-md-8 succes-container fail-container">
                                                <div class="grade mt-20">
                                                    <h1><?php echo $percentage . "%";?></h1>
                                                    <span><strong>{{ trans('website.Unfortunately') }} ,</strong>
                                                   {{ trans('website.You are failed to pass the exam') }}</span>
                                                </div>
                                                <br>
                                                <p class="succes-msg mb-10"><i class="right-answers" ></i> <?php echo $correctansweredQuestions;?>  {{ trans('website.Correct answers') }} </p>
                                                <p class="wrong-msg mb-10"><i class="wrong-answers" ></i> <?php echo $totalQuestions - $correctansweredQuestions;?>  {{ trans('website.Wrong answers') }}</p>
                                                <p class="total-msg mb-10"><i class="all-answers" ></i> <?php echo $totalQuestions;?>  {{ trans('website.Total questions') }}</p>
                                            </div>
                                        </div>
                                        <div class="action-bar flexRight  mt-40 mb-40 next-step">
                                            <a class="view-more-section ml-10 mb-10 disable-reexam-btn" ><span>{{ trans('website.Re-Exam on') }}<?php echo date(" Y-m-d", ($studentExam->start_time + 14*24*60*60))?> </span></a>
                                        </div>
                                        <div class="action">
                                            <a class="button button_primary button_large m-4 d-flex justify-content-center text_capitalize" href="{{url('/quiz/answers')}}/{{$studentExam->id}}" ><span>{{ trans('website.View Answers') }} </span></a>
                                        </div>
                                    </div>

                                </section>
                                <?php }?>

                            @else
                                <section class="questions">
                                    <div class="container">
                                        <div class="timer-count">
                                            <div class="timer-content">
                                                <div class="quiz_number"> {{ trans('website.Question') }}
                                                    <span class="" id="current-question-number-label">1</span>
                                                    {{ trans('website.From') }}
                                                    <span class=""><?php echo sizeof($model->sectionquizquestions); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <header class="quiz_progress_head">
                                            <div class="quiz_timing">

                                            </div>
                                        </header>

                                        <form id="examwizard-question" method="post" class="mtlg">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="exam" value="<?php echo $model->id;?>"  />
                                                <?php $i = 1; ?>
                                                <?php foreach ($model->sectionquizquestions as $question) { ?>
                                                    <!--// Quetion with answers-->
                                            <div class="question <?php if ($i > 1) {echo "hidden";} ?>" data-question="<?php echo $i++; ?>">
                                                <h5 class="q-title mt-40 mb-40"><?php echo $question->question; ?></h5>
                                                    <?php $a = 1; ?>
                                                    <?php foreach ($question->sectionquizchoise as $choice) { ?>
                                                <div class="form-check mb-40">
                                                    <input style="margin-bottom: 10px;" class="form-check-input mr-2 ml-2" type="radio" data-alternatetype="radio"
                                                           name="question<?php echo $question->id; ?>" data-alternateName="answer[<?php echo $i - 2; ?>]"
                                                           data-alternateValue="<?php echo $choice->choise; ?>" value="<?php echo $choice->id; ?>"
                                                           id="answer-<?php echo $i - 2; ?>-<?php echo $a++; ?>">
                                                    <label class="form-check-label exam_question" for="exampleRadios1">
                                                            <?php echo $choice->choise; ?>
                                                    </label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>

                                            <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                                            <input type="hidden" value="<?php echo sizeof($model->sectionquizquestions); ?>" id="totalOfQuestion" name="totalOfQuestion" />
                                            <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />

                                            <div class="action-bar mb-40 next-step">
                                                <div class="row">
                                                    <div class="col-md-10 mb-20">
                                                        <div class="flexBetween">
                                                            <a class="view-more-section disabled" id="back-to-prev-question" href="javascript:void(0);"><i class="flaticon-left-arrow"></i> <span> {{ trans('website.Back') }}</span></a>
                                                            <a class="view-more-section" id="go-to-next-question" href="javascript:void(0);"><span>{{ trans('website.Next') }}</span> <i class="flaticon-right-arrow-1"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-20 flexCenter">
                                                        <a class="view-more-section" id="finishExams" data-toggle="modal" data-target="#examModal"  href="javascript:void(0);" >
                                                            <span> {{ trans('website.Finish') }}</span></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </section>
                            @endif
                        </div>

                        <!-- end video -->
                    </div>
                    <div class="container">
                        <div class="lecture-content">
                            <div class="tabs-container">
                                <ul class="nav nav-pills flexBetween custom-tab" id="pills-tab" role="tablist">
                                    <li class="nav-item col-md-5">
                                        <a class="nav-link active" style="text-align: center" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                            {{ trans('courses.Overview') }}
                                        </a>
                                    </li>
                                    <?php if($enrolled) {?>
                                    <li class="nav-item col-md-5">
                                        <a class="nav-link" data-toggle="pill" href="#tab-3"  style="text-align: center" role="tab" aria-controls="tab-3" aria-selected="false">
                                            {{ trans('courses.Resources') }}
                                        </a>
                                    </li>
                                    <?php }else{?>
                                    <li class="nav-item col-md-5">
                                        <a class="nav-link  disabled" data-toggle="pill"  style="text-align: center" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                                            {{ trans('courses.Resources') }}
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane  fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                        <p>
                                            {!! $model->courses->description_lang !!}
                                        </p>
                                        <div class="card-data">
                                            <p>
                                                {{ trans('courses.This course includes') }} :</p>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 flexCol">
                                              <span><i class="flaticon-play-button"></i>
                                              {{ $model->courses->getHoursLectures() }}
                                                  {{ trans('courses.hours on-demand video') }}
                                                </span>

                                                    <?php if($model->courses->getTotalResourcesCount() > 0){ ?>
                                                    <span><i class="flaticon-download-arrow"></i><?=$model->courses->getTotalResourcesCount(); ?>  {{ trans('courses.downloadable resources') }}</span>
                                                    <?php }?>
                                                    <span><i class="flaticon-global"></i> {{ trans('courses.Full lifetime access') }} </span>
                                                </div>
                                                <div class="col-md-6 flexCol">


                                                    <span><i class="flaticon-graduation-cap"></i> {{ trans('courses.Certificate of Completion') }} </span>
                                                    <span><i class="flaticon-speaker"></i>{{ languages()[1] }}</span>
                                                    @if($model->courses->created_at)
                                                        <span><i class="flaticon-book"></i> {{ trans('courses.created at') }} {{ $model->courses->created_at }}</span>
                                                    @endif
                                                    @if($model->courses->updated_at)
                                                        <span><i class="flaticon-book"></i> {{ trans('courses.updated at') }} {{ $model->courses->updated_at }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @if($enrolled)

                                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                                            <h3 class="mb-20"> {{ trans('courses.Downloadable Content') }}</h3>
                                            <div class="download-rows">

                                                @foreach ($model->courses->courseresources as $item)
                                                    <a target="_blank" href="{{ url(env("UPLOAD_PATH")."/".$item->file) }}" class="flexLeft">
                                                        <i class="download-res mr-10"></i>
                                                        <p>{{ $item->title_lang }}</p>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>


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
                        @foreach ($model->courses->coursesections as $section)
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




    <script src="{{ asset('website') }}/js/jquery-3.3.1.min.js"></script>


    <script src="{{ asset('website') }}/js/examwizard.min.js"></script>
    <script>
        function formSubmit()
        {
            document.getElementById("examwizard-question").submit();
        }

        var examWizard = $.fn.examWizard({
            finishOption: {
                enableModal: true,
                callBack: function () {
//                $( "#examwizard-question" ).submit();
                }
            },
            quickAccessOption: {
                quickAccessPagerItem: 9,
            },
        });


    </script>

    <script>

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

    <div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header flexRight">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="mt-20 mb-40 text-center">{{ trans('website.Are you sure you want to finish this exam?') }} </h3>
                    <div class="flexCenter">
                        <button type="button" onclick="formSubmit()" class="add-to-cart mr-20 finishFinalExam" style="margin-left: 5px;">{{ trans('website.save answers to finish the exam') }}</button>
                        <button type="button" class="add-to-cart ml-20 button_default" data-dismiss="modal"> {{ trans('website.close') }}</button>

                    </div>
                </div>
            </div>
        </div>



    </div>


@endsection
