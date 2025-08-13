@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizchoise.sectionquizchoise') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('sectionquizchoise') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('sectionquizchoise/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.sectionquizchoise.relation.sectionquizquestions.edit")
                <div class="form-group {{ $errors->has("choise") ? "has-error" : "" }}" > 
   <label for="choise">{{ trans("sectionquizchoise.choise")}}</label>
    <input type="text" name="choise" class="form-control" id="choise" value="{{ isset($item->choise) ? $item->choise : old("choise") }}"  placeholder="{{ trans("sectionquizchoise.choise")}}">
  </div>
   @if ($errors->has("choise"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("choise") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("is_correct") ? "has-error" : "" }}" > 
   <label for="is_correct">{{ trans("sectionquizchoise.is_correct")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="is_correct" {{ isset($item->is_correct) && $item->is_correct == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("sectionquizchoise.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="is_correct" {{ isset($item->is_correct) && $item->is_correct == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("sectionquizchoise.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("is_correct"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("is_correct") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.sectionquizchoise') }}
                </button>
            </div>
        </form>
</div>
@endsection
