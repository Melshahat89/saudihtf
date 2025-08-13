		<div class="form-group {{ $errors->has("sectionquiz") ? "has-error" : "" }}">
			<label for="sectionquiz">{{ trans( "sectionquiz.sectionquiz") }}</label>
			@php $sectionquizzes = App\Application\Model\Sectionquiz::pluck("title" ,"id")->all()  @endphp
			@php  $sectionquiz_id = isset($item) ? $item->sectionquiz_id : null @endphp
			<select name="sectionquiz_id"  class="form-control" >
			@foreach( $sectionquizzes as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $sectionquiz_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("sectionquiz"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("sectionquiz") }}</strong>
					</span>
				</div>
			@endif
			</div>
