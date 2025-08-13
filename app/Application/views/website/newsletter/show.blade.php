@extends(layoutExtend('website'))

@section('title')
    {{ trans('newsletter.newsletter') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('newsletter') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("newsletter.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("newsletter.active") }}</th>
					<td>
				{{ $item->active == 1 ? trans("newsletter.Yes") : trans("newsletter.No")  }}
					</td>
				</tr>
		</table>

        @include('website.newsletter.buttons.delete' , ['id' => $item->id])
        @include('website.newsletter.buttons.edit' , ['id' => $item->id])
</div>
@endsection
