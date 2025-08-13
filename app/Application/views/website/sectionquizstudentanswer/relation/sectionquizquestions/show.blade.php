		<tr>
			<th>
			{{ trans( "sectionquizquestions.sectionquizquestions") }}
			</th>
			<td>
				@php $sectionquizquestions = App\Application\Model\Sectionquizquestions::find($item->sectionquizquestions_id);  @endphp
				{{ is_json($sectionquizquestions->question) ? getDefaultValueKey($sectionquizquestions->question) :  $sectionquizquestions->question}}
			</td>
		</tr>
