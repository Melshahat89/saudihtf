@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => $headTitle])
<section class="sec sec_pad_top sec_pad_bottom bg_lightgray">
    <div class="wrapper">
        <div class="with_aside_flex aside_sm">
            <div tag id="categoryList" class="list-view">
                <div class="course_card_list">
                    <div class="row">
                        <!-- START FILTERING COMPONENT -->
                        @livewire('consultations-filter', ['talks' => false, 'events' => false, 'type' => false, 'key' => false])
                        <!-- END FILTERING DIV -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>