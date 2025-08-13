@extends(layoutExtend())

@section('title')
    {{ trans('seoerrors.seoerrors') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('seoerrors.seoerrors') , 'model' => 'seoerrors' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("seoerrors.link") }}</th>
					<td>{{ nl2br($item->link) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("seoerrors.code") }}</th>
					<td>{{ nl2br($item->code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("seoerrors.comment") }}</th>
					<td>{{ nl2br($item->comment) }}</td>
				</tr>
		</table>

        @include('admin.seoerrors.buttons.delete' , ['id' => $item->id])
        @include('admin.seoerrors.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
