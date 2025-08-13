<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('sectionquizquestions') }}</h2>
<hr>
@php $sidebarSectionquizquestions = \App\Application\Model\Sectionquizquestions::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizquestions) > 0)
			@foreach ($sidebarSectionquizquestions as $d)
				 <div>
					<p><a href="{{ url("sectionquizquestions/".$d->id."/view") }}">{{ str_limit($d->question , 20) }}</a></p > 
					<p><a href="{{ url("sectionquizquestions/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			