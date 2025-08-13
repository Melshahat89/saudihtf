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
            <h3 class="panel-title">{{ trans('businessdata.newLicense') }}</h3>
        </div>
        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('business/newLicense') }}" method="post">

                {{ csrf_field() }}
                <ul class="list-unstyled activity-timeline">

                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('businessdata.Number Of License') }}</h4>
                            <input type="text" name="No" required class="form-control" placeholder="{{ trans('businessdata.Number Of License') }}" value="">
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
