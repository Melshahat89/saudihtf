@extends(layoutExtend())
@section('title')
{{ trans('additionaldiscounts.additionaldiscounts') }} {{ isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('content')
@component(layoutForm() , ['title' => trans('additionaldiscounts.additionaldiscounts') , 'model' => 'additionaldiscounts' , 'action' => isset($item) ? trans('home.edit') : trans('home.add') ])
@include(layoutMessage())
<form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/additionaldiscounts/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="form-group {{ $errors->has("name") ? "has-error" : "" }}">
    <label class="col-md-2 col-form-label" for="title">{{ trans("promotions.title")}}</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ isset($item->name) ? $item->name : old("name") }}" placeholder="{{ trans("promotions.title")}}">
  </div>
  @if ($errors->has("name"))
  <div class="alert alert-danger">
    <span class='help-block'>
      <strong>{{ $errors->first("name") }}</strong>
    </span>
  </div>
  @endif

  <div class="form-group {{ $errors->has("egp_disc") ? "has-error" : "" }}">
    <label class="col-md-2 col-form-label" for="discount_egp">{{ trans("courses.discount_egp")}}</label>
    <input type="text" name="egp_disc" class="form-control" id="egp_disc" value="{{ isset($item->egp_disc) ? $item->egp_disc : old("egp_disc") }}" placeholder="{{ trans("courses.discount_egp")}}">
  </div>
  @if ($errors->has("egp_disc"))
  <div class="alert alert-danger">
    <span class='help-block'>
      <strong>{{ $errors->first("egp_disc") }}</strong>
    </span>
  </div>
  @endif
  <div class="form-group {{ $errors->has("usd_disc") ? "has-error" : "" }}">
    <label class="col-md-2 col-form-label" for="discount_usd">{{ trans("courses.discount_usd")}}</label>
    <input type="text" name="usd_disc" class="form-control" id="usd_disc" value="{{ isset($item->usd_disc) ? $item->usd_disc : old("usd_disc") }}" placeholder="{{ trans("courses.discount_usd")}}">
  </div>
  @if ($errors->has("usd_disc"))
  <div class="alert alert-danger">
    <span class='help-block'>
      <strong>{{ $errors->first("usd_disc") }}</strong>
    </span>
  </div>
  @endif

  <div class="form-group">
    <div class="form-group">
      <select class="select2 form-control" name="status">
        <option value="">Active?</option>
        <option value="1" {{ isset($item->status) && $item->status == 1 ? 'selected' : '' }}>YES</option>
        <option value="0" {{ isset($item->status) && $item->status == 0 ? 'selected' : '' }}>NO</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-info w-md">
      <i class="material-icons">pageview</i>
      {{ trans('home.save') }} {{ trans('additionaldiscounts.additionaldiscounts') }}
    </button>
  </div>
</form>
@endcomponent
@endsection