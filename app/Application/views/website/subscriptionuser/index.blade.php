@extends(layoutExtend('website'))

@section('title')
     {{ trans('subscriptionuser.subscriptionuser') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.subscriptionuser') }}</h1></div>
     <div><a href="{{ url('subscriptionuser/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.subscriptionuser') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="subscription_id" class="form-control " placeholder="{{ trans("subscriptionuser.subscription_id") }}" value="{{ request()->has("subscription_id") ? request()->get("subscription_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="start_date" class="form-control datepicker2" placeholder="{{ trans("subscriptionuser.start_date") }}" value="{{ request()->has("start_date") ? request()->get("start_date") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="end_date" class="form-control datepicker2" placeholder="{{ trans("subscriptionuser.end_date") }}" value="{{ request()->has("end_date") ? request()->get("end_date") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="amount" class="form-control " placeholder="{{ trans("subscriptionuser.amount") }}" value="{{ request()->has("amount") ? request()->get("amount") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="b_type" class="form-control " placeholder="{{ trans("subscriptionuser.b_type") }}" value="{{ request()->has("b_type") ? request()->get("b_type") : "" }}"> 
		</div> 
		<div class="form-group" > 
			<select style="width:80px;" name="is_active" class="form-control select2" placeholder="{{ trans("subscriptionuser.is_active") }}" > 
				<option value="1" {{ request()->has("is_active") && request()->get("is_active") === 1 ? "selected" : "" }}>{{trans("subscriptionuser.Yes") }} </option> 
				<option value="0" {{request()->has("is_active") && request()->get("is_active") === 0 ? "selected" : "" }}>{{trans("subscriptionuser.No") }} </option> 
			</select> 
		</div> 
		<div class="form-group" > 
			<select style="width:80px;" name="is_collected" class="form-control select2" placeholder="{{ trans("subscriptionuser.is_collected") }}" > 
				<option value="1" {{ request()->has("is_collected") && request()->get("is_collected") === 1 ? "selected" : "" }}>{{trans("subscriptionuser.Yes") }} </option> 
				<option value="0" {{request()->has("is_collected") && request()->get("is_collected") === 0 ? "selected" : "" }}>{{trans("subscriptionuser.No") }} </option> 
			</select> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("subscriptionuser") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("subscriptionuser.subscription_id") }}</th> 
				<th>{{ trans("subscriptionuser.edit") }}</th> 
				<th>{{ trans("subscriptionuser.show") }}</th> 
				<th>{{
            trans("subscriptionuser.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->subscription_id , 20) }}</td> 
				<td> @include("website.subscriptionuser.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.subscriptionuser.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.subscriptionuser.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
