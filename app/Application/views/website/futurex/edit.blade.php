@extends(layoutExtend('website'))
 @section('title')
    {{ trans('futurex.futurex') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('futurex') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('futurex/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.futurex.relation.user.edit")
                <div class="form-group {{ $errors->has("uid") ? "has-error" : "" }}" > 
   <label for="uid">{{ trans("futurex.uid")}}</label>
    <input type="text" name="uid" class="form-control" id="uid" value="{{ isset($item->uid) ? $item->uid : old("uid") }}"  placeholder="{{ trans("futurex.uid")}}">
  </div>
   @if ($errors->has("uid"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("uid") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("cn") ? "has-error" : "" }}" > 
   <label for="cn">{{ trans("futurex.cn")}}</label>
    <input type="text" name="cn" class="form-control" id="cn" value="{{ isset($item->cn) ? $item->cn : old("cn") }}"  placeholder="{{ trans("futurex.cn")}}">
  </div>
   @if ($errors->has("cn"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("cn") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("displayName") ? "has-error" : "" }}" > 
   <label for="displayName">{{ trans("futurex.displayName")}}</label>
    <input type="text" name="displayName" class="form-control" id="displayName" value="{{ isset($item->displayName) ? $item->displayName : old("displayName") }}"  placeholder="{{ trans("futurex.displayName")}}">
  </div>
   @if ($errors->has("displayName"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("displayName") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("givenName") ? "has-error" : "" }}" > 
   <label for="givenName">{{ trans("futurex.givenName")}}</label>
    <input type="text" name="givenName" class="form-control" id="givenName" value="{{ isset($item->givenName) ? $item->givenName : old("givenName") }}"  placeholder="{{ trans("futurex.givenName")}}">
  </div>
   @if ($errors->has("givenName"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("givenName") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("sn") ? "has-error" : "" }}" > 
   <label for="sn">{{ trans("futurex.sn")}}</label>
    <input type="text" name="sn" class="form-control" id="sn" value="{{ isset($item->sn) ? $item->sn : old("sn") }}"  placeholder="{{ trans("futurex.sn")}}">
  </div>
   @if ($errors->has("sn"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("sn") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("mail") ? "has-error" : "" }}" > 
   <label for="mail">{{ trans("futurex.mail")}}</label>
    <input type="text" name="mail" class="form-control" id="mail" value="{{ isset($item->mail) ? $item->mail : old("mail") }}"  placeholder="{{ trans("futurex.mail")}}">
  </div>
   @if ($errors->has("mail"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("mail") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("Nationalid") ? "has-error" : "" }}" > 
   <label for="Nationalid">{{ trans("futurex.Nationalid")}}</label>
    <input type="text" name="Nationalid" class="form-control" id="Nationalid" value="{{ isset($item->Nationalid) ? $item->Nationalid : old("Nationalid") }}"  placeholder="{{ trans("futurex.Nationalid")}}">
  </div>
   @if ($errors->has("Nationalid"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("Nationalid") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.futurex') }}
                </button>
            </div>
        </form>
</div>
@endsection
