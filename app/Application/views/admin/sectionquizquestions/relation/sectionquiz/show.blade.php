		<tr>
			<th>
			{{ trans( "sectionquiz.sectionquiz") }}
			</th>
			<td>
				@php $sectionquiz = App\Application\Model\Sectionquiz::find($item->sectionquiz_id);  @endphp
				{{ is_json($sectionquiz->title) ? getDefaultValueKey($sectionquiz->title) :  $sectionquiz->title}}
			</td>
		</tr>
