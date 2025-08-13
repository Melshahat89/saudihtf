		<div class="form-group {{ $errors->has("categories") ? "has-error" : "" }}">
			<label for="categories"> {{ trans( "categories.categories") }}</label>
			@php $categories = App\Application\Model\Categories::pluck("name" ,"id")->all()  @endphp
			@php  $parent_id = isset($item) ? $item->parent_id : null @endphp
			<select name="parent_id"  class="form-control input-item select-custom" >
				<option value="">Please select one parent .....</option>
			@foreach( $categories as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $parent_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("categories"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("categories") }}</strong>
					</span>
				</div>
			@endif
			</div>
