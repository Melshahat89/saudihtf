@extends(layoutExtend())

@section('title')
    {{ trans('testimonials.testimonials') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('testimonials.testimonials') , 'model' => 'testimonials' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/testimonials/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label class="col-md-2 col-form-label" for="name">{{ trans("testimonials.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "testimonials") !!}
		</div>
			@if ($errors->has("name.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("name.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.ar") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group {{ $errors->has("title") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="title">{{ trans("testimonials.title")}}</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ isset($item->title) ? $item->title : old("title") }}"  placeholder="{{ trans("testimonials.title")}}">
            </div>
            @if ($errors->has("title"))
                <div class="alert alert-danger">
                     <span class='help-block'>
                      <strong>{{ $errors->first("title") }}</strong>
                     </span>
                </div>
            @endif
		 <div class="form-group  {{  $errors->has("message.en")  &&  $errors->has("message.ar")  ? "has-error" : "" }}" >
			<label class="col-md-2 col-form-label" for="message">{{ trans("testimonials.message")}}</label>
			 {!! extractFiled(isset($item) ? $item : null , "message", isset($item->message) ? $item->message : old("message") , "textarea" , "testimonials") !!}
		 </div>
			@if ($errors->has("message.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("message.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("message.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("message.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label class="col-md-2 col-form-label" for="image">{{ trans("testimonials.image")}}</label>
				@if(isset($item) && $item->image != "")
				<br>
				<img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
				<br>
				@endif
				<input type="file" class="form-control"  name="image" >
		</div>
			@if ($errors->has("image"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("image") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('testimonials.testimonials') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
