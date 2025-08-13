<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('futurex') }}</h2>
<hr>
@php $sidebarFuturex = \App\Application\Model\Futurex::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarFuturex) > 0)
			@foreach ($sidebarFuturex as $d)
				 <div>
					<p><a href="{{ url("futurex/".$d->id."/view") }}">{{ str_limit($d->uid , 20) }}</a></p > 
					<p><a href="{{ url("futurex/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			