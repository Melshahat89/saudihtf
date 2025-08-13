@extends(layoutExtend('website'))
 
@section('title')
    {{ trans('website.Business Invitation') }}
@endsection
 
@section('content')

<div class="bread-crumb"> 
  <div class="container">
      <a href="#">{{ trans('website.home') }}</a> > <span>{{trans('website.Business Invitation')}}</span>
  </div>
</div>

<div class="page-title general-gred">
  <div class="container">
    <h1>{{ trans('website.Business Invitation') }}</h1>

  </div>
</div>

@if(!$limitReached)
<section class="mycart-container" id="steps">
        <div class="container">
            <div class="my-items mt-40">
                <div class="row">
                    <div class="col-md-12">
                        <div class="Summary">
                            <h4><strong class="successfully"> {{ trans('website.Business Invitation') }} </strong></h4>
                            <div class="total">
                                <h5><strong> {{ trans('website.You have been invited by') }} {{$invitation->businessdata->name_lang}} {{ trans('website.to a business subscription') }}</span></strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-40 next-step">
                        <div class="flexLeft">
                            @if(Auth::check())
                                <form method="POST" action="/businessinvitation/{{$invitation->token}}/accept">
                                    {{ csrf_field() }}
                                    <button type="submit" class="view-more-section">
                                        <span> {{ trans('website.Accept Invitation') }} </span>
                                    </button>
                                </form>
                            @else
                                <a href="javascript:void(0)" class="view-more-section" data-dismiss="modal" data-remote="/login" data-toggle="modal" data-target="#loginModal">
                                    <span> {{ trans('website.Accept Invitation') }} </span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
@else
<section class="mycart-container" id="steps">
        <div class="container">
            <div class="my-items mt-40">
                <div class="row">
                    <div class="col-md-12">
                        <div class="Summary">
                            <h4><strong class="successfully"> {{ trans('website.Business Invitation') }} </strong></h4>
                            <div class="total">
                                <h5><strong> {{ trans('website.This invitation has reached its limit and can no longer take registrations') }}</span></strong></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endif

@endsection
