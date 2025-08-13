@extends(layoutExtend())
  @section('title')
    {{ trans('consultations.consultations') }} {{ trans('home.view') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('consultations.consultations') , 'model' => 'consultations' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("consultations.title") }}</th>
     <td>{{ nl2br($item->title_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("consultations.slug") }}</th>
     <td>{{ nl2br($item->slug) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("consultations.description") }}</th>
     <td>{{ nl2br($item->description_lang) }}</td>
    </tr>
    <tr>
    <tr>
    <th width="200">{{ trans("consultations.published") }}</th>
     <td>
    {{ $item->published == 1 ? trans("consultations.Yes") : trans("consultations.No")  }}
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("consultations.visits") }}</th>
     <td>{{ nl2br($item->visits) }}</td>
    </tr>
  </table>
          @include('admin.consultations.buttons.delete' , ['id' => $item->id])
        @include('admin.consultations.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
