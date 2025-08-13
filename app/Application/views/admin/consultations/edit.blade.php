@extends(layoutExtend())
@section('title')
{{ trans('consultations.consultations') }} {{ isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('content')
@component(layoutForm() , ['title' => trans('consultations.consultations') , 'model' => 'consultations' , 'action' => isset($item) ? trans('home.edit') : trans('home.add') ])
@include(layoutMessage())
<form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/consultations/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include("admin.consultations.relation.categories.edit")
    @include("admin.consultations.relation.consultant.edit")
    @include("admin.consultations.relation.consultation-availability.edit")

    <!-- START TITLE -->
    <div class="form-group {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="title">{{ trans("consultations.title")}}</label>
        {!! extractFiled(isset($item) ? $item : null ,"title" , isset($item->title) ? $item->title : old("title") , "text" , "consultations") !!}
    </div>

    @if ($errors->has("title.en"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("title.en") }}</strong>
        </span>
    </div>
    @endif
    @if ($errors->has("title.ar"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("title.ar") }}</strong>
        </span>
    </div>
    @endif
    <!-- END TITLE -->

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

    <!-- START DESCRIPTION -->

    <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="description">{{ trans("consultations.description")}}</label>
        {!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "consultations", 'tinymce' ) !!}
    </div>
    @if ($errors->has("description.en"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("description.en") }}</strong>
        </span>
    </div>
    @endif
    @if ($errors->has("description.ar"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("description.ar") }}</strong>
        </span>
    </div>
    @endif

    <!-- END DESCRIPTION -->

    <!-- START PRICE -->

    <div class="form-group {{ $errors->has("price") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="price">{{ trans("consultations.price")}}</label>
        <input type="text" name="price" class="form-control" id="price" value="{{ isset($item->price) ? $item->price : old("price") }}" placeholder="{{ trans("consultations.price")}}">
    </div>
    @if ($errors->has("price"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("price") }}</strong>
        </span>
    </div>
    @endif

    <!-- END PRICE -->

    <!-- START PRICE USD -->

    <div class="form-group {{ $errors->has("price_usd") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="price_in_dollar">{{ trans("consultations.price_usd")}}</label>
        <input type="text" name="price_usd" class="form-control" id="price_usd" value="{{ isset($item->price_usd) ? $item->price_usd : old("price_usd") }}" placeholder="{{ trans("consultations.price_usd")}}">
    </div>
    @if ($errors->has("price_usd"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("price_usd") }}</strong>
        </span>
    </div>
    @endif

    <!-- END PRICE USD -->

    <!-- START DISCOUNTS -->

    <div class="form-group {{ $errors->has("discount_egp") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="discount_egp">{{ trans("consultations.discount_egp")}}</label>
        <input type="text" name="discount_egp" class="form-control" id="discount_egp" value="{{ isset($item->discount_egp) ? $item->discount_egp : old("discount_egp") }}" placeholder="{{ trans("consultations.discount_egp")}}">
    </div>
    @if ($errors->has("discount_egp"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("discount_egp") }}</strong>
        </span>
    </div>
    @endif
    <div class="form-group {{ $errors->has("discount_usd") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="discount_usd">{{ trans("consultations.discount_usd")}}</label>
        <input type="text" name="discount_usd" class="form-control" id="discount_usd" value="{{ isset($item->discount_usd) ? $item->discount_usd : old("discount_usd") }}" placeholder="{{ trans("consultations.discount_usd")}}">
    </div>
    @if ($errors->has("discount_usd"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("discount_usd") }}</strong>
        </span>
    </div>
    @endif

    <!-- END DISCOUNTS -->

    <!-- START IMAGE -->

    <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="image">{{ trans("consultations.image")}}</label>
        @if(isset($item) && $item->image != "")
        <br>
        <img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
        <br>
        @endif
        <input type="file" class="form-control" name="image">
    </div>
    @if ($errors->has("image"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("image") }}</strong>
        </span>
    </div>
    @endif

    <!-- END IMAGE -->

    <!-- START PUBLISHED -->

    <div class="form-group {{ $errors->has("published") ? "has-error" : "" }}">
        <label class="col-md-2 col-form-label" for="published">{{ trans("consultations.published")}}</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" name="published" {{ isset($item->published) && $item->published == 0 ? "checked" : "" }} type="radio" value="0">
                {{ trans("courses.No")}}
            </label>
            <label class="form-check-label">
                <input class="form-check-input" name="published" {{ isset($item->published) && $item->published == 1 ? "checked" : "" }} type="radio" value="1">
                {{ trans("courses.Yes")}}
            </label>
        </div>
    </div>
    @if ($errors->has("published"))
    <div class="alert alert-danger">
        <span class='help-block'>
            <strong>{{ $errors->first("published") }}</strong>
        </span>
    </div>
    @endif

    <!-- END PUBLISHED -->

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-info w-md">
            <i class="material-icons">pageview</i>
            {{ trans('home.save') }} {{ trans('consultations.consultations') }}
        </button>
    </div>
</form>
@endcomponent
@endsection

@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection