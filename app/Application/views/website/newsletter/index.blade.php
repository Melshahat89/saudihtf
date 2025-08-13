@extends(layoutExtend('website'))

@section('title')
     {{ trans('newsletter.newsletter') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.newsletter') }}</h1></div>
     <div><a href="{{ url('newsletter/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.newsletter') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="email" class="form-control " placeholder="{{ trans("newsletter.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}"> 
		</div> 
		<div class="form-group" > 
			<select style="width:80px;" name="active" class="form-control select2" placeholder="{{ trans("newsletter.active") }}" > 
				<option value="1" {{ request()->has("active") && request()->get("active") === 1 ? "selected" : "" }}>{{trans("newsletter.Yes") }} </option> 
				<option value="0" {{request()->has("active") && request()->get("active") === 0 ? "selected" : "" }}>{{trans("newsletter.No") }} </option> 
			</select> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("newsletter") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("newsletter.email") }}</th> 
				<th>{{ trans("newsletter.edit") }}</th> 
				<th>{{ trans("newsletter.show") }}</th> 
				<th>{{
            trans("newsletter.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->email , 20) }}</td> 
				<td> @include("website.newsletter.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.newsletter.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.newsletter.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
