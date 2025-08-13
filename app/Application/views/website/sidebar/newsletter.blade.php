<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('newsletter') }}</h2>
<hr>
@php $sidebarNewsletter = \App\Application\Model\Newsletter::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarNewsletter) > 0)
			@foreach ($sidebarNewsletter as $d)
				 <div>
					<p><a href="{{ url("newsletter/".$d->id."/view") }}">{{ str_limit($d->email , 20) }}</a></p > 
					<p><a href="{{ url("newsletter/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			