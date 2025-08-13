@extends(layoutExtend('website'))

@section('title')
    {{ trans('ipcurrency.ipcurrency') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('ipcurrency') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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

        @include('website.ipcurrency.buttons.delete' , ['id' => $item->id])
        @include('website.ipcurrency.buttons.edit' , ['id' => $item->id])
</div>
@endsection
