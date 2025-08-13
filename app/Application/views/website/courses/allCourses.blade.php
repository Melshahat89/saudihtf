@extends(layoutExtend('website'))
@section('title')
{{ isset($homesettings->seo_title_lang) ? $homesettings->seo_title_lang : trans('home.HomeTitle') }}
@endsection
@section('description')
{{ isset($homesettings->seo_desc_lang) ? $homesettings->seo_desc_lang : trans('website.Footer IGTS') }}
@endsection
@section('keywords')
{{ isset($homesettings->seo_keys) ? extractSeoKeys($homesettings->seo_keys) : '' }}
@endsection

@push('js')
    {{--
    <script src="{{ asset('old') }}/js/front/social.js"></script>--}}
    <script>
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

@endpush
@section('content')
<div class="bread-crumb">
    <div class="wrapper">
        <a href="/">{{trans('home.home')}}</a> > <span><?=  ($category) ? $category->name_lang : '' ?> </span>
    </div>
</div>


@include('website.categories.assets.tabs-container', ['active' => 'all', 'tabsWidth' => $tabsWidth, 'key' => $key])


@isset($category->childs)
    @if(!$category->childs->isEmpty())

        <section class="sec">
            <div class="wrapper">

                <section class="title mblg">
                    <h2 class="text_primary text_capitalize">{{trans('home.Sub Category')}}</h2>
                </section>

                <div id="specialities">
                    <div class="owl-carousel owl-theme specialities">

                        @foreach ($category->childs as $cat)
                            @include(sectionSpecialities('website'), ['data' => $cat])
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif
@endisset


<main class="main_content">
    <?php if ($mostViewedPerCategory && !($key)) { ?>
    <section class="sec sec_pad_top sec_pad_bottom d-none">
        <div class="wrapper">

            <section class="title mblg">
                <h2 class="text_primary text_capitalize">{{trans('categories.most viewed')}}</h2>
            </section>

            <div id="mostViewed">
                <div class="courses_cards owl-carousel owl-theme mostViewed">
                    <?php    foreach ($mostViewedPerCategory as $data) { ?>
                    @include('website.courses.assets.mostViewedItem', ['data' => $data])
                    <?php    } ?>

                </div>
            </div>
        </div>
    </section>
    <?php } ?>





    @include('website.courses.assets.coursesPerCategory', ['headTitle' => trans('website.All'), 'key' => $key, 'slug' => $slug])


</main>
<script>
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

@endsection