<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('sectionquizstudentstatus') }}</h2>
<hr>
@php $sidebarSectionquizstudentstatus = \App\Application\Model\Sectionquizstudentstatus::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSectionquizstudentstatus) > 0)
			@foreach ($sidebarSectionquizstudentstatus as $d)
				 <div>
					{{ $d->passed == 1 ? trans("sectionquizstudentstatus.Yes") : trans("sectionquizstudentstatus.No")  }}
					<p> {{ str_limit($d->status , 300) }}</p > 
					<p> {{ str_limit($d->start_time , 300) }}</p > 
					 <p><a href="{{ url("sectionquizstudentstatus/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			