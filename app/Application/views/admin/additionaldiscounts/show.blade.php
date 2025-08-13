@extends(layoutExtend())
  @section('title')
    {{ trans('additionaldiscounts.additionaldiscounts') }} {{ trans('home.view') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('additionaldiscounts.additionaldiscounts') , 'model' => 'additionaldiscounts' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    
  </table>
          @include('admin.additionaldiscounts.buttons.delete' , ['id' => $item->id])
        @include('admin.additionaldiscounts.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
