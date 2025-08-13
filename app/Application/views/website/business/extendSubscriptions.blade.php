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
            <h3 class="panel-title">{{ trans('businessdata.extend subscriptions') }}</h3>
        </div>
        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('business/extendSubscriptions') }}" method="post">

                {{ csrf_field() }}
                <ul class="list-unstyled activity-timeline">

                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('courses.type') }}</h4>
                            <select required class="form-control" id="type" name="type" style="width: 100%">
                            <option value="annual" class="form-control">{{ trans('homesettings.b2b_annual') }}</option>
                            <option value="monthly" class="form-control">{{ trans('homesettings.b2b_monthly') }}</option>
                            </select>
                        </div>
                    </li>

                </ul>

                <div class="flexRight mt-40">
                    <button type="submit" class="btn btn-primary btn-lg">{{ trans('website.Next') }}</button>
                </div>
            </form>


        </div>
    </div>

@endsection
