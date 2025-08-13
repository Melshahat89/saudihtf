@extends(layoutExtend('website'))
@section('title')
    {{ trans('courses.my group') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection
<?php
use App\Application\Model\User;
use App\Application\Model\Courses;
use App\Application\Model\Transactions;
?>
@section('content')

    <div class="bread-crumb">
        <div class="container">
            <a href="/">{{ trans('website.home') }}</a> > 
            <span> {{ trans('courses.my group') }} </span>
        </div>
    </div>

    <div class="page-title general-gred">
        <div class="container">
            <h1>{{ trans('courses.my group') }} ({{$businessdata->name_lang}})</h1>
            <p class="mt-15">
            </p>
        </div>
    </div>


    <section class="my_enrroled">
        <div class="container">

        @if($businessdata->banner)
        {{-- //Desc --}}
        <img style="width: 100%; padding:20px;" class="w-100 p-4" src="{{ url(env('UPLOAD_PATH') . '/' . $businessdata->banner) }}" />
        @endif
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('businessdata.Users insight') }}</h3>
                </div>

                <div class="panel-body">
                    <div class="table-res-scroll">
                        <table class="table table-striped" id="user-insights-table">
                            <thead>
                            <tr>

                                <th>{{ trans('account.Full Name') }}</th>
                                <th>{{ trans('account.email') }}</th>

                                <th>{{ trans('businessdata.Enrollment Courses') }}</th>
{{--                                <th>{{ trans('businessdata.Passed Exams') }}</th>--}}
                                <th>
                                    {{ trans('businessdata.Activity') }}
                                </th>
                                <!-- <th>
                               {{ trans('businessdata.Appreciation') }}
                                </th> -->
                            </tr>
                            </thead>
                            <tbody>
                            @isset($businessgroup->businessgroupsusers)
                                @foreach($businessgroup->businessgroupsusers as $key => $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->usersBusinessCoursesEnrollments->count() }}</td>
{{--                                        <td>{{ count($user->passedexams) }}</td>--}}
                                        <td>
                                            <a href="{{ url('business/group-user-activity/'.$user->id) }}" class="btn btn-primary"><i class="fa fa-angle-right"></i></a>
                                        </td>
                                        <!-- <td><button type="button" onclick="sendCertificate()" class="btn btn-primary mr-15"><i class="lnr lnr-plus-circle"></i></button></td> -->
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </section>
@endsection
