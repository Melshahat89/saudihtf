@extends(layoutExtend('website'))

@section('title')
     {{ trans('sectionquizstudentstatus.sectionquizstudentstatus') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.sectionquizstudentstatus') }}</h1></div>
     <div><a href="{{ url('sectionquizstudentstatus/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.sectionquizstudentstatus') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group" > 
			<select style="width:80px;" name="passed" class="form-control select2" placeholder="{{ trans("sectionquizstudentstatus.passed") }}" > 
				<option value="1" {{ request()->has("passed") && request()->get("passed") === 1 ? "selected" : "" }}>{{trans("sectionquizstudentstatus.Yes") }} </option> 
				<option value="0" {{request()->has("passed") && request()->get("passed") === 0 ? "selected" : "" }}>{{trans("sectionquizstudentstatus.No") }} </option> 
			</select> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="status" class="form-control " placeholder="{{ trans("sectionquizstudentstatus.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="start_time" class="form-control datepicker2" placeholder="{{ trans("sectionquizstudentstatus.start_time") }}" value="{{ request()->has("start_time") ? request()->get("start_time") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="end_time" class="form-control datepicker2" placeholder="{{ trans("sectionquizstudentstatus.end_time") }}" value="{{ request()->has("end_time") ? request()->get("end_time") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("sectionquizstudentstatus") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("sectionquizstudentstatus.passed") }}</th> 
				<th>{{ trans("sectionquizstudentstatus.edit") }}</th> 
				<th>{{ trans("sectionquizstudentstatus.show") }}</th> 
				<th>{{
            trans("sectionquizstudentstatus.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
										 <td>
				{{ $d->passed == 1 ? trans("sectionquizstudentstatus.Yes") : trans("sectionquizstudentstatus.No")  }}
					 </td> 
<td> @include("website.sectionquizstudentstatus.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizstudentstatus.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizstudentstatus.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
