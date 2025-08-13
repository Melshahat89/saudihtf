@extends(layoutExtend('website'))

@section('title')
    {{ trans('currencies.currencies') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('currencies') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('currencies/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("currency_code") ? "has-error" : "" }}" > 
			<label for="currency_code">{{ trans("currencies.currency_code")}}</label>
				<input type="text" name="currency_code" class="form-control" id="currency_code" value="{{ isset($item->currency_code) ? $item->currency_code : old("currency_code") }}"  placeholder="{{ trans("currencies.currency_code")}}">
		</div>
			@if ($errors->has("currency_code"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("currency_code") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("country_id") ? "has-error" : "" }}" > 
			<label for="country_id">{{ trans("currencies.country_id")}}</label>
				<input type="text" name="country_id" class="form-control" id="country_id" value="{{ isset($item->country_id) ? $item->country_id : old("country_id") }}"  placeholder="{{ trans("currencies.country_id")}}">
		</div>
			@if ($errors->has("country_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("country_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("discount_perc") ? "has-error" : "" }}" > 
			<label for="discount_perc">{{ trans("currencies.discount_perc")}}</label>
				<input type="text" name="discount_perc" class="form-control" id="discount_perc" value="{{ isset($item->discount_perc) ? $item->discount_perc : old("discount_perc") }}"  placeholder="{{ trans("currencies.discount_perc")}}">
		</div>
			@if ($errors->has("discount_perc"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("discount_perc") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("exchangeratetoegp") ? "has-error" : "" }}" > 
			<label for="exchangeratetoegp">{{ trans("currencies.exchangeratetoegp")}}</label>
				<input type="text" name="exchangeratetoegp" class="form-control" id="exchangeratetoegp" value="{{ isset($item->exchangeratetoegp) ? $item->exchangeratetoegp : old("exchangeratetoegp") }}"  placeholder="{{ trans("currencies.exchangeratetoegp")}}">
		</div>
			@if ($errors->has("exchangeratetoegp"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("exchangeratetoegp") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("exchangeratetousd") ? "has-error" : "" }}" > 
			<label for="exchangeratetousd">{{ trans("currencies.exchangeratetousd")}}</label>
				<input type="text" name="exchangeratetousd" class="form-control" id="exchangeratetousd" value="{{ isset($item->exchangeratetousd) ? $item->exchangeratetousd : old("exchangeratetousd") }}"  placeholder="{{ trans("currencies.exchangeratetousd")}}">
		</div>
			@if ($errors->has("exchangeratetousd"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("exchangeratetousd") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("b2c_monthly_discount_perc") ? "has-error" : "" }}" > 
			<label for="b2c_monthly_discount_perc">{{ trans("currencies.b2c_monthly_discount_perc")}}</label>
				<input type="text" name="b2c_monthly_discount_perc" class="form-control" id="b2c_monthly_discount_perc" value="{{ isset($item->b2c_monthly_discount_perc) ? $item->b2c_monthly_discount_perc : old("b2c_monthly_discount_perc") }}"  placeholder="{{ trans("currencies.b2c_monthly_discount_perc")}}">
		</div>
			@if ($errors->has("b2c_monthly_discount_perc"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("b2c_monthly_discount_perc") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("b2c_yearly_discount_perc") ? "has-error" : "" }}" > 
			<label for="b2c_yearly_discount_perc">{{ trans("currencies.b2c_yearly_discount_perc")}}</label>
				<input type="text" name="b2c_yearly_discount_perc" class="form-control" id="b2c_yearly_discount_perc" value="{{ isset($item->b2c_yearly_discount_perc) ? $item->b2c_yearly_discount_perc : old("b2c_yearly_discount_perc") }}"  placeholder="{{ trans("currencies.b2c_yearly_discount_perc")}}">
		</div>
			@if ($errors->has("b2c_yearly_discount_perc"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("b2c_yearly_discount_perc") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.currencies') }}
                </button>
            </div>
        </form>
</div>
@endsection
