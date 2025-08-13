@extends(layoutExtend('website'))
 @section('title')
    {{ trans('sectionquiz.sectionquiz') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('sectionquiz') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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
         @include('website.sectionquiz.buttons.delete' , ['id' => $item->id])
        @include('website.sectionquiz.buttons.edit' , ['id' => $item->id])
</div>
@endsection
