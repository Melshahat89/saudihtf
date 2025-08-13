@extends(layoutExtend('website'))
@section('title')
    {{ trans('professionalcertificates.professionalcertificates') }}
@endsection
@section('description')
    {{ trans('home.HomeDescription') }}
@endsection
@section('keywords')
    {{ trans('home.HomeKeywords') }}
@endsection

@push('css')

    <style>
        div#hubspot-messages-iframe-container {
            display: none !important;
        }

        .float {
            display: none !important;
        }

        .float-whatsapp {
            position: fixed;
            left: 0;
            margin-left: 24px;
            width: 60px;
            height: 60px;
            bottom: 0;
            margin-bottom: 16px;
            background-color: #18B289;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            z-index: 2;
        }
    </style>
@endpush

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide hero-slider" data-ride="carousel">
        <div class="carousel-inner" style="height: 100%;">
            <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
                <div class="carousel-item active" style="height: 100%;background: url({{asset('website/images/').'/certificateslider.webp'}}) no-repeat center center;background-size: cover;">
                    <div class="d-flex align-items-center text-center h-100" style="place-content: center;">
                        <div>
                            <h2 class="mbmd" style="color: #FFF;font-weight: bold;">{{trans('professionalcertificates.professionalcertificates')}}</h2>
                            <h3 class="mbmd" style="color: #FFF; font-size: 18px;">{{trans('professionalcertificates.professionalcertificates')}}</h3>
                                <a href="{{url('professional-certificates')}}" class="button home-slider-button button_small text_capitalize mt-4 slider-cta" type="button" role="button">
                                    {{trans('account.Enroll Now')}}
                                </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <main class="main_content">

        <section class="sec">
            <div class="wrapper">
                <section class="title mblg">
                    <h2 class="text_primary text_capitalize d-none">{{trans('home.specialities')}}</h2>
                    <!-- <div class="actions">
                        <a href="/courses/category/masters" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>
                    </div> -->
                </section>

                <div id="specialities">
                    <div class="owl-carousel owl-theme specialities">

                        @foreach ($categories as $category)
                            @include(sectionSpecialities('website'), ['data' => $category])
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        @if($featuredCourses && count($featuredCourses) > 0)
            <section class="sec sec_pad_top sec_pad_bottom bg_lightgray ">
                <div class="wrapper">
                    <section class="title mblg">
                        <h2 class="text_primary text_capitalize">{{trans('home.courses')}}</h2>
                        <div class="actions">
                            <a href="{{url('professional-certificates/category')}}" class="button button_primary button_small text_capitalize" type="button" role="button">{{trans('home.view all')}}</a>
                        </div>
                    </section>

                    <div id="courses">
                        <div class="row" >

                            @foreach ($featuredCourses as $featuredCourse)
                                <div class="col-md-3">
                                    @include(sectionMasterCourses('website'), ['data' => $featuredCourse])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>

    <a href="https://certificate.igtsservice.com/?prevUrl={{ urlencode(url()->full()) }}" target="_blank" class="float-whatsapp">
        <i class="fab fa-whatsapp my-float" aria-hidden="true"></i>
    </a>

@endsection