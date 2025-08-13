@extends(layoutExtend())
  @section('title')
    {{ trans('consultationsrequests.consultationsrequests') }} {{ trans('home.view') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('consultationsrequests.consultationsrequests') , 'model' => 'consultationsrequests' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    
  </table>
          @include('admin.consultationsrequests.buttons.delete' , ['id' => $item->id])
        @include('admin.consultationsrequests.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
