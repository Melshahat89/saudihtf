@extends(layoutExtend())

@section('title')
    {{ trans('newsletter.newsletter') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('newsletter.newsletter') , 'model' => 'newsletter' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/newsletter/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
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
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('newsletter.newsletter') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
