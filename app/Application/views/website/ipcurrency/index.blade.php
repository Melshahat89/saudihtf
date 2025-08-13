@extends(layoutExtend('website'))

@section('title')
     {{ trans('ipcurrency.ipcurrency') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.ipcurrency') }}</h1></div>
     <div><a href="{{ url('ipcurrency/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.ipcurrency') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="ip" class="form-control " placeholder="{{ trans("ipcurrency.ip") }}" value="{{ request()->has("ip") ? request()->get("ip") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="type" class="form-control " placeholder="{{ trans("ipcurrency.type") }}" value="{{ request()->has("type") ? request()->get("type") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="continent" class="form-control " placeholder="{{ trans("ipcurrency.continent") }}" value="{{ request()->has("continent") ? request()->get("continent") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="continent_code" class="form-control " placeholder="{{ trans("ipcurrency.continent_code") }}" value="{{ request()->has("continent_code") ? request()->get("continent_code") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="country" class="form-control " placeholder="{{ trans("ipcurrency.country") }}" value="{{ request()->has("country") ? request()->get("country") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="country_code" class="form-control " placeholder="{{ trans("ipcurrency.country_code") }}" value="{{ request()->has("country_code") ? request()->get("country_code") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="country_flag" class="form-control " placeholder="{{ trans("ipcurrency.country_flag") }}" value="{{ request()->has("country_flag") ? request()->get("country_flag") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="region" class="form-control " placeholder="{{ trans("ipcurrency.region") }}" value="{{ request()->has("region") ? request()->get("region") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="city" class="form-control " placeholder="{{ trans("ipcurrency.city") }}" value="{{ request()->has("city") ? request()->get("city") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="timezone" class="form-control " placeholder="{{ trans("ipcurrency.timezone") }}" value="{{ request()->has("timezone") ? request()->get("timezone") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="currency" class="form-control " placeholder="{{ trans("ipcurrency.currency") }}" value="{{ request()->has("currency") ? request()->get("currency") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="currency_code" class="form-control " placeholder="{{ trans("ipcurrency.currency_code") }}" value="{{ request()->has("currency_code") ? request()->get("currency_code") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="currency_rates" class="form-control " placeholder="{{ trans("ipcurrency.currency_rates") }}" value="{{ request()->has("currency_rates") ? request()->get("currency_rates") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("ipcurrency") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("ipcurrency.ip") }}</th> 
				<th>{{ trans("ipcurrency.edit") }}</th> 
				<th>{{ trans("ipcurrency.show") }}</th> 
				<th>{{
            trans("ipcurrency.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->ip , 20) }}</td> 
				<td> @include("website.ipcurrency.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.ipcurrency.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.ipcurrency.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
