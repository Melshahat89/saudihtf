@extends(layoutExtend())

@section('title')
    {{ trans('blog.blogcategories') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')
    {{ Html::style('/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('blog.blogcategories') , 'model' => 'blogcategories' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/blogcategories/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}">
                <label class="col-md-2 col-form-label" for="title">{{ trans("categorie.title")}}</label>
                {!! extractFiled(isset($item) ? $item : null ,"title" , isset($item->title) ? $item->title : old("title") , "text" , "categorie") !!}
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

            <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="description">{{ trans("courses.description")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "courses", 'tinymce' ) !!}
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

            <div class="form-group {{ $errors->has("slug") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="slug">{{ trans("courses.slug")}}</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ isset($item->slug) ? $item->slug : old("slug") }}"  placeholder="{{ trans("courses.slug")}}">
            </div>
            @if ($errors->has("slug"))
                <div class="alert alert-danger">
                     <span class='help-block'>
                      <strong>{{ $errors->first("slug") }}</strong>
                     </span>
                </div>
            @endif

            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('blog.blogcategories') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection
