@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => $headTitle])
<section class="sec sec_pad_top sec_pad_bottom">
    <div class="wrapper">
        <div class="with_aside_flex aside_sm">
            <div tag id="categoryList" class="list-view">
                <div class="course_card_list">
                    <!-- START FILTERING COMPONENT -->
                    @livewire('filter', ['talks' => false, 'events' => false, 'type' => $type, 'key' => $key, 'slug' => $slug])
                    <!-- END FILTERING DIV -->
                </div>
            </div>
        </div>
    </div>
</section>