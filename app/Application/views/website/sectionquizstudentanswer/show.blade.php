@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizstudentanswer.sectionquizstudentanswer') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('sectionquizstudentanswer') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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
         @include('website.sectionquizstudentanswer.buttons.delete' , ['id' => $item->id])
        @include('website.sectionquizstudentanswer.buttons.edit' , ['id' => $item->id])
</div>
@endsection
