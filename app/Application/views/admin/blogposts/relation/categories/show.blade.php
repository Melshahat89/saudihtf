		<tr>
			<th>
			{{ trans( "categories.categories") }}
			</th>
			<td>
				@php $categories = App\Application\Model\Blogcategories::find($item->cat_id);  @endphp
				{{ is_json($categories->title) ? getDefaultValueKey($categories->title) :  $categories->title}}
			</td>
		</tr>
