@extends(layoutExtend('website'))

@section('title')
     {{ trans('currencies.currencies') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.currencies') }}</h1></div>
     <div><a href="{{ url('currencies/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.currencies') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="currency_code" class="form-control " placeholder="{{ trans("currencies.currency_code") }}" value="{{ request()->has("currency_code") ? request()->get("currency_code") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="country_id" class="form-control " placeholder="{{ trans("currencies.country_id") }}" value="{{ request()->has("country_id") ? request()->get("country_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="discount_perc" class="form-control " placeholder="{{ trans("currencies.discount_perc") }}" value="{{ request()->has("discount_perc") ? request()->get("discount_perc") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="exchangeratetoegp" class="form-control " placeholder="{{ trans("currencies.exchangeratetoegp") }}" value="{{ request()->has("exchangeratetoegp") ? request()->get("exchangeratetoegp") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="exchangeratetousd" class="form-control " placeholder="{{ trans("currencies.exchangeratetousd") }}" value="{{ request()->has("exchangeratetousd") ? request()->get("exchangeratetousd") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="b2c_monthly_discount_perc" class="form-control " placeholder="{{ trans("currencies.b2c_monthly_discount_perc") }}" value="{{ request()->has("b2c_monthly_discount_perc") ? request()->get("b2c_monthly_discount_perc") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="b2c_yearly_discount_perc" class="form-control " placeholder="{{ trans("currencies.b2c_yearly_discount_perc") }}" value="{{ request()->has("b2c_yearly_discount_perc") ? request()->get("b2c_yearly_discount_perc") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("currencies") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("currencies.currency_code") }}</th> 
				<th>{{ trans("currencies.edit") }}</th> 
				<th>{{ trans("currencies.show") }}</th> 
				<th>{{
            trans("currencies.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->currency_code , 20) }}</td> 
				<td> @include("website.currencies.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.currencies.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.currencies.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
