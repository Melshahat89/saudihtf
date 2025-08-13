@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizchoise.sectionquizchoise') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizchoise.sectionquizchoise') , 'model' => 'sectionquizchoise' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquizchoise.choise") }}</th>
     <td>{{ nl2br($item->choise) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizchoise.is_correct") }}</th>
     <td>
    {{ $item->is_correct == 1 ? trans("sectionquizchoise.Yes") : trans("sectionquizchoise.No")  }}
     </td>
    </tr>
  </table>
         @include('admin.sectionquizchoise.buttons.delete' , ['id' => $item->id])
        @include('admin.sectionquizchoise.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
