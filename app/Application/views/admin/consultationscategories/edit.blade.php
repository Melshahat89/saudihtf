@extends(layoutExtend())
@section('title')
{{ trans('consultationscategories.consultationscategories') }} {{ isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('content')
@component(layoutForm() , ['title' => trans('consultationscategories.consultationscategories') , 'model' => 'consultationscategories' , 'action' => isset($item) ? trans('home.edit') : trans('home.add') ])
@include(layoutMessage())
<form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/consultationscategories/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <!-- START NAME -->
    <div class="form-group {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="name">{{ trans("consultations.title")}}</label>
        {!! extractFiled(isset($item) ? $item : null ,"name" , isset($item->name) ? $item->name : old("name") , "text" , "consultationscategories") !!}
    </div>

    @if ($errors->has("name.en"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("name.en") }}</strong>
        </span>
    </div>
    @endif
    @if ($errors->has("name.ar"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("name.ar") }}</strong>
        </span>
    </div>
    @endif
    <!-- END NAME -->

    <!-- START SLUG -->

    <div class="form-group {{ $errors->has("slug") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="slug">{{ trans("consultations.slug")}}</label>
        <input type="text" name="slug" class="form-control" id="slug" value="{{ isset($item->slug) ? $item->slug : old("slug") }}" placeholder="{{ trans("consultations.slug")}}">
    </div>
    @if ($errors->has("slug"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("slug") }}</strong>
        </span>
    </div>
    @endif

    <!-- END SLUG -->

    <!-- START STATUS -->

    <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="status">{{ trans("categories.status")}}</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="status" {{ isset($item->status) && $item->status == 0 ? "checked" : "" }} type="radio" value="0">
                {{ trans("categories.No")}}
            </label>
            <label class="form-check-label">
                <input class="form-check-input" name="status" {{ isset($item->status) && $item->status == 1 ? "checked" : "" }} type="radio" value="1">
                {{ trans("categories.Yes")}}
            </label>
        </div>
    </div>
    @if ($errors->has("status"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("status") }}</strong>
        </span>
    </div>
    @endif

    <!-- END STATUS -->

    <!-- START SHOW HOME -->

    <div class="form-group {{ $errors->has("show_home") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="show_home">{{ trans("categories.show_home")}}</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="show_home" {{ isset($item->show_home) && $item->show_home == 0 ? "checked" : "" }} type="radio" value="0">
                {{ trans("categories.No")}}
            </label>
            <label class="form-check-label">
                <input class="form-check-input" name="show_home" {{ isset($item->show_home) && $item->show_home == 1 ? "checked" : "" }} type="radio" value="1">
                {{ trans("categories.Yes")}}
            </label>
        </div>
    </div>
    @if ($errors->has("show_home"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("show_home") }}</strong>
        </span>
    </div>
    @endif

    <!-- END SHOW HOME -->

    <!-- START SHOW MENU -->

    <div class="form-group {{ $errors->has("show_menu") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="show_menu">{{ trans("categories.show_menu")}}</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="show_menu" {{ isset($item->show_menu) && $item->show_menu == 0 ? "checked" : "" }} type="radio" value="0">
                {{ trans("categories.No")}}
            </label>
            <label class="form-check-label">
                <input class="form-check-input" name="show_menu" {{ isset($item->show_menu) && $item->show_menu == 1 ? "checked" : "" }} type="radio" value="1">
                {{ trans("categories.Yes")}}
            </label>
        </div>
    </div>
    @if ($errors->has("show_menu"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("show_menu") }}</strong>
        </span>
    </div>
    @endif

    <!-- END SHOW MENU -->


    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-info w-md">
            <i class="material-icons">pageview</i>
            {{ trans('home.save') }} {{ trans('consultationscategories.consultationscategories') }}
        </button>
    </div>
</form>
@endcomponent
@endsection

@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection