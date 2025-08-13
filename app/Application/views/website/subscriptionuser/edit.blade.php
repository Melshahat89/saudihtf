@extends(layoutExtend('website'))
 @section('title')
    {{ trans('subscriptionuser.subscriptionuser') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('subscriptionuser') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('subscriptionuser/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.subscriptionuser.relation.orders.edit")
            @include("website.subscriptionuser.relation.user.edit")
                <div class="form-group {{ $errors->has("subscription_id") ? "has-error" : "" }}" > 
   <label for="subscription_id">{{ trans("subscriptionuser.subscription_id")}}</label>
    <input type="text" name="subscription_id" class="form-control" id="subscription_id" value="{{ isset($item->subscription_id) ? $item->subscription_id : old("subscription_id") }}"  placeholder="{{ trans("subscriptionuser.subscription_id")}}">
  </div>
   @if ($errors->has("subscription_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("subscription_id") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("start_date") ? "has-error" : "" }}" > 
   <label for="start_date">{{ trans("subscriptionuser.start_date")}}</label>
    <input type="date" name="start_date" class="form-control datepicker" id="start_date" value="{{ isset($item->start_date) ? $item->start_date : old("start_date") }}"  placeholder="{{ trans("subscriptionuser.start_date")}}">
  </div>
   @if ($errors->has("start_date"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("start_date") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("end_date") ? "has-error" : "" }}" > 
   <label for="end_date">{{ trans("subscriptionuser.end_date")}}</label>
    <input type="date" name="end_date" class="form-control datepicker" id="end_date" value="{{ isset($item->end_date) ? $item->end_date : old("end_date") }}"  placeholder="{{ trans("subscriptionuser.end_date")}}">
  </div>
   @if ($errors->has("end_date"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("end_date") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("amount") ? "has-error" : "" }}" > 
   <label for="amount">{{ trans("subscriptionuser.amount")}}</label>
    <input type="text" name="amount" class="form-control" id="amount" value="{{ isset($item->amount) ? $item->amount : old("amount") }}"  placeholder="{{ trans("subscriptionuser.amount")}}">
  </div>
   @if ($errors->has("amount"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("amount") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("b_type") ? "has-error" : "" }}" > 
   <label for="b_type">{{ trans("subscriptionuser.b_type")}}</label>
    <input type="text" name="b_type" class="form-control" id="b_type" value="{{ isset($item->b_type) ? $item->b_type : old("b_type") }}"  placeholder="{{ trans("subscriptionuser.b_type")}}">
  </div>
   @if ($errors->has("b_type"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("b_type") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("is_active") ? "has-error" : "" }}" > 
   <label for="is_active">{{ trans("subscriptionuser.is_active")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="is_active" {{ isset($item->is_active) && $item->is_active == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("subscriptionuser.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="is_active" {{ isset($item->is_active) && $item->is_active == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("subscriptionuser.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("is_active"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("is_active") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("is_collected") ? "has-error" : "" }}" > 
   <label for="is_collected">{{ trans("subscriptionuser.is_collected")}}</label>
     <div class="form-check">
     <label class="form-check-label">
     <input class="form-check-input" name="is_collected" {{ isset($item->is_collected) && $item->is_collected == 0 ? "checked" : "" }} type="radio" value="0" > 
     {{ trans("subscriptionuser.No")}}
     </label > 
    <label class="form-check-label">
    <input class="form-check-input" name="is_collected" {{ isset($item->is_collected) && $item->is_collected == 1 ? "checked" : "" }} type="radio" value="1" > 
         {{ trans("subscriptionuser.Yes")}}
     </label> 
    </div> 		</div>
   @if ($errors->has("is_collected"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("is_collected") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.subscriptionuser') }}
                </button>
            </div>
        </form>
</div>
@endsection
