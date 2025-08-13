@extends(layoutExtend('website'))

@section('title')
    {{ trans('seoerrors.seoerrors') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('seoerrors') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("seoerrors.link") }}</th>
					<td>{{ nl2br($item->link) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("seoerrors.code") }}</th>
					<td>{{ nl2br($item->code) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("seoerrors.comment") }}</th>
					<td>{{ nl2br($item->comment) }}</td>
				</tr>
		</table>

        @include('website.seoerrors.buttons.delete' , ['id' => $item->id])
        @include('website.seoerrors.buttons.edit' , ['id' => $item->id])
</div>
@endsection
