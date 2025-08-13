@extends(layoutExtend())

@section('title')
    {{ trans('homesettings.homesettings') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('homesettings.homesettings') , 'model' => 'homesettings' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/homesettings/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 
{{--
				<div class="form-group {{ $errors->has("diplomas_discount") ? "has-error" : "" }}" >
					<label class="col-md-2 col-form-label" for="diplomas_discount">{{ trans("courses.diplomas_discount")}}</label>
					<input type="text" name="diplomas_discount" class="form-control" id="diplomas_discount" value="{{ isset($item->diplomas_discount) ? $item->diplomas_discount : old("diplomas_discount") }}"  placeholder="{{ trans("courses.diplomas_discount")}}">
            	</div>
            	@if ($errors->has("diplomas_discount"))
                	<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("diplomas_discount") }}</strong>
						</span>
                	</div>
				@endif
				
				<div class="form-group {{ $errors->has("masters_discount") ? "has-error" : "" }}" >
					<label class="col-md-2 col-form-label" for="masters_discount">{{ trans("courses.masters_discount")}}</label>
					<input type="text" name="masters_discount" class="form-control" id="masters_discount" value="{{ isset($item->masters_discount) ? $item->masters_discount : old("masters_discount") }}"  placeholder="{{ trans("courses.masters_discount")}}">
            	</div>
            	@if ($errors->has("masters_discount"))
                	<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("masters_discount") }}</strong>
						</span>
                	</div>
				@endif
				
				<div class="form-group {{ $errors->has("courses_discount") ? "has-error" : "" }}" >
					<label class="col-md-2 col-form-label" for="courses_discount">{{ trans("courses.courses_discount")}}</label>
					<input type="text" name="courses_discount" class="form-control" id="courses_discount" value="{{ isset($item->courses_discount) ? $item->courses_discount : old("courses_discount") }}"  placeholder="{{ trans("courses.courses_discount")}}">
            	</div>
            	@if ($errors->has("courses_discount"))
                	<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("courses_discount") }}</strong>
						</span>
                	</div>
				@endif
				
				<div class="form-group {{ $errors->has("bundle_discount") ? "has-error" : "" }}" >
					<label class="col-md-2 col-form-label" for="bundle_discount">{{ trans("courses.bundles_discount")}}</label>
					<input type="text" name="bundle_discount" class="form-control" id="bundle_discount" value="{{ isset($item->bundle_discount) ? $item->bundle_discount : old("bundle_discount") }}"  placeholder="{{ trans("courses.bundle_discount")}}">
            	</div>
            	@if ($errors->has("bundle_discount"))
                	<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("bundle_discount") }}</strong>
						</span>
                	</div>
            	@endif

                --}}
		   
				<div class="form-group  {{  $errors->has("seo_desc.en")  &&  $errors->has("seo_desc.ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="seo_desc">{{ trans("courses.seo_desc")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "seo_desc", isset($item->seo_desc) ? $item->seo_desc : old("seo_desc") , "text" , "courses") !!}
            </div>
            @if ($errors->has("seo_desc.en"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("seo_desc.en") }}</strong>
                 </span>
                </div>
            @endif
            @if ($errors->has("seo_desc.ar"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("seo_desc.ar") }}</strong>
                 </span>
                </div>
			@endif
			
			
			<div class="form-group  {{  $errors->has("seo_title.en")  &&  $errors->has("seo_title.ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="seo_title">{{ trans("courses.seo_title")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "seo_title", isset($item->seo_title) ? $item->seo_title : old("seo_title") , "text" , "courses") !!}
            </div>
            @if ($errors->has("seo_title.en"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("seo_title.en") }}</strong>
                 </span>
                </div>
            @endif
            @if ($errors->has("seo_title.ar"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("seo_title.ar") }}</strong>
                 </span>
                </div>
			@endif
			


			<div class="form-group  {{  $errors->has("seo_keys[].en")  &&  $errors->has("seo_keys[].ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="seo_keys">{{ trans("courses.seo_keys")}}</label>
                <div id="laraflat-seo_keys">
                    @if(isset($item) || old("seo_keys"))
                        @if((isset($item->seo_keys) && json_decode($item->seo_keys) ) || old("seo_keys"))
                            @php $items = isset($item->seo_keys) && json_decode($item->seo_keys) ? json_decode($item->seo_keys)  : old("seo_keys") @endphp
                            @foreach($items as $jsonseo_keys)
                                <div class="title form-inline seo_keys" style="margin-top:5px;margin-bottom:5px"><input class="form-control" name="seo_keys[]"  value="{{ $jsonseo_keys}}" type="text" placeholder="{{ trans("courses.seo_keys")}}" ><span class="btn btn-warning" onclick="removeseo_keys(this)"> <i class="fa fa-minus"></i></span></div>
                            @endforeach
                        @endif
                    @endif
                    <span class="btn btn-success" onclick="AddNewseo_keys()"><i class="fa fa-plus"></i></span>
                    <span class="btn btn-danger" onclick="clearAllseo_keys(this)"><i class="fa fa-minus"></i></span>
                    @push("js")
                        <script>
                            function AddNewseo_keys() {
                                $("#laraflat-seo_keys").append('<div class="seo_keys form-inline" style="margin-top:5px;margin-bottom:5px">'+'<input class="form-control" name="seo_keys[]"  type="text" placeholder="{{ trans("courses.seo_keys")}}" >'+'<span class="btn btn-warning" onclick="removeseo_keys(this)">'+' <i class="fa fa-minus"></i></span>'+'</div>');
                            }
                            function removeseo_keys(e) {
                                $(e).closest("div.seo_keys").remove();
                            }
                            function clearAllseo_keys(e) {
                                $("#laraflat-seo_keys").html("");
                            }
                        </script>
                    @endpush
                </div>
            </div>
            @if ($errors->has("seo_keys[].en"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("seo_keys[].en") }}</strong>
     </span>
                </div>
            @endif
            @if ($errors->has("seo_keys[].ar"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("seo_keys[].ar") }}</strong>
     </span>
                </div>
			@endif
			


            <div class="form-group {{ $errors->has("blog_banner") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="blog_banner">{{ trans("courses.image")}}</label>
                @if(isset($item) && $item->blog_banner != "")
                    <br>
                    <img src="{{ small($item->blog_banner) }}" class="thumbnail" alt="" width="200">
                    <br>
                    <a class="btn btn-danger" onclick="deleteThisItem(this)" data-link="{{ url("deleteFile/homesettings/".$item->id."?name=".$item->blog_banner."&filed_name=blog_banner") }}"><i class="fa fa-trash"></i></a></div>
                @endif
                <input type="file" class="form-control"  name="blog_banner" >
            </div>
            @if ($errors->has("blog_banner"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("blog_banner") }}</strong>
                 </span>
                </div>
            @endif

            <div class="form-group {{ $errors->has("blog_banner_link") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="blog_banner_link">{{ trans("blog.banner link")}}</label>
                <input type="text" name="blog_banner_link" class="form-control" id="blog_banner_link" value="{{ isset($item->blog_banner_link) ? $item->blog_banner_link : old("blog_banner_link") }}"  placeholder="{{ trans("blog.banner link")}}">
            </div>
            @if ($errors->has("blog_banner_link"))
                <div class="alert alert-danger">
                     <span class='help-block'>
                      <strong>{{ $errors->first("blog_banner_link") }}</strong>
                     </span>
                </div>
            @endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('homesettings.homesettings') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
