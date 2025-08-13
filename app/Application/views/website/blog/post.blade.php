@php
    use App\Application\Model\Courses;
    use App\Application\Model\User;

@endphp

@extends(layoutExtend('website'))
@section('title')
    {{$item->title_lang}} - {{ trans('home.IGTS') }}
@endsection
@section('description')
    {{ ($item->seo_desc) ? $item->seo_desc_lang : $item->description_lang }}
@endsection
@section('keywords')
    {{ ($item->seo_keys) ? extractSeoKeys($item->seo_keys) : defaultSeoKeys($item->title_lang) }}
@endsection
@push('js')
    <script src="{{asset('website')}}/js/courses.js?v=2"></script>
    <script src="{{asset('website')}}/js/social.js?v=2"></script>

@endpush
@section('canonical')<link rel="canonical" href="{{$item->canonical ? $item->canonical : url()->current() }}">@endsection
@section('content')


    <div class="bread-crumb">
        <div class="wrapper">
            <a href="/blog/category/<?= $item->categories->first()->category->slug ?>"><?=  $item->categories->first()->category->title_lang ?> </a> > <span><?= $item->title_lang ?></span>
        </div>
    </div>

    <main class="main_content">
        <div class="course_detail" id="course_detail">
            <div class="course_detail_nav_tabs bg_lightgray">
                <section class="sec sec_pad_top_sm sec_pad_bottom_sm">
                    <div class="wrapper">
                        <div class="course_detail_content">
                            <!--DESKTOP course_column_info -->
                            <div class="course_column_info is_stuck col-md-4 hide-mobile" data-sticky="nav" data-plugin-option='{"offset_top":130}' style="position: unset;">

                                @if(isset($homesettings->blog_banner))
                                    <div class="mb-2">
                                        <a target="_blank" href="{{isset($homesettings->blog_banner_link) ? $homesettings->blog_banner_link : 'javascript: void(0)'}}">
                                            <img src="{{large1($homesettings->blog_banner)}}" style="height: 200px; width: 100%; object-fit: cover;" href="#">
                                        </a>
                                    </div>
                                @endif
                                <div class="b_all">
                                    <div class="share_course text_center bt pbsm">
                                        <div class="socials" style="height: 50px;">
                                            <span><small>{{trans('courses.share on')}}</small></span>
                                            <!-- ShareThis BEGIN -->
                                            <div class="sharethis-inline-share-buttons" style="z-index: 0;"></div>
                                            <!-- ShareThis END -->
                                        </div>
                                    </div>
                                </div>

                                <div class="course_column_info_inner mtxs b_all">
                                    <div class="about_auther">
                                        <figure class="mbsm">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('website') }}/images/igts-instructor-logo.jpeg" style="width: 100px;">
                                            </a>
                                        </figure>
                                        <div class="auther_name mbmd">
                                            <h5 class="mbxs"><a href="javascript: void(0)">IGTS</a></h5>
                                        </div>
                                        <div>{{trans('website.About IGTS')}}</div>
                                    </div>
                                </div>

                                @if($item->seo_keys)
                                    <div class="course_column_info_inner mtxs b_all">
                                        <div class="about_auther">
                                            <h3 class="text_primary mblg text_capitalize">{{trans('courses.tags')}}</h3>

                                            <div>
                                                @foreach(json_decode($item->seo_keys) as $tag)
                                                    <a href="/blog/tag/{{$tag}}"><span class="badge badge-primary m-1" style="font-size: 1em;">{{$tag}}</span></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- end course_column_info -->

                            <!-- course_detail_content -->
                            <div class="col-md-8">
                                <img class="blog_post_image" alt="{{$item->alt_image}}" src="{{large1($item->image)}}">

                                <section class="sec sec_pad_top_sm sec_pad_bottom_sm" id="nav_course_gools">
                                    <div class="title mbmd">
                                        <h1 class="text_primary text_capitalize">{{$item->title_lang}}</h1>
                                    </div>
                                    @if($item->description_lang)
                                        <div class="text mbmd pr-3 pl-3">{!! $item->description_lang !!}</div>
                                    @endif
                                    @if(json_decode($item->images))
                                        <div class="title mbmd">
                                            <h2 class="text_primary text_capitalize">{{trans('courses.images')}}</h2>
                                        </div>
                                        <div class="text mbmd pr-3 pl-3 row">

                                            @php $files = returnFilesImages($item , "images"); @endphp
                                            @foreach($files["image"] as $jsonimage )
                                                <div class="col-md-6 text-center">
                                                    <a href="{{ large($jsonimage) }}"> <img src="{{ large($jsonimage) }}" class="blog_post_image" />
                                                    </a>

                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if((isset($item->videosurl) && json_decode($item->videosurl) ) || old("videosurl"))
                                        @php $items = isset($item->videosurl) && json_decode($item->videosurl) ? json_decode($item->videosurl)  : old("videosurl") @endphp
                                        <div class="title mbmd">
                                            <h1 class="text_primary text_capitalize">{{trans('courses.videos')}}</h1>
                                        </div>
                                        <div class="">
                                            @foreach($items as $jsonvideosurl)
                                                <div class="col-md-12 text-center">
                                                    <div class="video-containery">
                                                        <iframe
                                                                src="https://www.youtube.com/embed/{{getYouTubeId($jsonvideosurl)}}"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope;"
                                                                allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                </section>

                                <section class="sec">
                                    <div class="mtlg">
                                        @if($item->created_at)
                                            {{trans('courses.created at')}} {{ $item->created_at }}
                                        @endif
                                        <br>
                                        @if($item->updated_at)
                                            {{trans('courses.updated at')}} {{ $item->updated_at }}
                                        @endif
                                    </div>
                                </section>

                                @if(isMobile())
                                    <!--Mobile course_column_info -->
                                    <div class="course_column_info">
                                        @if(isset($homesettings->blog_banner))
                                            <div class="mb-2">
                                                <img src="{{large1($homesettings->blog_banner)}}" style="height: 200px; width: 100%; object-fit: cover;">
                                            </div>
                                        @endif
                                        <div class="b_all">
                                            <div class="share_course text_center bt pbsm">
                                                <div class="socials" style="height: 50px;">
                                                    <span><small>{{trans('courses.share on')}}</small></span>
                                                    <!-- ShareThis BEGIN -->
                                                    <div class="sharethis-inline-share-buttons" style="z-index: 0;"></div>
                                                    <!-- ShareThis END -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="course_column_info_inner mtxs b_all">
                                            <div class="about_auther">
                                                <figure class="mbsm">
                                                    <a href="javascript: void(0)">
                                                        <img src="{{ asset('website') }}/images/igts-instructor-logo.jpeg" style="width: 100px;">
                                                    </a>
                                                </figure>
                                                <div class="auther_name mbmd">
                                                    <h5 class="mbxs"><a href="javascript: void(0)">IGTS</a></h5>
                                                </div>
                                                <div>{{trans('website.Footer IGTS')}}</div>
                                            </div>
                                        </div>

                                        @if($item->seo_keys)
                                            <div class="course_column_info_inner mtxs b_all">
                                                <div class="about_auther">
                                                    <h3 class="text_primary mblg text_capitalize">{{trans('courses.tags')}}</h3>

                                                    <div>
                                                        @foreach(json_decode($item->seo_keys) as $tag)
                                                            <span class="badge badge-primary m-1" style="font-size: 1em;">{{$tag}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- end course_column_info -->
                                @endif
                            </div>
                            <!-- end course_detail_content -->
                        </div>
                    </div>
                </section>

                {{--@if(count($course->courserelated) > 0)
                    <section class="sec sec_pad_top sec_pad_bottom">
                        <div class="wrapper">
                            <section class="title mbmd">
                                <h2 class="text_primary text_capitalize">{{trans('courses.Recommended courses')}}</h2>
                            </section>
                            <div id="relatedCourses">
                                <div class="courses_cards owl-carousel owl-theme relatedCourses">
                                    @foreach($course->courserelated as $data)
                                        @include('website.courses.assets.mostViewedItem', ['data' => $data->relatedCourse])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif--}}
            </div>
        </div>
    </main>

    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=612247d00596560012d381ab&product=inline-share-buttons' async='async'></script>

@endsection
