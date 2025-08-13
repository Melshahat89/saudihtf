@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Groups') }}
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
            <h3 class="panel-title">{{ trans('businessdata.Update Group') }}</h3>
        </div>
        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('business/updateGroup/' . $group->id) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <ul class="list-unstyled activity-timeline">

                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('businessdata.Group Name') }}</h4>
                            <input type="text" name="name" class="form-control" placeholder="General Group" value="{{ (isset($group)) ? $group->name : "" }}">
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">2</span>
                        <div>
                            <h4>{{ trans('businessdata.Assign Courses to the group')}}</h4>


                            <select multiple="multiple" class="multi-select select2" id="businessgroupscourses" name="businessgroupscourses[]" style="width: 100%">
                                @php $categoriesArr = array(); @endphp
                                @foreach($businessCourses as $course)
                                    @if(!in_array($course->categories->id, $categoriesArr))
                                        <optgroup label="{{$course->categories->name_lang}}" value="{{$course->categories->id}}">
                                            @foreach($course->categories->courses as $course)
                                                @if(in_array($course->title_lang, $businessCoursesArr))
                                                    <option value="{{$course->id}}" {{(in_array($course->title_lang, $groupCoursesArr)) ? 'selected' : '' }}> {{ $course->title_lang }} </option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                        @php array_push($categoriesArr, $course->categories->id); @endphp
                                    @endif
                                @endforeach
                            </select>


                            <div class="clear"></div>
                        </div>
                    </li>


                    <li>
                        <span class="activity-icon">3</span>
                        <div>
                            <h4>{{ trans('businessdata.Assign Users to the group')}}</h4>
                            <span>{{trans('website.It is not allowed to add a user to more than one group')}}</span>
                            <select multiple="multiple" class="multi-select select2" id="businessgroupsusers" name="businessgroupsusers[]" style="width: 100%">
                                @foreach($businessUsersArr as $key => $value)
                                    <option value="{{$key}}" {{ in_array($value, $groupUsersArr) ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("businessgroupsusers.*"))
                                <div class="alert alert-danger">
                                                <span class='help-block'>
                                                    <strong>{{ $errors->first("businessgroupsusers.*") }}</strong>
                                                </span>
                                </div>
                            @endif
                            <div class="clear"></div>
                        </div>
                    </li>

                    @if(Auth::user()->group_id != App\Application\Model\User::TYPE_GROUP_ADMIN)
                        <li>
                            <span class="activity-icon">4</span>
                            <div>
                                <h4>{{ trans('businessdata.Assign Manager to the group (optional)')}}</h4>
                                <select class="select2" id="" name="user_id" style="width: 100%">
                                    <option value=" "></option>
                                    @foreach($businessUsersArr as $key => $value)
                                        <option value="{{$key}}" {{ ($key == $group->user_id) ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has("user_id"))
                                    <div class="alert alert-danger">
                                                <span class='help-block'>
                                                    <strong>{{ $errors->first("user_id") }}</strong>
                                                </span>
                                    </div>
                                @endif
                                <div class="clear"></div>
                            </div>
                        </li>
                    @endif

                </ul>

                <div class="flexRight mt-40">
                    <button type="submit" class="btn btn-primary btn-lg">{{ trans('website.Finish') }}</button>
                </div>
            </form>



        </div>
    </div>

@endsection
