@extends(layoutExtend('website'))

@section('title')
     {{ trans('spin.spin') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.spin') }}</h1></div>
     <div><a href="{{ url('spin/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.spin') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="type" class="form-control " placeholder="{{ trans("spin.type") }}" value="{{ request()->has("type") ? request()->get("type") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="code" class="form-control " placeholder="{{ trans("spin.code") }}" value="{{ request()->has("code") ? request()->get("code") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("spin") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("spin.type") }}</th> 
				<th>{{ trans("spin.edit") }}</th> 
				<th>{{ trans("spin.show") }}</th> 
				<th>{{
            trans("spin.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->type , 20) }}</td> 
				<td> @include("website.spin.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.spin.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.spin.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
