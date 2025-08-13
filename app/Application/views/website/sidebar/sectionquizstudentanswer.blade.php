<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('sectionquizstudentanswer') }}</h2>
<hr>
@php $sidebarSectionquizstudentanswer = \App\Application\Model\Sectionquizstudentanswer::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizstudentanswer) > 0)
			@foreach ($sidebarSectionquizstudentanswer as $d)
				 <div>
					{{ $d->is_correct == 1 ? trans("sectionquizstudentanswer.Yes") : trans("sectionquizstudentanswer.No")  }}
					<p><a href="{{ url("sectionquizstudentanswer/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			