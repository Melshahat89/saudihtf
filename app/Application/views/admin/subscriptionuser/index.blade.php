@extends(layoutExtend())

@section('title')
     {{ trans('subscriptionuser.subscriptionuser') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/subscriptionuser/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="subscription_id" class="form-control " placeholder="{{ trans("subscriptionuser.subscription_id") }}" value="{{ request()->has("subscription_id") ? request()->get("subscription_id") : "" }}">
		</div>

		<div class="form-group">
			<input type="text" name="amount" class="form-control " placeholder="{{ trans("subscriptionuser.amount") }}" value="{{ request()->has("amount") ? request()->get("amount") : "" }}">
		</div>

		<div class="form-group">
			<input type="text" name="email" class="form-control " placeholder="User email" value="">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('lazyadmin/subscriptionuser') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('subscriptionuser.subscriptionuser') , 'model' => 'subscriptionuser' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection