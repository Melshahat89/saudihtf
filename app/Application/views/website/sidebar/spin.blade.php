<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('spin') }}</h2>
<hr>
@php $sidebarSpin = \App\Application\Model\Spin::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSpin) > 0)
			@foreach ($sidebarSpin as $d)
				 <div>
					<p><a href="{{ url("spin/".$d->id."/view") }}">{{ str_limit($d->type , 20) }}</a></p > 
					<p><a href="{{ url("spin/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			