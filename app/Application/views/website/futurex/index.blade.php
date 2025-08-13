@extends(layoutExtend('website'))

@section('title')
     {{ trans('futurex.futurex') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.futurex') }}</h1></div>
     <div><a href="{{ url('futurex/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.futurex') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="uid" class="form-control " placeholder="{{ trans("futurex.uid") }}" value="{{ request()->has("uid") ? request()->get("uid") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="cn" class="form-control " placeholder="{{ trans("futurex.cn") }}" value="{{ request()->has("cn") ? request()->get("cn") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="displayName" class="form-control " placeholder="{{ trans("futurex.displayName") }}" value="{{ request()->has("displayName") ? request()->get("displayName") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="givenName" class="form-control " placeholder="{{ trans("futurex.givenName") }}" value="{{ request()->has("givenName") ? request()->get("givenName") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="sn" class="form-control " placeholder="{{ trans("futurex.sn") }}" value="{{ request()->has("sn") ? request()->get("sn") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="mail" class="form-control " placeholder="{{ trans("futurex.mail") }}" value="{{ request()->has("mail") ? request()->get("mail") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="Nationalid" class="form-control " placeholder="{{ trans("futurex.Nationalid") }}" value="{{ request()->has("Nationalid") ? request()->get("Nationalid") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("futurex") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("futurex.uid") }}</th> 
				<th>{{ trans("futurex.edit") }}</th> 
				<th>{{ trans("futurex.show") }}</th> 
				<th>{{
            trans("futurex.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->uid , 20) }}</td> 
				<td> @include("website.futurex.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.futurex.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.futurex.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
