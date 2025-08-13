		<div class="form-group {{ $errors->has("sectionquizchoise") ? "has-error" : "" }}">
			<label for="sectionquizchoise">{{ trans( "sectionquizchoise.sectionquizchoise") }}</label>
			@php $sectionquizchoises = App\Application\Model\Sectionquizchoise::pluck("choise" ,"id")->all()  @endphp
			@php  $sectionquizchoise_id = isset($item) ? $item->sectionquizchoise_id : null @endphp
			<select name="sectionquizchoise_id"  class="form-control" >
			@foreach( $sectionquizchoises as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $sectionquizchoise_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("sectionquizchoise"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("sectionquizchoise") }}</strong>
					</span>
				</div>
			@endif
			</div>
