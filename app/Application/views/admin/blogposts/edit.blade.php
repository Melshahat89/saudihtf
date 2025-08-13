@extends(layoutExtend())

@section('title')
	{{ trans('blog.blogposts') }} {{ isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')
	{{ Html::style('/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
@endsection
@section('content')
	@component(layoutForm() , ['title' => trans('blog.blogposts') , 'model' => 'blogposts' , 'action' => isset($item) ? trans('home.edit') : trans('home.add') ])
		@include(layoutMessage())
		<form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/blogposts/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include("admin.blogposts.relation.categories.edit")

			<div class="form-group {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="title">{{ trans("categorie.title")}}</label>
				{!! extractFiled(isset($item) ? $item : null ,"title" , isset($item->title) ? $item->title : old("title") , "text" , "categorie") !!}
			</div>

			@if ($errors->has("title.en"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("title.en") }}</strong>
		</span>
				</div>
			@endif
			@if ($errors->has("title.ar"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("title.ar") }}</strong>
		</span>
				</div>
			@endif

			<div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="description">{{ trans("courses.description")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "courses", 'tinymce' ) !!}
			</div>
			@if ($errors->has("description.en"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("description.en") }}</strong>
		</span>
				</div>
			@endif
			@if ($errors->has("description.ar"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("description.ar") }}</strong>
		</span>
				</div>
			@endif
			<div class="form-group {{ $errors->has("canonical") ? "has-error" : "" }}" >
				<label class="col-md-2 col-form-label" for="canonical">Canonical Url</label>
				<input type="text" name="canonical" class="form-control" id="canonical" value="{{ isset($item->canonical) ? $item->canonical : old("canonical") }}"  placeholder="Canonical Url">
			</div>
			@if ($errors->has("canonical"))
				<div class="alert alert-danger">
                     <span class='help-block'>
                      <strong>{{ $errors->first("canonical") }}</strong>
                     </span>
				</div>
			@endif

			<div class="form-group {{ $errors->has("slug") ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="slug">{{ trans("courses.slug")}}</label>
				<input type="text" name="slug" class="form-control" id="slug" value="{{ isset($item->slug) ? $item->slug : old("slug") }}" placeholder="{{ trans("courses.slug")}}">
			</div>
			@if ($errors->has("slug"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("slug") }}</strong>
		</span>
				</div>
			@endif

			<div class="form-group {{ $errors->has("status") ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="status">{{ trans("courses.status")}}</label>
				<div class="form-check">
					<label class="form-check-label">
						<input class="form-check-input" name="status" {{ isset($item->status) && $item->status == 0 ? "checked" : "" }} type="radio" value="0">
						{{ trans("courses.No")}}
					</label>
					<label class="form-check-label">
						<input class="form-check-input" name="status" {{ isset($item->status) && $item->status == 1 ? "checked" : "" }} type="radio" value="1">
						{{ trans("courses.Yes")}}
					</label>
				</div>
			</div>
			@if ($errors->has("status"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("status") }}</strong>
		</span>
				</div>
			@endif

			<div class="form-group {{ $errors->has("image") ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="image">{{ trans("courses.image")}}</label>
				@if(isset($item) && $item->image != "")
					<br>
					<img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
					<br>
					<a class="btn btn-danger" onclick="deleteThisItem(this)" data-link="{{ url("deleteFile/blogposts/".$item->id."?name=".$item->image."&filed_name=image") }}"><i class="fa fa-trash"></i></a></div>
			@endif
			<input type="file" class="form-control" name="image">
			</div>
			@if ($errors->has("image"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("image") }}</strong>
		</span>
				</div>
			@endif

			<div class="form-group {{ $errors->has("alt_image") ? "has-error" : "" }}" >
				<label class="col-md-2 col-form-label" for="alt_image">{{ trans("courses.alt_image")}}</label>
				<input type="text" name="alt_image" class="form-control" id="alt_image" value="{{ isset($item->alt_image) ? $item->alt_image : old("alt_image") }}"  placeholder="{{ trans("courses.alt_image")}}">
			</div>
			@if ($errors->has("alt_image"))
				<div class="alert alert-danger">
                     <span class='help-block'>
                      <strong>{{ $errors->first("alt_image") }}</strong>
                     </span>
				</div>
			@endif

			<div class="form-group  {{  $errors->has("seo_desc.en")  &&  $errors->has("seo_desc.ar")  ? "has-error" : "" }}">
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

			<div class="form-group  {{  $errors->has("seo_keys[]")  &&  $errors->has("seo_keys[]")  ? "has-error" : "" }}">
				<label class="col-md-2 col-form-label" for="seo_keys">{{ trans("courses.seo_keys")}}</label>
				<div id="laraflat-seo_keys">
					@if(isset($item) || old("seo_keys"))
						@if((isset($item->seo_keys) && json_decode($item->seo_keys) ) || old("seo_keys"))
							@php $items = isset($item->seo_keys) && json_decode($item->seo_keys) ? json_decode($item->seo_keys) : old("seo_keys") @endphp
							@foreach($items as $jsonseo_keys)
								<div class="seo_keys form-inline" style="margin-top:5px;margin-bottom:5px"><input class="form-control" name="seo_keys[]" value="{{ $jsonseo_keys}}" type="text" placeholder="{{ trans("courses.seo_keys")}}"><span class="btn btn-warning" onclick="removeseo_keys(this)"> <i class="fa fa-minus"></i></span></div>
							@endforeach
						@endif
					@endif
					<span class="btn btn-success" onclick="AddNewseo_keys()"><i class="fa fa-plus"></i></span>
					<span class="btn btn-danger" onclick="clearAllseo_keys(this)"><i class="fa fa-minus"></i></span>
					@push("js")
						<script>
							function AddNewseo_keys() {
								$("#laraflat-seo_keys").append('<div class="seo_keys form-inline" style="margin-top:5px;margin-bottom:5px">' + '<input class="form-control" name="seo_keys[]"  type="text" placeholder="{{ trans("courses.seo_keys")}}" >' + '<span class="btn btn-warning" onclick="removeseo_keys(this)">' + ' <i class="fa fa-minus"></i></span>' + '</div>');
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
			@if ($errors->has("seo_keys[]"))
				<div class="alert alert-danger">
		<span class='help-block'>
			<strong>{{ $errors->first("seo_keys[]") }}</strong>
		</span>
				</div>
			@endif

			<div class="form-group {{ $errors->has("images[]") ? "has-error" : "" }}" >
				<label for="images">{{ trans("courses.images")}}</label>
				<div id="laraflat-images">
					@isset($item)
						@if(json_decode($item->images))
							<input type="hidden" name="oldFiles_images" value="{{ $item->images }}">
							@php $files = returnFilesImages($item , "images"); @endphp
							<div class="row text-center">
								@foreach($files["image"] as $jsonimage )
									<div class="col-lg-2 text-center"><img src="{{ small($jsonimage) }}" class="img-responsive" /><br>
										<a class="btn btn-danger" onclick="deleteThisItem(this)" data-link="{{ url("deleteFile/blogposts/".$item->id."?name=".$jsonimage."&filed_name=images") }}"><i class="fa fa-trash"></i></a></div>
								@endforeach
							</div>
							<div class="row text-center">
								@foreach($files["file"] as $jsonimage )
									<div class="col-lg-2 text-center"><a href="{{ url(env("UPLOAD_PATH")."/".$jsonimage) }}" ><i class="fa fa-file"></i></a>
										<span  onclick="deleteThisItem(this)" data-link="{{ url("deleteFile/blogposts/".$item->id."?name=".$jsonimage."&filed_name=images") }}"><i class="fa fa-trash"></i> {{ $jsonimage }} </span></div>
								@endforeach
							</div>
						@endif
					@endisset
					<input name="images[]"  type="file" multiple >
				</div>
			</div>
			@if ($errors->has("images[]"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("images[]") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group {{ $errors->has("videosurl[]") ? "has-error" : "" }}" >
				<label for="videosurl">{{ trans("courses.videosurl")}}</label>
				<div id="laraflat-videosurl">
					@if(isset($item) || old("videosurl"))
						@if((isset($item->videosurl) && json_decode($item->videosurl) ) || old("videosurl"))
							@php $items = isset($item->videosurl) && json_decode($item->videosurl) ? json_decode($item->videosurl)  : old("videosurl") @endphp
							@foreach($items as $jsonvideosurl)
								<div class="title form-inline" style="margin-top:5px;margin-bottom:5px"><input class="form-control" name="videosurl[]"  value="{{ $jsonvideosurl}}" type="text" placeholder="{{ trans("blogposts.videosurl")}}" ><span class="btn btn-warning" onclick="removetitle(this)"> <i class="fa fa-minus"></i></span></div>
							@endforeach
						@endif
					@endif
					<span class="btn btn-success" onclick="AddNewvideosurl()"><i class="fa fa-plus"></i></span>
					<span class="btn btn-danger" onclick="clearAllvideosurl(this)"><i class="fa fa-minus"></i></span>
					@push("js")
						<script>
							function AddNewvideosurl() {
								$("#laraflat-videosurl").append('<div class="videosurl form-inline" style="margin-top:5px;margin-bottom:5px">'+'<input class="form-control" name="videosurl[]"  type="text" placeholder="{{ trans("courses.videosurl")}}" >'+'<span class="btn btn-warning" onclick="removevideosurl(this)">'+' <i class="fa fa-minus"></i></span>'+'</div>');
							}
							function removevideosurl(e) {
								$(e).closest("div.videosurl").remove();
							}
							function clearAllvideosurl(e) {
								$("#laraflat-videosurl").html("");
							}
						</script>
					@endpush
				</div>
			</div>
			@if ($errors->has("videosurl[]"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("videosurl[]") }}</strong>
					</span>
				</div>
			@endif




			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-info w-md">
					<i class="material-icons">pageview</i>
					{{ trans('home.save') }} {{ trans('blog.blogposts') }}
				</button>
			</div>
		</form>
	@endcomponent
@endsection
@section('script')
	@include(layoutPath('layout.helpers.tynic'))
	<script src="{{ url('/admin/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
	<script src="{{ url('/admin/js/search.js') }}"></script>
	<script>
		$('#categories').multiSelect(search("{{ trans('categories.categories') }}"));
		function search(name){
			return {
				selectableOptgroup: true,
				selectableHeader: "<input type='text' class='form-control' autocomplete='off'  placeholder='"+name+"'>",
				selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='"+name+"'>",
				afterInit: function(ms){
					var that = this,
							$selectableSearch = that.$selectableUl.prev(),
							$selectionSearch = that.$selectionUl.prev(),
							selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
							selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';
					that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
							.on('keydown', function(e){
								if (e.which === 40){
									that.$selectableUl.focus();
									return false;
								}
							});
					that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
							.on('keydown', function(e){
								if (e.which == 40){
									that.$selectionUl.focus();
									return false;
								}
							});
				},
				afterSelect: function(){
					this.qs1.cache();
					this.qs2.cache();
				},
				afterDeselect: function(){
					this.qs1.cache();
					this.qs2.cache();
				}
			}
		}
	</script>
@endsection