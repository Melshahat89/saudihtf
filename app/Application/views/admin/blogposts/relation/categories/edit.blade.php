<div class="form-group">
	<div class="">
		<label class="col-md-2 col-form-label" for="">{{ trans( "categories.categories") }}</label>

		@php $categories = isset($item['blogpostcategories']) ? $item['blogpostcategories']->pluck('id')->all() : null; @endphp
		{!! Form::select('blogpostcategories[]' , App\Application\Model\Blogcategories::pluck("title" ,"id")->all() , $categories, ['multiple' => true , 'id' => 'categories' ] ) !!}
	</div>
</div>
@if ($errors->has("blogpostcategories"))
<div class="alert alert-danger">
	<span class='help-block'>
		<strong>{{ $errors->first("blogpostcategories") }}</strong>
	</span>
</div>
@endif