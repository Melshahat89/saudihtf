<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('newsletter') }}</h2>
<hr>
@php $sidebarNewsletter = \App\Application\Model\Newsletter::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarNewsletter) > 0)
			@foreach ($sidebarNewsletter as $d)
				 <div>
					<h2 > {{ str_limit($d->email , 50) }}</h2 > 
					{{ $d->active == 1 ? trans("newsletter.Yes") : trans("newsletter.No")  }}
					 <p><a href="{{ url("newsletter/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			