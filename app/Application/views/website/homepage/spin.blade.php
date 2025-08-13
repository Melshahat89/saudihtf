<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('spin') }}</h2>
<hr>
@php $sidebarSpin = \App\Application\Model\Spin::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSpin) > 0)
			@foreach ($sidebarSpin as $d)
				 <div>
					<h2 > {{ str_limit($d->type , 50) }}</h2 > 
					<p> {{ str_limit($d->code , 300) }}</p > 
					 <p><a href="{{ url("spin/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			