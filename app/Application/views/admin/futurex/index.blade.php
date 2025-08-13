@extends(layoutExtend())

@section('title')
     {{ trans('futurex.futurex') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/futurex/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="uid" class="form-control " placeholder="{{ trans("futurex.uid") }}" value="{{ request()->has("uid") ? request()->get("uid") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="cn" class="form-control " placeholder="{{ trans("futurex.cn") }}" value="{{ request()->has("cn") ? request()->get("cn") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="displayName" class="form-control " placeholder="{{ trans("futurex.displayName") }}" value="{{ request()->has("displayName") ? request()->get("displayName") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="givenName" class="form-control " placeholder="{{ trans("futurex.givenName") }}" value="{{ request()->has("givenName") ? request()->get("givenName") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="sn" class="form-control " placeholder="{{ trans("futurex.sn") }}" value="{{ request()->has("sn") ? request()->get("sn") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="mail" class="form-control " placeholder="{{ trans("futurex.mail") }}" value="{{ request()->has("mail") ? request()->get("mail") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="Nationalid" class="form-control " placeholder="{{ trans("futurex.Nationalid") }}" value="{{ request()->has("Nationalid") ? request()->get("Nationalid") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('lazyadmin/futurex') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('futurex.futurex') , 'model' => 'futurex' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection