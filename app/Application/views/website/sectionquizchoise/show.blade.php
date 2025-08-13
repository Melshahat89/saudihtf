@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizchoise.sectionquizchoise') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('sectionquizchoise') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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
         @include('website.sectionquizchoise.buttons.delete' , ['id' => $item->id])
        @include('website.sectionquizchoise.buttons.edit' , ['id' => $item->id])
</div>
@endsection
