@extends(layoutExtend('website'))
@section('title')
{{ trans('account.My Progress') }}
@endsection
@section('description')
{{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
{{ trans('home.MeduoHomeKeywords') }}
@endsection

@section('content')


@include('website.account.profileBrief', ['page' => "myNotes"])


<section class="sec sec_pad_top sec_pad_bottom bg_lightgray " id="">
    <div class="wrapper">
        <section class="title mblg">
            <h2 class="text_primary text_capitalize">{{trans('courses.notes')}}</h2>
        </section>

        <div class="row">
            <div class="col-md-12">
                @foreach($coursesnotes as $notesPerCourse)
                <div class="accordion accordion_list" id="course_note_accordion_{{$notesPerCourse->first()->slug}}">
                    <div class="card">
                        <div class="card_header ">
                            <button data-toggle="collapse" data-target="#coll_{{$notesPerCourse->first()->courses->id}}" aria-expanded="true" aria-controls="coll_1" class="d-flex justify-content-between">
                                <span class="card_header_title">{{$notesPerCourse->first()->courses->title_lang}}</span>
                                <i class="fa mr-10 fa-plus" aria-hidden="true" style="place-self: center;"></i>
                            </button>
                        </div>
                        <div id="coll_{{$notesPerCourse->first()->courses->id}}" class="panel_collapse collapse">
                            <div class="card_body">
                                <div class="row" style="background: #f7f7f7 !important;">
                                    @foreach($notesPerCourse as $note)
                                    <div class="col-md-6 p-4">
                                        <div class="card w-100">
                                            <div class="card-body d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title">{{$note->lecture->title_lang}}</h5>
                                                    <p class="card-text">{{$note->note}}</p>
                                                    <div class="actions">
                                                        <form method="get" action="/courses/courseLecture/id/{{$note->lecture->id}}">
                                                            <input name="seconds" type="hidden" value="{{$note->seconds}}">
                                                            <button class="button button_primary button_small text_capitalize" type="submit">{{trans('courses.view in lecture')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-clock mr-2 ml-2"></i> {{$note->Time}}
                                                    <div class="note-buttons">
                                                        <i class="fas fa-edit" onclick="loadModal('/coursesnotes/item/', '{{$note->id}}')" id="{{$note->id}}" data-target="#editNoteModal" data-toggle="modal" data-dismiss="modal"></i>
                                                        <i class="fas fa-trash" onclick="deleteThisItem(this)" data-link="{{ url('/coursesnotes/'.$note->id.'/delete') }}" data-cancel-txt="{{ trans('home.Cancel') }}" data-confirm="{{ trans('home.Yes, delete it!') }}" data-note="{{ trans('home.You will not be able to recover this Item Again!') }}" data-sure="{{ trans('home.Are you sure?') }}"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>


<section class="sec sec_pad_top sec_pad_bottom bg_lightgray " id="weekly_goal">
    <div class="wrapper">
        <section class="title mblg">
            <h2 class="text_primary text_capitalize">{{trans('account.Weekly Goals')}}</h2>
        </section>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center" style="height: 70px;">
                    @if(auth()->user()->WeeklyTarget)
                    <div class="d-flex justify-content-around">
                        <span>{{trans('account.Week')}}: {{$weekFrom}} - {{$weekTo}}</span>
                        @if($weeklyRemainingMinutes == 0)
                        <p>{{trans('account.Congratulations, You have reached your weekly goal')}}</p>
                        @else
                        <p>{{trans('account.You have got')}} {{$weeklyRemainingMinutes}} {{ trans('account.more minutes to reach your weekly goal')}}</p>
                        @endif
                        <a href="javascript: void(0)" data-dismiss="modal" data-toggle="modal" data-target="#weeklyTargetModal">{{trans('account.Edit Goal')}}</a>
                    </div>
                    
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$weeklyCurrentProgress}}%;" aria-valuenow="{{$weeklyCurrentProgress}}" aria-valuemin="0" aria-valuemax="100">{{$weeklyCurrentProgress}}%</div>
                    </div>
                    @else
                        <button style="width: 100%;height: 50px; border-style: dashed;" data-dismiss="modal" data-toggle="modal" data-target="#weeklyTargetModal">{{trans('account.specify your weekly goal')}} +</button>
                    @endif
                </div>
                <div class=" card-body row text-center">
                        <div class="col-md-6">
                            <div>
                                <i class="fas fa-clock mr-2 ml-2 mr-2"></i>
                                <span>{{$weeklyViewedHours}}</span>
                            </div>

                            {{trans('account.learning hours')}}
                        </div>
                        <div class="col-md-6">
                            <div>
                                <i class="fas fa-play-circle ml-2 mr-2"></i>
                                <span>{{$weeklyViewedLectures}}</span>
                            </div>
                            {{trans('account.finished lectures')}}
                        </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flexRight">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 p-0 sign-tabs" id="modalBody">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="weeklyTargetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header flexRight">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 p-0 sign-tabs" id="modalBody">
                <form method="POST" action="/usertargets/item" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="weekly-target-wrapper">
                        <input type="hidden" name="type" value="2">
                        <input type="radio" name="target" id="option-1" value="15" {{ (auth()->user()->WeeklyTarget && auth()->user()->WeeklyTarget->target == 15) ? 'checked' : '' }}>
                        <input type="radio" name="target" id="option-2" value="30" {{ (auth()->user()->WeeklyTarget && auth()->user()->WeeklyTarget->target == 30) ? 'checked' : '' }}>
                        <input type="radio" name="target" id="option-3" value="60" {{ (auth()->user()->WeeklyTarget && auth()->user()->WeeklyTarget->target == 60) ? 'checked' : '' }}>
                        <input type="radio" name="target" id="option-4" value="120" {{ (auth()->user()->WeeklyTarget && auth()->user()->WeeklyTarget->target == 120) ? 'checked' : '' }}>
                        <label for="option-1" class="option option-1">
                            <div class="dot"></div> <span>{{trans('account.15 minutes')}}</span>
                        </label>
                        <label for="option-2" class="option option-2">
                            <div class="dot"></div> <span>{{trans('account.30 minutes')}}</span>
                        </label>
                        <label for="option-3" class="option option-3">
                            <div class="dot"></div> <span>{{trans('account.60 minutes')}}</span>
                        </label>
                        <label for="option-4" class="option option-4">
                            <div class="dot"></div> <span>{{trans('account.120 minutes')}}</span>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{trans('home.save')}}</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('account.cancel')}}</button>
                @if(auth()->user()->WeeklyTarget)
                <a href="/usertargets/{{auth()->user()->WeeklyTarget->id}}/delete" class="btn btn-secondary">{{trans('account.remove goal')}}</a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection