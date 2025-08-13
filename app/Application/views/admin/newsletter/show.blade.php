@extends(layoutExtend())

@section('title')
    {{ trans('newsletter.newsletter') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('newsletter.newsletter') , 'model' => 'newsletter' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("newsletter.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("newsletter.active") }}</th>
					<td>
				{{ $item->active == 1 ? trans("newsletter.Yes") : trans("newsletter.No")  }}
					</td>
				</tr>
		</table>

        @include('admin.newsletter.buttons.delete' , ['id' => $item->id])
        @include('admin.newsletter.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
