		<div class="form-group {{ $errors->has("consultant") ? "has-error" : "" }}">
			<label class="col-md-2 col-form-label" for="consultant_id">{{ trans( "consultations.consultant") }}</label>
			@php $consultants = App\Application\Model\User::where('group_id', App\Application\Model\User::TYPE_CONSULTANT)->pluck("name" ,"id")->all();
			@endphp
			@php  $consultant_id = isset($item) ? $item->consultant_id : null @endphp
			<select id="consultant_id" name="consultant_id"  class="form-control mdb-select md-form" >
			@foreach( $consultants as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $consultant_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("consultant_id"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("consultant_id") }}</strong>
					</span>
				</div>
			@endif
			</div>
