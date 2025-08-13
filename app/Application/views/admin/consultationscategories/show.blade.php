@extends(layoutExtend())
  @section('title')
    {{ trans('consultationscategories.consultationscategories') }} {{ trans('home.view') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('consultationscategories.consultationscategories') , 'model' => 'consultationscategories' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("consultationscategories.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("consultationscategories.slug") }}</th>
     <td>{{ nl2br($item->slug) }}</td>
    </tr>
  </table>
          @include('admin.consultationscategories.buttons.delete' , ['id' => $item->id])
        @include('admin.consultationscategories.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
