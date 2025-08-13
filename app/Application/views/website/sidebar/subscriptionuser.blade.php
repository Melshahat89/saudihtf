<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('subscriptionuser') }}</h2>
<hr>
@php $sidebarSubscriptionuser = \App\Application\Model\Subscriptionuser::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSubscriptionuser) > 0)
			@foreach ($sidebarSubscriptionuser as $d)
				 <div>
					<p><a href="{{ url("subscriptionuser/".$d->id."/view") }}">{{ str_limit($d->subscription_id , 20) }}</a></p > 
					<p><a href="{{ url("subscriptionuser/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			