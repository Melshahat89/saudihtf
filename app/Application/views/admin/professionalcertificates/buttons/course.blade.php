<tr>
	<th>
		{{ trans( "courses.courses") }}
	</th>
	<td>
		@php $courses = App\Application\Model\Courses::find($courses_id);  @endphp
		{{ is_json($courses->title) ? getDefaultValueKey($courses->title_lang) :  $courses->title_lang}}
	</td>
</tr>
