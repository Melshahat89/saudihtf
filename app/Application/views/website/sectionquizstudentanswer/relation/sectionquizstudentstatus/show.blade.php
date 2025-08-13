		<tr>
			<th>
			{{ trans( "sectionquizstudentstatus.sectionquizstudentstatus") }}
			</th>
			<td>
				@php $sectionquizstudentstatus = App\Application\Model\Sectionquizstudentstatus::find($item->sectionquizstudentstatus_id);  @endphp
				{{ is_json($sectionquizstudentstatus->id) ? getDefaultValueKey($sectionquizstudentstatus->id) :  $sectionquizstudentstatus->id}}
			</td>
		</tr>
