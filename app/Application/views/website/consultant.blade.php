@extends(layoutExtend('website'))
@section('title')
    {{  trans('home.HomeTitle') }} - {{ trans('website.My Cart') }}
@endsection
@section('description')
    {{ trans('website.Footer IGTS') }}
@endsection
@section('keywords')
    
@endsection
@section('content')

<main class="main_content">


@if(isset($consultant))

    <section class="sec sec_pad_top  bg_gradient text_white instructor_brief_section">
        <div class="wrapper">
            <div class="profile_info">
                <header class="profile_info_header">
                    <figure class="profile_info_avatar">
                        <a href="/instructors/view/<?php echo $consultant->slug; ?>" class="m-4">
                            <img src="{{large1($consultant->image)}}" class="rounded-circle" alt="{{$consultant->name_lang}}" style="width: 100px; height: 100px; object-fit: cover;">
                        </a>
                        <figcaption>
                            <h5 class="mb_0"><?php echo $consultant->Fullname_lang; ?></h5>
                            <small><?php echo $consultant->title_lang; ?></small>
                        </figcaption>
                    </figure>
                    <div class="profile_info_statics">
                        <div>
                            <div class="profile_info_statics_name_icon"><i class="fas fa-graduation-cap"></i></div>
                            <div class="profile_info_statics_number"><?php echo count($consultant->ConsultantConsultations) ?></div>
                            <div class="profile_info_statics_name">{{trans('consultations.consultations')}}</div>
                        </div>
                        <div>
                            <div class="profile_info_statics_name_icon"><i class="far fa-eye"></i></div>
                            <div class="profile_info_statics_number">{{$consultant->ConsultantConsultationsViews}}</div>
                            <div class="profile_info_statics_name">{{trans('courses.Views')}}</div>
                        </div>
                    </div>
                </header>

            </div>
        </div>
    </section>

    <section class="about-instructor talk-course-content">
        <div class="container instructor-desc">
            {!! $consultant->description_lang !!}
        </div>
    </section>



    @if(count($latestTenConsultations) > 0)
        <section class="sec sec_pad_top sec_pad_bottom">
            <div class="wrapper">

                <section class="title mbmd">
                    <h2 class="text_primary text_capitalize">{{ trans('consultations.Discover My Consultation') }}</h2>
                </section>
        
                <div id="instructorCoursesList">
                    <div class="courses_cards owl-carousel owl-theme instructorCoursesList">
                        @foreach($latestTenConsultations as $item)
                            @include(sectionLastTenConsultations('website'), ['data' => $item])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>                  
    @endif 

@endif


</main>

@endsection