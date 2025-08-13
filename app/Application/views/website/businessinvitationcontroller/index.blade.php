@extends(layoutExtend('website'))

@section('title')
     {{ trans('businessinvitationcontroller.businessinvitationcontroller') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.businessinvitationcontroller') }}</h1></div>
     <div><a href="{{ url('businessinvitationcontroller/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.businessinvitationcontroller') }}</a><br></div>
 <br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr><th></th></tr> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				<tr><th></th></tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
