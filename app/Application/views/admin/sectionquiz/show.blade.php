@extends(layoutExtend())
 @section('title')
    {{ trans('sectionquiz.sectionquiz') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('sectionquiz.sectionquiz') , 'model' => 'sectionquiz' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquiz.title") }}</th>
     <td>{{ nl2br($item->title) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquiz.description") }}</th>
     <td>{{ nl2br($item->description) }}</td>
    </tr>
  </table>
         @include('admin.sectionquiz.buttons.delete' , ['id' => $item->id])
        @include('admin.sectionquiz.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
