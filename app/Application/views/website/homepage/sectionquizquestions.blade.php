<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('sectionquizquestions') }}</h2>
<hr>
@php $sidebarSectionquizquestions = \App\Application\Model\Sectionquizquestions::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizquestions) > 0)
			@foreach ($sidebarSectionquizquestions as $d)
				 <div>
					<h2 > {{ str_limit($d->question , 50) }}</h2 > 
					<p> {{ str_limit($d->mark , 300) }}</p > 
					 <p><a href="{{ url("sectionquizquestions/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			