@extends(layoutExtend('website'))

@section('title')
    {{ trans('seoerrors.seoerrors') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('seoerrors') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('seoerrors/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("link") ? "has-error" : "" }}" > 
			<label for="link">{{ trans("seoerrors.link")}}</label>
				<input type="text" name="link" class="form-control" id="link" value="{{ isset($item->link) ? $item->link : old("link") }}"  placeholder="{{ trans("seoerrors.link")}}">
		</div>
			@if ($errors->has("link"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("link") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("code") ? "has-error" : "" }}" > 
			<label for="code">{{ trans("seoerrors.code")}}</label>
				<input type="text" name="code" class="form-control" id="code" value="{{ isset($item->code) ? $item->code : old("code") }}"  placeholder="{{ trans("seoerrors.code")}}">
		</div>
			@if ($errors->has("code"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("code") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("comment") ? "has-error" : "" }}" > 
			<label for="comment">{{ trans("seoerrors.comment")}}</label>
				<input type="text" name="comment" class="form-control" id="comment" value="{{ isset($item->comment) ? $item->comment : old("comment") }}"  placeholder="{{ trans("seoerrors.comment")}}">
		</div>
			@if ($errors->has("comment"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("comment") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.seoerrors') }}
                </button>
            </div>
        </form>
</div>
@endsection
