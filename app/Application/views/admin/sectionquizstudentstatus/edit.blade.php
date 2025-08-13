@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizstudentstatus.sectionquizstudentstatus') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizstudentstatus.sectionquizstudentstatus') , 'model' => 'sectionquizstudentstatus' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('lazyadmin/sectionquizstudentstatus/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.sectionquizstudentstatus.relation.sectionquiz.edit")
            @include("admin.sectionquizstudentstatus.relation.user.edit")
     <div class="form-group {{ $errors->has("passed") ? "has-error" : "" }}" > 
   <label for="passed">{{ trans("sectionquizstudentstatus.passed")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="passed" {{ isset($item->passed) && $item->passed == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("sectionquizstudentstatus.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="passed" {{ isset($item->passed) && $item->passed == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("sectionquizstudentstatus.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("passed"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("passed") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
   <label for="status">{{ trans("sectionquizstudentstatus.status")}}</label>
    <input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("sectionquizstudentstatus.status")}}">
  </div>
   @if ($errors->has("status"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("status") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("start_time") ? "has-error" : "" }}" > 
   <label for="start_time">{{ trans("sectionquizstudentstatus.start_time")}}</label>
    <input type="date" name="start_time" class="form-control datepicker" id="start_time" value="{{ isset($item->start_time) ? $item->start_time : old("start_time") }}"  placeholder="{{ trans("sectionquizstudentstatus.start_time")}}">
  </div>
   @if ($errors->has("start_time"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("start_time") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("end_time") ? "has-error" : "" }}" > 
   <label for="end_time">{{ trans("sectionquizstudentstatus.end_time")}}</label>
    <input type="date" name="end_time" class="form-control datepicker" id="end_time" value="{{ isset($item->end_time) ? $item->end_time : old("end_time") }}"  placeholder="{{ trans("sectionquizstudentstatus.end_time")}}">
  </div>
   @if ($errors->has("end_time"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("end_time") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('sectionquizstudentstatus.sectionquizstudentstatus') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
