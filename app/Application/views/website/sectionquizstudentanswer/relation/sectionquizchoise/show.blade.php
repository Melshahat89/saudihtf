		<tr>
			<th>
			{{ trans( "sectionquizchoise.sectionquizchoise") }}
			</th>
			<td>
				@php $sectionquizchoise = App\Application\Model\Sectionquizchoise::find($item->sectionquizchoise_id);  @endphp
				{{ is_json($sectionquizchoise->choise) ? getDefaultValueKey($sectionquizchoise->choise) :  $sectionquizchoise->choise}}
			</td>
		</tr>
