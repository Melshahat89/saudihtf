@extends(layoutExtend())
 @section('title')
    {{ trans('progress.progress') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('progress.progress') , 'model' => 'progress' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('admin/progress/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.progress.relation.courselectures.edit")
            @include("admin.progress.relation.courses.edit")
            @include("admin.progress.relation.user.edit")
     <div class="form-group {{ $errors->has("percentage") ? "has-error" : "" }}" > 
   <label class="col-md-2 col-form-label" for="percentage">{{ trans("progress.percentage")}}</label>
    <input type="text" name="percentage" class="form-control" id="percentage" value="{{ isset($item->percentage) ? $item->percentage : old("percentage") }}"  placeholder="{{ trans("progress.percentage")}}">
  </div>
   @if ($errors->has("percentage"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("percentage") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("note") ? "has-error" : "" }}" > 
   <label class="col-md-2 col-form-label" for="note">{{ trans("progress.note")}}</label>
    <input type="text" name="note" class="form-control" id="note" value="{{ isset($item->note) ? $item->note : old("note") }}"  placeholder="{{ trans("progress.note")}}">
  </div>
   @if ($errors->has("note"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("note") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('progress.progress') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
