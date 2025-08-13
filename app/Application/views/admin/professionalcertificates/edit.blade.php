@extends(layoutExtend())
 @section('title')
    {{ trans('professionalcertificates.professionalcertificates') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('professionalcertificates.professionalcertificates') , 'model' => 'professionalcertificates' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('lazyadmin/professionalcertificates/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.professionalcertificates.relation.courses.edit")
     <div class="form-group {{ $errors->has("startdate") ? "has-error" : "" }}" > 
   <label for="startdate">{{ trans("professionalcertificates.startdate")}}</label>
    <input type="date" name="startdate" class="form-control" id="startdate" value="{{ isset($item->startdate) ? $item->startdate : old("startdate") }}"  placeholder="{{ trans("professionalcertificates.startdate")}}">
  </div>
   @if ($errors->has("startdate"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("startdate") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("appointment") ? "has-error" : "" }}" > 
   <label for="appointment">{{ trans("professionalcertificates.appointment")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="appointment" {{ isset($item->appointment) && $item->appointment == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("professionalcertificates.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="appointment" {{ isset($item->appointment) && $item->appointment == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("professionalcertificates.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("appointment"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("appointment") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("days") ? "has-error" : "" }}" > 
   <label for="days">{{ trans("professionalcertificates.days")}}</label>
    <input type="text" name="days" class="form-control" id="days" value="{{ isset($item->days) ? $item->days : old("days") }}"  placeholder="{{ trans("professionalcertificates.days")}}">
  </div>
   @if ($errors->has("days"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("days") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("hours") ? "has-error" : "" }}" > 
   <label for="hours">{{ trans("professionalcertificates.hours")}}</label>
    <input type="text" name="hours" class="form-control" id="hours" value="{{ isset($item->hours) ? $item->hours : old("hours") }}"  placeholder="{{ trans("professionalcertificates.hours")}}">
  </div>
   @if ($errors->has("hours"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("hours") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("seats") ? "has-error" : "" }}" > 
   <label for="seats">{{ trans("professionalcertificates.seats")}}</label>
    <input type="text" name="seats" class="form-control" id="seats" value="{{ isset($item->seats) ? $item->seats : old("seats") }}"  placeholder="{{ trans("professionalcertificates.seats")}}">
  </div>
   @if ($errors->has("seats"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("seats") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("registrationdeadline") ? "has-error" : "" }}" > 
   <label for="registrationdeadline">{{ trans("professionalcertificates.registrationdeadline")}}</label>
    <input type="date" name="registrationdeadline" class="form-control" id="registrationdeadline" value="{{ isset($item->registrationdeadline) ? $item->registrationdeadline : old("registrationdeadline") }}"  placeholder="{{ trans("professionalcertificates.registrationdeadline")}}">
  </div>
   @if ($errors->has("registrationdeadline"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("registrationdeadline") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('professionalcertificates.professionalcertificates') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
