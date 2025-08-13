<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('sectionquizstudentanswer') }}</h2>
<hr>
@php $sidebarSectionquizstudentanswer = \App\Application\Model\Sectionquizstudentanswer::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizstudentanswer) > 0)
			@foreach ($sidebarSectionquizstudentanswer as $d)
				 <div>
					{{ $d->is_correct == 1 ? trans("sectionquizstudentanswer.Yes") : trans("sectionquizstudentanswer.No")  }}
					{{ $d->answered == 1 ? trans("sectionquizstudentanswer.Yes") : trans("sectionquizstudentanswer.No")  }}
					<p> {{ str_limit($d->mark , 300) }}</p > 
					 <p><a href="{{ url("sectionquizstudentanswer/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			