@extends(layoutExtend())

@section('title')
    {{ trans('ipcurrency.ipcurrency') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('ipcurrency.ipcurrency') , 'model' => 'ipcurrency' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered table-responsive table-striped" > 
				<tr>
				<th width="200">{{ trans("ipcurrency.ip") }}</th>
					<td>{{ nl2br($item->ip) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.type") }}</th>
					<td>{{ nl2br($item->type) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.continent") }}</th>
					<td>{{ nl2br($item->continent) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.continent_code") }}</th>
					<td>{{ nl2br($item->continent_code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.country") }}</th>
					<td>{{ nl2br($item->country) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.country_code") }}</th>
					<td>{{ nl2br($item->country_code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.country_flag") }}</th>
					<td>{{ nl2br($item->country_flag) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.region") }}</th>
					<td>{{ nl2br($item->region) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.city") }}</th>
					<td>{{ nl2br($item->city) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.timezone") }}</th>
					<td>{{ nl2br($item->timezone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.currency") }}</th>
					<td>{{ nl2br($item->currency) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.currency_code") }}</th>
					<td>{{ nl2br($item->currency_code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("ipcurrency.currency_rates") }}</th>
					<td>{{ nl2br($item->currency_rates) }}</td>
				</tr>
		</table>

        @include('admin.ipcurrency.buttons.delete' , ['id' => $item->id])
        @include('admin.ipcurrency.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
