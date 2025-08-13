@extends(layoutExtend('website'))

@section('title')
    {{ trans('businessinvitationcontroller.businessinvitationcontroller') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('businessinvitationcontroller') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		<table class="table table-bordered table-responsive table-striped">
		@php
		$fields = rename_keys(
		removeFromArray($item["fields"] , ["updated_at"]) ,
		["UserName"]
		);
		@endphp
		@foreach($fields as $key =>  $field)
			<tr>
				<th>{{ $key }}</th>
				@php $type =  getFileType($field , $item[$field]) @endphp
				@if($type == "File")
					<td> <a href="{{ url(env("UPLOAD_PATH")."/".$item[$field]) }}">{{ $item[$field] }}</a></td>
				@elseif($type == "Image")
					<td> <img src="{{ small($item[$field]) }}" /></td>
				@else
					 <td>{!!  nl2br($item[$field])  !!}</td>
				@endif
			</tr>
		@endforeach
		</table>

        @include('website.businessinvitationcontroller.buttons.delete' , ['id' => $item->id])
        @include('website.businessinvitationcontroller.buttons.edit' , ['id' => $item->id])
</div>
@endsection
