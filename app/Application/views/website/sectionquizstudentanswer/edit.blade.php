@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizstudentanswer.sectionquizstudentanswer') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('sectionquizstudentanswer') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('sectionquizstudentanswer/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.sectionquizstudentanswer.relation.sectionquizquestions.edit")
            @include("website.sectionquizstudentanswer.relation.user.edit")
            @include("website.sectionquizstudentanswer.relation.sectionquizchoise.edit")
            @include("website.sectionquizstudentanswer.relation.sectionquiz.edit")
            @include("website.sectionquizstudentanswer.relation.sectionquizstudentstatus.edit")
                <div class="form-group {{ $errors->has("is_correct") ? "has-error" : "" }}" > 
   <label for="is_correct">{{ trans("sectionquizstudentanswer.is_correct")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="is_correct" {{ isset($item->is_correct) && $item->is_correct == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("sectionquizstudentanswer.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="is_correct" {{ isset($item->is_correct) && $item->is_correct == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("sectionquizstudentanswer.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("is_correct"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("is_correct") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("answered") ? "has-error" : "" }}" > 
   <label for="answered">{{ trans("sectionquizstudentanswer.answered")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="answered" {{ isset($item->answered) && $item->answered == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("sectionquizstudentanswer.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="answered" {{ isset($item->answered) && $item->answered == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("sectionquizstudentanswer.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("answered"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("answered") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("mark") ? "has-error" : "" }}" > 
   <label for="mark">{{ trans("sectionquizstudentanswer.mark")}}</label>
    <input type="text" name="mark" class="form-control" id="mark" value="{{ isset($item->mark) ? $item->mark : old("mark") }}"  placeholder="{{ trans("sectionquizstudentanswer.mark")}}">
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
                    {{ trans('website.Update') }}  {{ trans('website.sectionquizstudentanswer') }}
                </button>
            </div>
        </form>
</div>
@endsection
