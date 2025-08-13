@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquizquestions.sectionquizquestions') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('sectionquizquestions') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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
         @include('website.sectionquizquestions.buttons.delete' , ['id' => $item->id])
        @include('website.sectionquizquestions.buttons.edit' , ['id' => $item->id])
</div>
@endsection
