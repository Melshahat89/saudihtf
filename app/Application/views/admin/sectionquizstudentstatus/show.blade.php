@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizstudentstatus.sectionquizstudentstatus') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizstudentstatus.sectionquizstudentstatus') , 'model' => 'sectionquizstudentstatus' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.passed") }}</th>
     <td>
    {{ $item->passed == 1 ? trans("sectionquizstudentstatus.Yes") : trans("sectionquizstudentstatus.No")  }}
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.status") }}</th>
     <td>{{ nl2br($item->status) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.start_time") }}</th>
     <td>{{ nl2br($item->start_time) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.end_time") }}</th>
     <td>{{ nl2br($item->end_time) }}</td>
    </tr>
  </table>
         @include('admin.sectionquizstudentstatus.buttons.delete' , ['id' => $item->id])
        @include('admin.sectionquizstudentstatus.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
