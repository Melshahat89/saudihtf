<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('sectionquizchoise') }}</h2>
<hr>
@php $sidebarSectionquizchoise = \App\Application\Model\Sectionquizchoise::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizchoise) > 0)
			@foreach ($sidebarSectionquizchoise as $d)
				 <div>
					<h2 > {{ str_limit($d->choise , 50) }}</h2 > 
					{{ $d->is_correct == 1 ? trans("sectionquizchoise.Yes") : trans("sectionquizchoise.No")  }}
					 <p><a href="{{ url("sectionquizchoise/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			