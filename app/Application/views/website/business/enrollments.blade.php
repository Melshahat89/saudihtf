@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Enrollments') }}
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
            <h3 class="panel-title">{{ trans('businessdata.Enrollments') }}</h3>
        </div>

        <div class="panel-body">
            <div class="row brdr-top brdr-bottom ptm-20 m-0">
                <form method="get" action="#">
                    <div class="flexCenter form-group col-md-6">
                        <span class="mr-15">{{ trans('businessdata.Filter') }}</span>
                        <select name="filter-group" id="filter-group" class="form-control filter-group">
                            <option value=""></option>
                            @isset($groups)
                                @foreach ($groups as $key => $group)
                                    <option value="{{ $group->id }}" {{ request()->has('filter-group') && request()->get('filter-group') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" id="min" name="min" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('min') ? request()->get('min') : '' }}">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" id="max" name="max" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('max') ? request()->get('max') : '' }}">
                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
                <div class="form-group col-md-1">
                    <button class="btn btn-primary" onclick="resetFilter()">Reset Filter</button>
                </div>

            </div>



            <h3 class="custom-panel-title mt-40 mb-30 col-md-12">{{ trans('businessdata.Enrollments Activity Log') }}</h3>

            <span class="dividar-grey"></span>
            <div class="table-res-scroll">

                <table class="table table-striped" id="enrollments-table">
                    <thead>
                    <tr>
                        <th>{{ trans('businessdata.User Name') }}</th>
                        <th>{{ trans('businessdata.Course Name') }}</th>
                        <th>{{ trans('businessdata.Progress') }}</th>
                        <th>
                            {{ trans('businessdata.Enrollment Date') }}
                        </th>
                        <th>{{ trans('businessdata.Group Name') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($EnrollmentsLog)
                        @foreach ($EnrollmentsLog as $key => $log)
                            @isset($log->user)
                            <tr>
                                <td>{{ $log->user['name'] }}</td>
                                <td>{{ $log->courses['title_lang'] }}</td>
                                <td><div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{ round(\App\Application\Model\Progress::getLectureProgress($log->user['id'],$log->courses['id'])) }}%; color: black;">
                                            <span>{{ round(\App\Application\Model\Progress::getLectureProgress($log->user['id'],$log->courses['id'])) }}%</span>
                                        </div>
                                    </div></td>

                                <td>
                                    {{ $log->created_at }}
                                </td>
                                <td>
                                    {{ (isset($log->user->businessgroupsusers) && count($log->user->businessgroupsusers) > 0) ? ($log->user->businessgroupsusers[0]->businessgroups ? $log->user->businessgroupsusers[0]->businessgroups->name : '' ) : '' }}
                                </td>
                            </tr>
                            @endisset
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="panel">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Most Enrolled Courses</h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <div id="demo-line-chart" class="ct-chart"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}


        </div>
    </div>
@endsection