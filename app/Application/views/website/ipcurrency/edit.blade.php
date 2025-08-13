@extends(layoutExtend('website'))

@section('title')
    {{ trans('ipcurrency.ipcurrency') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('ipcurrency') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('ipcurrency/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("ip") ? "has-error" : "" }}" > 
			<label for="ip">{{ trans("ipcurrency.ip")}}</label>
				<input type="text" name="ip" class="form-control" id="ip" value="{{ isset($item->ip) ? $item->ip : old("ip") }}"  placeholder="{{ trans("ipcurrency.ip")}}">
		</div>
			@if ($errors->has("ip"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("ip") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("type") ? "has-error" : "" }}" > 
			<label for="type">{{ trans("ipcurrency.type")}}</label>
				<input type="text" name="type" class="form-control" id="type" value="{{ isset($item->type) ? $item->type : old("type") }}"  placeholder="{{ trans("ipcurrency.type")}}">
		</div>
			@if ($errors->has("type"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("type") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("continent") ? "has-error" : "" }}" > 
			<label for="continent">{{ trans("ipcurrency.continent")}}</label>
				<input type="text" name="continent" class="form-control" id="continent" value="{{ isset($item->continent) ? $item->continent : old("continent") }}"  placeholder="{{ trans("ipcurrency.continent")}}">
		</div>
			@if ($errors->has("continent"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("continent") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("continent_code") ? "has-error" : "" }}" > 
			<label for="continent_code">{{ trans("ipcurrency.continent_code")}}</label>
				<input type="text" name="continent_code" class="form-control" id="continent_code" value="{{ isset($item->continent_code) ? $item->continent_code : old("continent_code") }}"  placeholder="{{ trans("ipcurrency.continent_code")}}">
		</div>
			@if ($errors->has("continent_code"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("continent_code") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("country") ? "has-error" : "" }}" > 
			<label for="country">{{ trans("ipcurrency.country")}}</label>
				<input type="text" name="country" class="form-control" id="country" value="{{ isset($item->country) ? $item->country : old("country") }}"  placeholder="{{ trans("ipcurrency.country")}}">
		</div>
			@if ($errors->has("country"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("country") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("country_code") ? "has-error" : "" }}" > 
			<label for="country_code">{{ trans("ipcurrency.country_code")}}</label>
				<input type="text" name="country_code" class="form-control" id="country_code" value="{{ isset($item->country_code) ? $item->country_code : old("country_code") }}"  placeholder="{{ trans("ipcurrency.country_code")}}">
		</div>
			@if ($errors->has("country_code"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("country_code") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("country_flag") ? "has-error" : "" }}" > 
			<label for="country_flag">{{ trans("ipcurrency.country_flag")}}</label>
				<input type="text" name="country_flag" class="form-control" id="country_flag" value="{{ isset($item->country_flag) ? $item->country_flag : old("country_flag") }}"  placeholder="{{ trans("ipcurrency.country_flag")}}">
		</div>
			@if ($errors->has("country_flag"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("country_flag") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("region") ? "has-error" : "" }}" > 
			<label for="region">{{ trans("ipcurrency.region")}}</label>
				<input type="text" name="region" class="form-control" id="region" value="{{ isset($item->region) ? $item->region : old("region") }}"  placeholder="{{ trans("ipcurrency.region")}}">
		</div>
			@if ($errors->has("region"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("region") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("city") ? "has-error" : "" }}" > 
			<label for="city">{{ trans("ipcurrency.city")}}</label>
				<input type="text" name="city" class="form-control" id="city" value="{{ isset($item->city) ? $item->city : old("city") }}"  placeholder="{{ trans("ipcurrency.city")}}">
		</div>
			@if ($errors->has("city"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("city") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("timezone") ? "has-error" : "" }}" > 
			<label for="timezone">{{ trans("ipcurrency.timezone")}}</label>
				<input type="text" name="timezone" class="form-control" id="timezone" value="{{ isset($item->timezone) ? $item->timezone : old("timezone") }}"  placeholder="{{ trans("ipcurrency.timezone")}}">
		</div>
			@if ($errors->has("timezone"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("timezone") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("currency") ? "has-error" : "" }}" > 
			<label for="currency">{{ trans("ipcurrency.currency")}}</label>
				<input type="text" name="currency" class="form-control" id="currency" value="{{ isset($item->currency) ? $item->currency : old("currency") }}"  placeholder="{{ trans("ipcurrency.currency")}}">
		</div>
			@if ($errors->has("currency"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("currency") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("currency_code") ? "has-error" : "" }}" > 
			<label for="currency_code">{{ trans("ipcurrency.currency_code")}}</label>
				<input type="text" name="currency_code" class="form-control" id="currency_code" value="{{ isset($item->currency_code) ? $item->currency_code : old("currency_code") }}"  placeholder="{{ trans("ipcurrency.currency_code")}}">
		</div>
			@if ($errors->has("currency_code"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("currency_code") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("currency_rates") ? "has-error" : "" }}" > 
			<label for="currency_rates">{{ trans("ipcurrency.currency_rates")}}</label>
				<input type="text" name="currency_rates" class="form-control" id="currency_rates" value="{{ isset($item->currency_rates) ? $item->currency_rates : old("currency_rates") }}"  placeholder="{{ trans("ipcurrency.currency_rates")}}">
		</div>
			@if ($errors->has("currency_rates"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("currency_rates") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.ipcurrency') }}
                </button>
            </div>
        </form>
</div>
@endsection
