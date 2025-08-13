@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Users information') }}
@endsection
@section('description')
    {{ trans('home.MeduoHomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.MeduoHomeKeywords') }}
@endsection
@section('content')

    <div class="panel panel-headline d-flex">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.Users information') }}</h3>
           <button type="button" class="btn btn-primary" style="background-color: #3ebfb4; padding: 9px; display: none;"><i class="fas fa-download p-2" style="padding-right: 13px;"></i>Export Data</button>
            
        </div>

    
        <div class="panel-body">

            

            <span class="dividar-grey"></span>
            <div class="table-res-scroll">
                <table class="table table-striped" id="businessusers-table">
                    <thead>
                        <tr>
                           
                            <th>
                                <label class="fancy-checkbox">
													<input type="checkbox" onclick="toggle(this);">
													<span></span>
                                </label>
                            </th>
                            <th valign="center">{{ trans('businessdata.User Name') }}</th>
                            <th>{{ trans('businessdata.Email') }}</th>
                            <th>{{ trans('businessdata.Phone Number') }}</th>
                            <th>{{ trans('businessdata.Speciality') }}</th>
                            <th>{{ trans('businessdata.Group Name') }}</th>
                            <th>{{ trans('businessdata.status') }}</th>
                            @foreach(Auth::user()->businessdata->businessinputfields as $data)
                            <th>
                                {{$data->field_name}}
                            </th>
                            @endforeach
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                            @foreach($users as $key => $user)   

<?php //dd($user->business); ?>
                                <tr>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ ($user->categories2) ? $user->categories2['name_lang'] : '' }}</td>
                                    <td>{!!  ($user->banned) ? '<span class="label label-danger"> Suspended </span>' : '<span class="label label-success"> Active </span>'  !!}</td>

                                    <td>
                                        {{ (isset($user->businessgroupsusersuser[0]->businessgroups) && count($user->businessgroupsusersuser) > 0) ? $user->businessgroupsusersuser[0]->businessgroups['name'] : '' }}
                                    </td>
                                    @foreach($users[0]->businessusersdata->businessinputfields as $data)
                                    <td>
                                        {{(getBusinessInputFieldResponses($data->id, $user->id)) ? getBusinessInputFieldResponses($data->id, $user->id)->answer : '' }}
                                    </td>
                                    @endforeach

                                    @if ($user->banned == 0)
                                        <td class="flexRight">
                                            <a type="button" href="{{url('business/users-suspend/'.$user->id)}}" class="btn btn-danger mr-15">
                                                <i class="lnr lnr-hand"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td class="flexRight">
                                            <a type="button" href="{{url('business/users-active/'.$user->id)}}" class="btn btn-success mr-15">
                                                <i class="lnr lnr-undo"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>



$(document).ready(function() {
    $('#businessusers-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    } );
} );


</script>
@endpush