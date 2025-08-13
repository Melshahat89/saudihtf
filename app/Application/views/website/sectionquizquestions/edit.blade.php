@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizquestions.sectionquizquestions') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('sectionquizquestions') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('sectionquizquestions/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.sectionquizquestions.relation.sectionquiz.edit")
                <div class="form-group {{ $errors->has("question") ? "has-error" : "" }}" > 
   <label for="question">{{ trans("sectionquizquestions.question")}}</label>
    <textarea name="question" class="form-control" id="question"   placeholder="{{ trans("sectionquizquestions.question")}}" >{{isset($item->question) ? $item->question : old("question") }}</textarea >
  </div>
   @if ($errors->has("question"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("question") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("mark") ? "has-error" : "" }}" > 
   <label for="mark">{{ trans("sectionquizquestions.mark")}}</label>
    <input type="text" name="mark" class="form-control" id="mark" value="{{ isset($item->mark) ? $item->mark : old("mark") }}"  placeholder="{{ trans("sectionquizquestions.mark")}}">
  </div>
   @if ($errors->has("mark"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("mark") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.sectionquizquestions') }}
                </button>
            </div>
        </form>
</div>
@endsection
