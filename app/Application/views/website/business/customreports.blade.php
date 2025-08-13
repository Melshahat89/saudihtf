@extends(layoutBusiness())
@section('title')
{{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Custom Reports') }}
@endsection
@section('description')
{{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
{{ trans('home.MeduoHomeKeywords') }}
@endsection
@section('content')



<!-- HomePage -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title m-0">{{trans('businessdata.Custom Reports')}}</h3>
    </div>
    <div class="panel-body">

        <div class="row brdr-top brdr-bottom ptm-20 m-0">
            <form method="get" action="#">
                <div class="flexCenter form-group col-md-6">
                    <span class="mr-15">{{ trans('businessdata.Input Fields') }}</span>
                    <select name="filters[]" id="filter-group" class="form-control filter-group select2" multiple>
                       <option value="username" {{ (request()->has('filters') && in_array('username', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.User Name') }}</option>
                       <option value="mobile" {{ (request()->has('filters') && in_array('mobile', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.Phone Number') }}</option>
                       <option value="speciality" {{ (request()->has('filters') && in_array('speciality', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.Speciality') }}</option>
                       <option value="group" {{ (request()->has('filters') && in_array('group', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.Group Name') }}</option>
                       <option value="enrollments" {{ (request()->has('filters') && in_array('enrollments', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.Number of enrollments') }}</option>
                       <option value="exams" {{ (request()->has('filters') && in_array('exams', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('businessdata.Passed Exams') }}</option>
                       <option value="courses" {{ (request()->has('filters') && in_array('courses', request()->get('filters'))) ? 'selected' : '' }}>{{ trans('website.courses') }}</option>
                        @isset($businessdata->businessinputfields)
                            @foreach($businessdata->businessinputfields as $inputs)
                                <option value="business[{{$inputs->id}}]" {{ (request()->has('filters') && in_array('business['.$inputs->id.']', request()->get('filters'))) ? 'selected' : '' }}>
                                    {{$inputs->field_name}}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>

        </div>

        <table class="table table-striped" id="customreport-table">
            <thead>
                <tr>
                    <th>{{ trans('businessdata.Email') }}</th>
                    @if(request()->has('filters'))
                        @if(in_array('username', request()->get('filters')))
                        <th>{{ trans('businessdata.User Name') }}</th>
                        @endif
                        @if(in_array('mobile', request()->get('filters')))
                        <th>{{ trans('businessdata.Phone Number') }}</th>
                        @endif
                        @if(in_array('speciality', request()->get('filters')))
                        <th>{{ trans('businessdata.Speciality') }}</th>
                        @endif
                        @if(in_array('group', request()->get('filters')))
                        <th>{{ trans('businessdata.Group Name') }}</th>
                        @endif
                        @if(in_array('enrollments', request()->get('filters')))
                        <th>{{ trans('businessdata.Number of enrollments') }}</th>
                        @endif
                        @if(in_array('exams', request()->get('filters')))
                        <th>{{ trans('businessdata.Passed Exams') }}</th>
                        @endif
                        @if(in_array('courses', request()->get('filters')))
                        <th>{{ trans('website.courses') }}</th>

                        @endif
                            @isset($businessdata->businessinputfields)
                                @foreach($businessdata->businessinputfields as $inputs)
                                    @if(in_array('business['.$inputs->id.']', request()->get('filters')))
                                        <th>{{$inputs->field_name}}</th>
                                    @endif
                                @endforeach
                            @endisset
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($businessdata->mystudents as $user)
                <tr>
                    <td>{{$user->email}}</td>
                    @if(request()->has('filters'))
                        @if(in_array('username', request()->get('filters')))
                            <td>{{$user->name}}</td>
                        @endif
                        @if(in_array('mobile', request()->get('filters')))
                            <td>{{$user->mobile}}</td>
                        @endif
                        @if(in_array('speciality', request()->get('filters')))
                            <td>{{ ($user->categories2) ? $user->categories2['name_lang'] : '' }}</td>
                        @endif
                        @if(in_array('group', request()->get('filters')))
                                <td>{{ (isset($user->businessgroupsusersuser) && count($user->businessgroupsusersuser) > 0) ? ($user->businessgroupsusersuser[0]->businessgroups)?$user->businessgroupsusersuser[0]->businessgroups['name']:'' : '' }}</td>
                        @endif
                        @if(in_array('enrollments', request()->get('filters')))
                            <td>{{count($user->courseenrollment)}}</td>
                        @endif
                        @if(in_array('exams', request()->get('filters')))
                            <td>{{ count($user->passedexams) }}</td>
                        @endif
                        @if(in_array('courses', request()->get('filters')))
                            <td>
                                @foreach($user->courseenrollment as $enrollment)
                                    {{$enrollment->courses->title_lang}},
                                @endforeach
                            </td>
                        @endif
                            @isset($businessdata->businessinputfields)
                                @foreach($businessdata->businessinputfields as $inputs)
                                    @if(in_array('business['.$inputs->id.']', request()->get('filters')))
                                        <td>
                                            {{(getBusinessInputFieldResponses($inputs->id, $user->id)) ? getBusinessInputFieldResponses($inputs->id, $user->id)->answer : '' }}
                                        </td>

                                    @endif
                                @endforeach
                            @endisset



                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {

        table = $('#customreport-table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        } );

    } );

</script>
@endpush