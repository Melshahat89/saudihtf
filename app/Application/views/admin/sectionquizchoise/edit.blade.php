@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizchoise.sectionquizchoise') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizchoise.sectionquizchoise') , 'model' => 'sectionquizchoise' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('lazyadmin/sectionquizchoise/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.sectionquizchoise.relation.sectionquizquestions.edit")
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
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('sectionquizchoise.sectionquizchoise') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
