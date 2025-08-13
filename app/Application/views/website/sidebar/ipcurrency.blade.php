<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('ipcurrency') }}</h2>
<hr>
@php $sidebarIpcurrency = \App\Application\Model\Ipcurrency::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarIpcurrency) > 0)
			@foreach ($sidebarIpcurrency as $d)
				 <div>
					<p><a href="{{ url("ipcurrency/".$d->id."/view") }}">{{ str_limit($d->ip , 20) }}</a></p > 
					<p><a href="{{ url("ipcurrency/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			