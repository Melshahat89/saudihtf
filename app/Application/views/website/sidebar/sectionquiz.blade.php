<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('sectionquiz') }}</h2>
<hr>
@php $sidebarSectionquiz = \App\Application\Model\Sectionquiz::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSectionquiz) > 0)
			@foreach ($sidebarSectionquiz as $d)
				 <div>
					<p><a href="{{ url("sectionquiz/".$d->id."/view") }}">{{ str_limit($d->title , 20) }}</a></p > 
					<p><a href="{{ url("sectionquiz/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			