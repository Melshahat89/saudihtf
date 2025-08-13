@extends(layoutExtend('website'))

@section('title')
    {{ trans('currencies.currencies') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('currencies') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("currencies.currency_code") }}</th>
					<td>{{ nl2br($item->currency_code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.country_id") }}</th>
					<td>{{ nl2br($item->country_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.discount_perc") }}</th>
					<td>{{ nl2br($item->discount_perc) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.exchangeratetoegp") }}</th>
					<td>{{ nl2br($item->exchangeratetoegp) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.exchangeratetousd") }}</th>
					<td>{{ nl2br($item->exchangeratetousd) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.b2c_monthly_discount_perc") }}</th>
					<td>{{ nl2br($item->b2c_monthly_discount_perc) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("currencies.b2c_yearly_discount_perc") }}</th>
					<td>{{ nl2br($item->b2c_yearly_discount_perc) }}</td>
				</tr>
		</table>

        @include('website.currencies.buttons.delete' , ['id' => $item->id])
        @include('website.currencies.buttons.edit' , ['id' => $item->id])
</div>
@endsection
