@extends(layoutExtend())

@section('title')
    {{ trans('faq.faq') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')
    {{ Html::style('/public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('faq.faq') , 'model' => 'faq' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/faq/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 	
		 <div class="form-group  {{  $errors->has("question.en")  &&  $errors->has("question.ar")  ? "has-error" : "" }}" >
			<label class="col-md-2 col-form-label" for="question">{{ trans("faq.question")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "question", isset($item->question) ? $item->question : old("question") , "text" , "faq") !!}
		</div>
			@if ($errors->has("question.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("question.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("question.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("question.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("answer.en")  &&  $errors->has("answer.ar")  ? "has-error" : "" }}" >
			<label class="col-md-2 col-form-label" for="answer">{{ trans("faq.answer")}}</label>
			{!! extractFiled(isset($item) ? $item : null , "answer" , isset($item->answer) ? $item->answer : old("answer") , "textarea" , "faq" , 'tinymce' ) !!}

		
		</div>
			@if ($errors->has("answer.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("answer.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("answer.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("answer.ar") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('faq.faq') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
@include(layoutPath('layout.helpers.tynic'))
@endsection
