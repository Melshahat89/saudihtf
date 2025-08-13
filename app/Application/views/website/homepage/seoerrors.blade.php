<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('seoerrors') }}</h2>
<hr>
@php $sidebarSeoerrors = \App\Application\Model\Seoerrors::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSeoerrors) > 0)
			@foreach ($sidebarSeoerrors as $d)
				 <div>
					<h2 > {{ str_limit($d->link , 50) }}</h2 > 
					<p> {{ str_limit($d->code , 300) }}</p > 
					<p> {{ str_limit($d->comment , 300) }}</p > 
					 <p><a href="{{ url("seoerrors/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			