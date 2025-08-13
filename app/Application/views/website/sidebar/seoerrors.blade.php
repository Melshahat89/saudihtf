<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('seoerrors') }}</h2>
<hr>
@php $sidebarSeoerrors = \App\Application\Model\Seoerrors::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSeoerrors) > 0)
			@foreach ($sidebarSeoerrors as $d)
				 <div>
					<p><a href="{{ url("seoerrors/".$d->id."/view") }}">{{ str_limit($d->link , 20) }}</a></p > 
					<p><a href="{{ url("seoerrors/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			