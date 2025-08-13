@extends(layoutExtend('website'))

@section('title')
    {{ trans('newsletter.newsletter') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('newsletter') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('newsletter/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
			<label for="email">{{ trans("newsletter.email")}}</label>
				<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("newsletter.email")}}">
		</div>
			@if ($errors->has("email"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("active") ? "has-error" : "" }}" > 
			<label for="active">{{ trans("newsletter.active")}}</label>
				 <div class="form-check">
					<label class="form-check-label">
					<input class="form-check-input" name="active" {{ isset($item->active) && $item->active == 0 ? "checked" : "" }} type="radio" value="0" > 
					{{ trans("newsletter.No")}}
				 </label > 
				<label class="form-check-label">
				<input class="form-check-input" name="active" {{ isset($item->active) && $item->active == 1 ? "checked" : "" }} type="radio" value="1" > 
									{{ trans("newsletter.Yes")}}
				 </label> 
				</div> 		</div>
			@if ($errors->has("active"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("active") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.newsletter') }}
                </button>
            </div>
        </form>
</div>
@endsection
