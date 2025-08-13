@extends(layoutExtend())

@section('title')
     {{ trans('newsletter.newsletter') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('lazyadmin/newsletter/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="email" class="form-control " placeholder="{{ trans("newsletter.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}">
		</div>
		<div class="form-group">
			<select style="width:80px" name="active" class="form-control select2" placeholder="{{ trans("newsletter.active") }}">
				<option value="1"{{ request()->has("active") &&  request()->get("active") === 1 ? "selected" : "" }}>{{ trans("newsletter.Yes") }}</option>
				<option value="0"{{ request()->has("active") &&  request()->get("active") === 0 ? "selected" : "" }}>{{ trans("newsletter.No") }}</option>
		</select>
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('lazyadmin/newsletter') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('newsletter.newsletter') , 'model' => 'newsletter' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection