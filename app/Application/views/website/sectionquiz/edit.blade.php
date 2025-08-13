@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquiz.sectionquiz') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('sectionquiz') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('sectionquiz/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.sectionquiz.relation.courses.edit")
            @include("website.sectionquiz.relation.coursesections.edit")
            @include("website.sectionquiz.relation.user.edit")
                <div class="form-group {{ $errors->has("title") ? "has-error" : "" }}" > 
   <label for="title">{{ trans("sectionquiz.title")}}</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ isset($item->title) ? $item->title : old("title") }}"  placeholder="{{ trans("sectionquiz.title")}}">
  </div>
   @if ($errors->has("title"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("title") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("description") ? "has-error" : "" }}" > 
   <label for="description">{{ trans("sectionquiz.description")}}</label>
    <textarea name="description" class="form-control" id="description"   placeholder="{{ trans("sectionquiz.description")}}" >{{isset($item->description) ? $item->description : old("description") }}</textarea >
  </div>
   @if ($errors->has("description"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("description") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.sectionquiz') }}
                </button>
            </div>
        </form>
</div>
@endsection
