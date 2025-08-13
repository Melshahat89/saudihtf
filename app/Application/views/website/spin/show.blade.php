@extends(layoutExtend('website'))
 @section('title')
    {{ trans('spin.spin') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('spin') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("spin.type") }}</th>
     <td>{{ nl2br($item->type) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("spin.code") }}</th>
     <td>{{ nl2br($item->code) }}</td>
    </tr>
  </table>
         @include('website.spin.buttons.delete' , ['id' => $item->id])
        @include('website.spin.buttons.edit' , ['id' => $item->id])
</div>
@endsection
