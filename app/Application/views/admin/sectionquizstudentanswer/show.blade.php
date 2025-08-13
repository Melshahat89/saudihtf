@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizstudentanswer.sectionquizstudentanswer') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizstudentanswer.sectionquizstudentanswer') , 'model' => 'sectionquizstudentanswer' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquizstudentanswer.is_correct") }}</th>
     <td>
    {{ $item->is_correct == 1 ? trans("sectionquizstudentanswer.Yes") : trans("sectionquizstudentanswer.No")  }}
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentanswer.answered") }}</th>
     <td>
    {{ $item->answered == 1 ? trans("sectionquizstudentanswer.Yes") : trans("sectionquizstudentanswer.No")  }}
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentanswer.mark") }}</th>
     <td>{{ nl2br($item->mark) }}</td>
    </tr>
  </table>
         @include('admin.sectionquizstudentanswer.buttons.delete' , ['id' => $item->id])
        @include('admin.sectionquizstudentanswer.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
