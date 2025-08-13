@extends(layoutExtend('website'))

@section('title')
     {{ trans('sectionquiz.sectionquiz') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.sectionquiz') }}</h1></div>
     <div><a href="{{ url('sectionquiz/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.sectionquiz') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="title" class="form-control " placeholder="{{ trans("sectionquiz.title") }}" value="{{ request()->has("title") ? request()->get("title") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="description" class="form-control " placeholder="{{ trans("sectionquiz.description") }}" value="{{ request()->has("description") ? request()->get("description") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("sectionquiz") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("sectionquiz.title") }}</th> 
				<th>{{ trans("sectionquiz.edit") }}</th> 
				<th>{{ trans("sectionquiz.show") }}</th> 
				<th>{{
            trans("sectionquiz.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->title , 20) }}</td> 
				<td> @include("website.sectionquiz.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.sectionquiz.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.sectionquiz.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
