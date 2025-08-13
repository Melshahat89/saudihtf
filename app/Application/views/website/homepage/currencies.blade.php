<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('currencies') }}</h2>
<hr>
@php $sidebarCurrencies = \App\Application\Model\Currencies::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarCurrencies) > 0)
			@foreach ($sidebarCurrencies as $d)
				 <div>
					<h2 > {{ str_limit($d->currency_code , 50) }}</h2 > 
					<p> {{ str_limit($d->country_id , 300) }}</p > 
					<p> {{ str_limit($d->discount_perc , 300) }}</p > 
					 <p><a href="{{ url("currencies/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			