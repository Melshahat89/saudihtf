@extends(layoutExtend('website'))

@section('title')
     {{ trans('sectionquizchoise.sectionquizchoise') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.sectionquizchoise') }}</h1></div>
     <div><a href="{{ url('sectionquizchoise/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.sectionquizchoise') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="choise" class="form-control " placeholder="{{ trans("sectionquizchoise.choise") }}" value="{{ request()->has("choise") ? request()->get("choise") : "" }}"> 
		</div> 
		<div class="form-group" > 
			<select style="width:80px;" name="is_correct" class="form-control select2" placeholder="{{ trans("sectionquizchoise.is_correct") }}" > 
				<option value="1" {{ request()->has("is_correct") && request()->get("is_correct") === 1 ? "selected" : "" }}>{{trans("sectionquizchoise.Yes") }} </option> 
				<option value="0" {{request()->has("is_correct") && request()->get("is_correct") === 0 ? "selected" : "" }}>{{trans("sectionquizchoise.No") }} </option> 
			</select> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("sectionquizchoise") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("sectionquizchoise.choise") }}</th> 
				<th>{{ trans("sectionquizchoise.edit") }}</th> 
				<th>{{ trans("sectionquizchoise.show") }}</th> 
				<th>{{
            trans("sectionquizchoise.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->choise , 20) }}</td> 
				<td> @include("website.sectionquizchoise.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizchoise.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizchoise.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
