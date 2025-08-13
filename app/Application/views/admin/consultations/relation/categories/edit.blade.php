<div class="form-group {{ $errors->has("cons_categories_id") ? "has-error" : "" }}">
	<label class="col-md-2 col-form-label" for="cons_categories_id">{{ trans( "categories.categories") }}</label>
	@php $categories = App\Application\Model\Consultationscategories::pluck("name" ,"id")->all() @endphp
	@php $cons_categories_id = isset($item) ? $item->categories_id : null @endphp
	<select name="cons_categories_id" class="form-control">
		@foreach( $categories as $key => $relatedItem)
		<option value="{{ $key }}" {{ $key == $cons_categories_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
		@endforeach
	</select>
	@if ($errors->has("cons_categories_id"))
	<div class="alert alert-danger">
		<span class="help-block">
			<strong>{{ $errors->first("cons_categories_id") }}</strong>
		</span>
	</div>
	@endif
</div>