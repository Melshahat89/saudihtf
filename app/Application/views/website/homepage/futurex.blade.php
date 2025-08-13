<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('futurex') }}</h2>
<hr>
@php $sidebarFuturex = \App\Application\Model\Futurex::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarFuturex) > 0)
			@foreach ($sidebarFuturex as $d)
				 <div>
					<h2 > {{ str_limit($d->uid , 50) }}</h2 > 
					<p> {{ str_limit($d->cn , 300) }}</p > 
					<p> {{ str_limit($d->displayName , 300) }}</p > 
					 <p><a href="{{ url("futurex/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			