@extends(layoutExtend('website'))

@section('title')
     {{ trans('seoerrors.seoerrors') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.seoerrors') }}</h1></div>
     <div><a href="{{ url('seoerrors/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.seoerrors') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="link" class="form-control " placeholder="{{ trans("seoerrors.link") }}" value="{{ request()->has("link") ? request()->get("link") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="code" class="form-control " placeholder="{{ trans("seoerrors.code") }}" value="{{ request()->has("code") ? request()->get("code") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="comment" class="form-control " placeholder="{{ trans("seoerrors.comment") }}" value="{{ request()->has("comment") ? request()->get("comment") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("seoerrors") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("seoerrors.link") }}</th> 
				<th>{{ trans("seoerrors.edit") }}</th> 
				<th>{{ trans("seoerrors.show") }}</th> 
				<th>{{
            trans("seoerrors.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->link , 20) }}</td> 
				<td> @include("website.seoerrors.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.seoerrors.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.seoerrors.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
