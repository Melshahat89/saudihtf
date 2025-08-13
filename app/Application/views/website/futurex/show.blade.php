@extends(layoutExtend('website'))
 @section('title')
    {{ trans('futurex.futurex') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('futurex') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("futurex.uid") }}</th>
     <td>{{ nl2br($item->uid) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.cn") }}</th>
     <td>{{ nl2br($item->cn) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.displayName") }}</th>
     <td>{{ nl2br($item->displayName) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.givenName") }}</th>
     <td>{{ nl2br($item->givenName) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.sn") }}</th>
     <td>{{ nl2br($item->sn) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.mail") }}</th>
     <td>{{ nl2br($item->mail) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("futurex.Nationalid") }}</th>
     <td>{{ nl2br($item->Nationalid) }}</td>
    </tr>
  </table>
         @include('website.futurex.buttons.delete' , ['id' => $item->id])
        @include('website.futurex.buttons.edit' , ['id' => $item->id])
</div>
@endsection
