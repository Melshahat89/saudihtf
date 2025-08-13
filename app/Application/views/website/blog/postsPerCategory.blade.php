<section class="sec sec_pad_top sec_pad_bottom">
    <div class="wrapper">
        <section class="title mbmd">
            <h2 class="text_primary text_capitalize">{{trans('categories.most viewed')}}</h2>
        </section>
        <div id="relatedCourses">
            <div class="courses_cards owl-carousel owl-theme relatedCourses">
                @foreach($mostViewed as $data)
                @include('website.blog.mostViewedItem', ['data' => $data])
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="sec sec_pad_top sec_pad_bottom bg_lightgray">
    <div class="wrapper">
{{--        <div class="with_aside_flex aside_sm">--}}
        <div class="with_aside_flex2 aside_sm">
            <div tag id="categoryList" class="list-view">
                <div class="course_card_list">
                    <div class="row">
                        <!-- START FILTERING COMPONENT -->
                        @livewire('filter-blog')
                        <!-- END FILTERING DIV -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>