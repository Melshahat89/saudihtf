		<div class="form-group {{ $errors->has("sectionquizstudentstatus") ? "has-error" : "" }}">
			<label for="sectionquizstudentstatus">{{ trans( "sectionquizstudentstatus.sectionquizstudentstatus") }}</label>
			@php $sectionquizstudentstatuses = App\Application\Model\Sectionquizstudentstatus::pluck("id" ,"id")->all()  @endphp
			@php  $sectionquizstudentstatus_id = isset($item) ? $item->sectionquizstudentstatus_id : null @endphp
			<select name="sectionquizstudentstatus_id"  class="form-control" >
			@foreach( $sectionquizstudentstatuses as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $sectionquizstudentstatus_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("sectionquizstudentstatus"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("sectionquizstudentstatus") }}</strong>
					</span>
				</div>
			@endif
			</div>
