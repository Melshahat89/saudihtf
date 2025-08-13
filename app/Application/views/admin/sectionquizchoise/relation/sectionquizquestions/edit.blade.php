		<div class="form-group {{ $errors->has("sectionquizquestions") ? "has-error" : "" }}">
			<label for="sectionquizquestions">{{ trans( "sectionquizquestions.sectionquizquestions") }}</label>
			@php $sectionquizquestions = App\Application\Model\Sectionquizquestions::pluck("question" ,"id")->all()  @endphp
			@php  $sectionquizquestions_id = isset($item) ? $item->sectionquizquestions_id : null @endphp
			<select name="sectionquizquestions_id"  class="form-control" >
			@foreach( $sectionquizquestions as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $sectionquizquestions_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("sectionquizquestions"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("sectionquizquestions") }}</strong>
					</span>
				</div>
			@endif
			</div>
