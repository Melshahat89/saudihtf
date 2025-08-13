@extends(layoutExtend())

@section('title')
     {{ trans('ipcurrency.ipcurrency') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('lazyadmin/ipcurrency/pluck') }}" ><i class="fa fa-trash"></i></button>
    <button class="btn btn-success" onclick="checkAll(this)"  ><i class="fa fa-check-circle"></i> </button>
    <button class="btn btn-warning" onclick="unCheckAll(this)"  ><i class="fa fa-close"></i>  </button>
@endpush

@push('search')
    <form method="get" class="form-inline">
        <div class="form-group">
            <input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
        </div>
        <div class="form-group">
            <input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">
        </div>
		<div class="form-group">
			<input type="text" name="ip" class="form-control " placeholder="{{ trans("ipcurrency.ip") }}" value="{{ request()->has("ip") ? request()->get("ip") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="type" class="form-control " placeholder="{{ trans("ipcurrency.type") }}" value="{{ request()->has("type") ? request()->get("type") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="continent" class="form-control " placeholder="{{ trans("ipcurrency.continent") }}" value="{{ request()->has("continent") ? request()->get("continent") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="continent_code" class="form-control " placeholder="{{ trans("ipcurrency.continent_code") }}" value="{{ request()->has("continent_code") ? request()->get("continent_code") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="country" class="form-control " placeholder="{{ trans("ipcurrency.country") }}" value="{{ request()->has("country") ? request()->get("country") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="country_code" class="form-control " placeholder="{{ trans("ipcurrency.country_code") }}" value="{{ request()->has("country_code") ? request()->get("country_code") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="country_flag" class="form-control " placeholder="{{ trans("ipcurrency.country_flag") }}" value="{{ request()->has("country_flag") ? request()->get("country_flag") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="region" class="form-control " placeholder="{{ trans("ipcurrency.region") }}" value="{{ request()->has("region") ? request()->get("region") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="city" class="form-control " placeholder="{{ trans("ipcurrency.city") }}" value="{{ request()->has("city") ? request()->get("city") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="timezone" class="form-control " placeholder="{{ trans("ipcurrency.timezone") }}" value="{{ request()->has("timezone") ? request()->get("timezone") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="currency" class="form-control " placeholder="{{ trans("ipcurrency.currency") }}" value="{{ request()->has("currency") ? request()->get("currency") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="currency_code" class="form-control " placeholder="{{ trans("ipcurrency.currency_code") }}" value="{{ request()->has("currency_code") ? request()->get("currency_code") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="currency_rates" class="form-control " placeholder="{{ trans("ipcurrency.currency_rates") }}" value="{{ request()->has("currency_rates") ? request()->get("currency_rates") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('lazyadmin/ipcurrency') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('ipcurrency.ipcurrency') , 'model' => 'ipcurrency' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection