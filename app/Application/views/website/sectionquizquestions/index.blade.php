@extends(layoutExtend('website'))

@section('title')
     {{ trans('sectionquizquestions.sectionquizquestions') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.sectionquizquestions') }}</h1></div>
     <div><a href="{{ url('sectionquizquestions/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.sectionquizquestions') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="question" class="form-control " placeholder="{{ trans("sectionquizquestions.question") }}" value="{{ request()->has("question") ? request()->get("question") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="mark" class="form-control " placeholder="{{ trans("sectionquizquestions.mark") }}" value="{{ request()->has("mark") ? request()->get("mark") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("sectionquizquestions") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("sectionquizquestions.question") }}</th> 
				<th>{{ trans("sectionquizquestions.edit") }}</th> 
				<th>{{ trans("sectionquizquestions.show") }}</th> 
				<th>{{
            trans("sectionquizquestions.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->question , 20) }}</td> 
				<td> @include("website.sectionquizquestions.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizquestions.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.sectionquizquestions.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
