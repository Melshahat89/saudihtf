@extends(layoutExtend())
 @section('title')
    {{ trans('promotioncourses.promotioncourses') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('promotioncourses.promotioncourses') , 'model' => 'promotioncourses' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/promotioncourses/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.promotioncourses.relation.courses.edit")
            @include("admin.promotioncourses.relation.promotions.edit")
     <div class="form-group {{ $errors->has("note") ? "has-error" : "" }}" > 
   <label class="col-md-2 col-form-label" for="note">{{ trans("promotioncourses.note")}}</label>
    <input type="text" name="note" class="form-control" id="note" value="{{ isset($item->note) ? $item->note : old("note") }}"  placeholder="{{ trans("promotioncourses.note")}}">
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
                    {{ trans('home.save') }}  {{ trans('promotioncourses.promotioncourses') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
