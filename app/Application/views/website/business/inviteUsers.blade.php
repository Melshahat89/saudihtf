@extends(layoutBusiness())
@section('title')
    {{ trans('businessdata.MEDU | Dashboard') }} | {{ trans('businessdata.Invite Users') }}
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
            <h3 class="panel-title">{{ trans('businessdata.Invite Users') }}</h3>
        </div>

        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('business/invite-bulk-users') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="list-unstyled activity-timeline">
                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('businessdata.Enter User Email') }}</h4>
                           
                            <textarea name="emails" class="form-control" placeholder="{{ trans('businessdata.Add Email Or Group of Emails') }}    Ex: example1@gmail.com,example2@gmail.com" rows="4"></textarea>
                            <br>
                            <span class="control-fileupload">
                                <label for="fileInput">{{ trans('businessdata.Upload Your List') }}</label>
                                <input name="emailsfile" type="file" id="fileInput" accept=".csv, .xls">
                            </span>
                            <input type="hidden" id="businessId" name="businessId" value="{{$businessdata->id}}">

                        </div>

                        <div class="pt-4">
                            <h4>{{ trans('businessdata.Select Group (Optional)') }}</h4>
                           
                            <select name="group_id" class="form-control">
                        <option value=""></option>
                        @isset($Groups)
                            @foreach ($Groups as $key => $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                            <br>
                           
                        </div>
                    </li>
                   
                    <li>
                        <span class="activity-icon">2</span>
                        <div>
                            <button type="submit" class="btn btn-primary txt-Upp mt-15">{{ trans('businessdata.Send Invitation') }}</button>
                        </div>
                    </li>

                </ul>
            </form>
        </div>
         <!-- Generate Invitation URL -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('businessdata.Generate Invitation Link') }}</h3>
        </div>

        <div class="panel-body">
            <form action="{{ concatenateLangToUrl('businessinvitation') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="businessdata_id" value="{{$businessdata->id}}">
                <ul class="list-unstyled activity-timeline">
                    <li>
                        <span class="activity-icon">1</span>
                        <div>
                            <h4>{{ trans('website.Name') }}</h4>
                            <input type="text" name="name" class="form-control" placeholder="{{trans('website.Name')}}" required>
        
                            <br>
                           
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">2</span>
                        <div>
                            <h4>{{trans('website.Limit')}}</h4>
                            <input type="number" name="invitationslimit" class="form-control" placeholder="{{trans('website.Limit')}}">
        
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
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                            <br>
                           
                        </div>
                    </li>

                    <li>
                        <span class="activity-icon">4</span>
                        <div>
                            <button type="submit" class="btn btn-primary txt-Upp mt-15">{{ trans('website.create') }}</button>
                        </div>
                    </li>

                </ul>
            </form>
            <hr>
            <div class="table-res-scroll">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('website.Name') }}</th>
                            <th>{{ trans('website.invitation link') }}</th>
                            <th>{{ trans('website.Group') }}</th>
                            <th>{{ trans('website.Limit') }}</th>
                            <th>{{ trans('website.Remaining Limit') }}</th>
                            <th>{{ trans('website.QR Code') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invitations as $invitation)
                        <tr>
                            <td>{{$invitation->name}}</td>
                            <td><a href="javascript: void(0);" id="generated_inv_url" onclick="copyInvLink()">{{concatenateLangToUrl('businessinvitation/token/'. $invitation->token)}}</a></td>
                            <td>{{$invitation->group_id}}</td>
                            <td>{{$invitation->invitationslimit}}</td>
                            <td>
                                @if($invitation->invitationslimit)
                                    {{ $invitation->invitationslimit - App\Application\Model\BusinessInvitation::countInvitationUsers($invitation->token)  }}
                                @endif
                            </td>
                            <td><img src="{{generateQrCode(concatenateLangToUrl('businessinvitation/token/'. $invitation->token))}}" style="height: 100px;"></td>
                            <td class="">
                                <a type="button" href="{{ url('businessinvitation/' . $invitation->id . '/delete') }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger mr-15"><i class="lnr lnr-trash"></i></a>
                                <a type="button" href="{{ url('businessinvitation/' . $invitation->id) }}" class="btn btn-success mr-15"><i class="lnr lnr-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('js')

<script>

function selectGroup(){
    
    value = document.getElementById("generated_group_id").value;


    document.getElementById("generated_inv_url").innerHTML = "{{concatenateLangToUrl('business/invite/' . $businessdata->id .'/')}}" + '/' + value;

    generateQrAjax();
}

function copyInvLink(){
    
    invite_link = document.getElementById("generated_inv_url");

    const el = document.createElement('textarea');
    el.value = invite_link.innerHTML;
    document.body.appendChild(el);
    el.select();
    el.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
    document.body.removeChild(el);

    alert("The invitation link has been coppied to your clipboard");


}
</script>


<script>

function generateQrAjax(){

    invite_link = document.getElementById("generated_inv_url").innerHTML;

    $.ajax({
            url: "/generateQrCode?url=" + invite_link,
            type: "GET",

            success: function(data) {

                document.getElementById("qrcode_img").src = data.code;

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                console.log(thrownError);
            }
        });
}

</script>

@endpush