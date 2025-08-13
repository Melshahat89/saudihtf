@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizstudentstatus.sectionquizstudentstatus') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('sectionquizstudentstatus') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.passed") }}</th>
     <td>
    {{ $item->passed == 1 ? trans("sectionquizstudentstatus.Yes") : trans("sectionquizstudentstatus.No")  }}
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.status") }}</th>
     <td>{{ nl2br($item->status) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.start_time") }}</th>
     <td>{{ nl2br($item->start_time) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("sectionquizstudentstatus.end_time") }}</th>
     <td>{{ nl2br($item->end_time) }}</td>
    </tr>
  </table>
         @include('website.sectionquizstudentstatus.buttons.delete' , ['id' => $item->id])
        @include('website.sectionquizstudentstatus.buttons.edit' , ['id' => $item->id])
</div>
@endsection
