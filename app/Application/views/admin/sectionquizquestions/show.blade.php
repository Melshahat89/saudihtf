@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquizquestions.sectionquizquestions') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquizquestions.sectionquizquestions') , 'model' => 'sectionquizquestions' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquizquestions.question") }}</th>
     <td>{{ nl2br($item->question) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizquestions.mark") }}</th>
     <td>{{ nl2br($item->mark) }}</td>
    </tr>
  </table>
         @include('admin.sectionquizquestions.buttons.delete' , ['id' => $item->id])
        @include('admin.sectionquizquestions.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
