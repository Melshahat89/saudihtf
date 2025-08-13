@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.User activity log') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection
@section('content')

    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.User activity log') }}</h3>
        </div>

        <div class="panel-body">

            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="active"><a href="#tab-activity" role="tab" data-toggle="tab">{{ trans('businessdata.Activity') }}</a></li>
                    <li ><a href="#tab-courses" role="tab"
                            data-toggle="tab">{{ trans('businessdata.Courses Enrolled') }}</a></li>
                    <li><a href="#tab-exams" role="tab"
                            data-toggle="tab">{{ trans('businessdata.Finished Exams') }}</a></li>
                </ul>
            </div>

            <div class="tab-content">

                <div class="tab-pane fade active in p-0 " id="tab-activity">
                   
                <div class="table-res-scroll">
                <table class="table table-striped" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>{{ trans('businessdata.User Name') }}</th>
                            <th>{{ trans('website.Email') }}</th>
                            <th>{{ trans('website.Courses') }}</th>
                            <th>
                                {{ trans('businessdata.Activity Type') }}
                            </th>
                            <th>
                                {{ trans('businessdata.Activity Date') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($logs)
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->user->email }}</td>
                                    <td>{{ $log->courses->title_lang }}</td>
                                    <td>{{ $log->getActionType() }}</td>
                                    <td>
                                        {{ $log->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
                </div>
                <div class="tab-pane fade " id="tab-courses">
                    <h2>{{ trans('businessdata.Courses Enrolled') }}</h2>
                    <div class="mt-40">
                        @isset($User->usersBusinessCoursesEnrollments)

                            @foreach ($User->usersBusinessCoursesEnrollments as $key => $course)

                <div class="row" style="margin: 20px;">
                    <div class="col-md-3">
                        <div class="card-img">
                            <img class="w-100" style="width:100%;height:180px;object-fit:cover;" src="{{large($course->image)}}" alt="{{ nl2br($course->title_lang) }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-item">
                            <h4>
                                {{ nl2br($course->title_lang) }}
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="completed enrolled-style">
                            <div class="completed">
                                <h1> {{ round(\App\Application\Model\Progress::getLectureProgress($User->id,$course->id)) }}%</h1>
                                <span >Completed</span>
                              </div>
                            {{--  <h1>{{ trans('account.Enrolled') }} </h1>  --}}
                            {{--  <span>{{ trans('account.Start your path') }} </span>  --}}
                        </div>
                        @if(finishedCourseInDays($course, $User))
                        <div class="my-btns mt-20">
                            <span >{{trans('businessdata.Finished Course In:')}} {{finishedCourseInDays($course, $User)}} </span>
                        </div>
                        @endif
                    </div>
                </div>
     
                            @endforeach

                        @endisset

                    </div>
                </div>
                <div class="tab-pane fade" id="tab-exams">
                    <h2>{{ trans('businessdata.Finished Exams') }}</h2>
                    <div class="mt-40">

                        @isset($FinishedExams)
                            @foreach($FinishedExams as $key => $exam)
                            <div class="activity-card flexCenteralign flexColmres mt-30">
                                <div class="mr-15">
                                    <img src="{{ large($exam['quiz']['courses']['image']) }}" height="100px" class="img-circle" alt="Avatar">
                                </div>
                                <div>
                                        <h4 class="bold">{{ $exam['quiz']['courses']['title_lang'] }}</h4>
                                        <span>{{ $exam['quiz']['title_lang'] }}</span> 
                                        <h2>{{ $exam['CurrentStudentPercentage'] }} %</h2>
                                </div>
                        </div> 
                            @endforeach
                            
                        @endisset
                        
                    </div>
                </div>
            </div>
            <!-- END TABBED CONTENT -->






        </div>
    </div>
@endsection
