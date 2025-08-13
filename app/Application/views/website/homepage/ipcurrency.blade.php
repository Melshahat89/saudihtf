<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('ipcurrency') }}</h2>
<hr>
@php $sidebarIpcurrency = \App\Application\Model\Ipcurrency::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarIpcurrency) > 0)
			@foreach ($sidebarIpcurrency as $d)
				 <div>
					<h2 > {{ str_limit($d->ip , 50) }}</h2 > 
					<p> {{ str_limit($d->type , 300) }}</p > 
					<p> {{ str_limit($d->continent , 300) }}</p > 
					 <p><a href="{{ url("ipcurrency/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			