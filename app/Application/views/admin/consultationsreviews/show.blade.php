@extends(layoutExtend())
  @section('title')
    {{ trans('consultationsreviews.consultationsreviews') }} {{ trans('home.view') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('consultationsreviews.consultationsreviews') , 'model' => 'consultationsreviews' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    
  </table>
          @include('admin.consultationsreviews.buttons.delete' , ['id' => $item->id])
        @include('admin.consultationsreviews.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
