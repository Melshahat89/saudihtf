@extends(layoutExtend())
 @section('title')
    {{ trans('spin.spin') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('spin.spin') , 'model' => 'spin' , 'action' => trans('home.view')  ])
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
         @include('admin.spin.buttons.delete' , ['id' => $item->id])
        @include('admin.spin.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
