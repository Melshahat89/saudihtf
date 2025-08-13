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

 <!-- Generate Invitation URL -->
 <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.Generate Invitation Link') }}</h3>
        </div>

        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('businessinvitation/' . $item->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="list-unstyled activity-timeline">
                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('website.Name') }}</h4>
                            <input type="text" name="name" class="form-control" placeholder="{{trans('website.Name')}}" value="{{$item->name}}" required>
        
                            <br>
                           
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">2</span>
                        <div>
                            <h4>{{trans('website.Limit')}}</h4>
                            <input type="number" name="invitationslimit" class="form-control" placeholder="{{trans('website.Limit')}}" value="{{$item->invitationslimit}}">
        
                            <br>
                           
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">3</span>
                        <div>
                            <h4>{{ trans('businessdata.Select Group (Optional)') }}</h4>
                           
                            <select name="group_id" id="generated_group_id" class="form-control">
                        <option value=""></option>
                        @isset($Groups)
                            @foreach ($Groups as $key => $group)
                                <option value="{{ $group->id }}" {{ ($item->group_id == $group->id) ? 'selected' : '' }}>{{ $group->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                            <br>
                           
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">4</span>
                        <div>
                            <button type="submit" class="btn btn-primary txt-Upp mt-15">{{ trans('website.Update') }}</button>
                        </div>
                    </li>

                </ul>
            </form>
        </div>
    </div>

@endsection
