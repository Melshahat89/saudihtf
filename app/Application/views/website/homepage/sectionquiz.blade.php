<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('sectionquiz') }}</h2>
<hr>
@php $sidebarSectionquiz = \App\Application\Model\Sectionquiz::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSectionquiz) > 0)
			@foreach ($sidebarSectionquiz as $d)
				 <div>
					<h2 > {{ str_limit($d->title , 50) }}</h2 > 
					<p> {{ str_limit($d->description , 300) }}</p > 
					 <p><a href="{{ url("sectionquiz/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			