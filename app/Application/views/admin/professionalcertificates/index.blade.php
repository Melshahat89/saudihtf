@extends(layoutExtend())

@section('title')
     {{ trans('professionalcertificates.professionalcertificates') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/professionalcertificates/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="startdate" class="form-control datepicker2" placeholder="{{ trans("professionalcertificates.startdate") }}" value="{{ request()->has("startdate") ? request()->get("startdate") : "" }}">
		</div>
		<div class="form-group">
			<select style="width:80px" name="appointment" class="form-control select2" placeholder="{{ trans("professionalcertificates.appointment") }}">
				<option value="1"{{ request()->has("appointment") &&  request()->get("appointment") === 1 ? "selected" : "" }}>{{ trans("professionalcertificates.Yes") }}</option>
				<option value="0"{{ request()->has("appointment") &&  request()->get("appointment") === 0 ? "selected" : "" }}>{{ trans("professionalcertificates.No") }}</option>
		</select>
		</div>
		<div class="form-group">
			<input type="text" name="days" class="form-control " placeholder="{{ trans("professionalcertificates.days") }}" value="{{ request()->has("days") ? request()->get("days") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="hours" class="form-control " placeholder="{{ trans("professionalcertificates.hours") }}" value="{{ request()->has("hours") ? request()->get("hours") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="seats" class="form-control " placeholder="{{ trans("professionalcertificates.seats") }}" value="{{ request()->has("seats") ? request()->get("seats") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="registrationdeadline" class="form-control " placeholder="{{ trans("professionalcertificates.registrationdeadline") }}" value="{{ request()->has("registrationdeadline") ? request()->get("registrationdeadline") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('lazyadmin/professionalcertificates') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('professionalcertificates.professionalcertificates') , 'model' => 'professionalcertificates' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection