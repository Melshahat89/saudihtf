<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('currencies') }}</h2>
<hr>
@php $sidebarCurrencies = \App\Application\Model\Currencies::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarCurrencies) > 0)
			@foreach ($sidebarCurrencies as $d)
				 <div>
					<p><a href="{{ url("currencies/".$d->id."/view") }}">{{ str_limit($d->currency_code , 20) }}</a></p > 
					<p><a href="{{ url("currencies/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			