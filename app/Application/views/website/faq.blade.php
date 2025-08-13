@extends(layoutExtend('website'))
 
@section('title')
    {{ trans('faq.faq') }}
@endsection
 
@section('content')


@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('faq.faq')]) 


<div class="container p-4">
 
   
<section class="about-content">


        <div class="accordion course-accordion" id="accordionExample">
            @foreach($faq as $item)
            <div class="card">
                <div class="card-header" id="headingOne_{{$item->id}}">
                    <h2 class="mb-0">
                        <a type="button" class="btn btn-link" style="text-align: right;" data-toggle="collapse" data-target="#collapse_{{$item->id}}">
                            <i class="fa fa-plus mr-10 ml-10"></i>
                            <span>{{$item->question_lang}}</span>
                        </a>
                    </h2>
                </div>
                <div id="collapse_{{$item->id}}" class="collapse" aria-labelledby="headingOne_{{$item->id}}" data-parent="#accordionExample">

                        <div class="course-line watched">
                            <div class="flexLeft">
                                {!!$item->answer_lang!!}
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>

    
</section>
 
</div>
 
 
 
 
 
@endsection
 