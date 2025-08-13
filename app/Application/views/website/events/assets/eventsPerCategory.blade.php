@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => $headTitle])

<section class="sec sec_pad_top sec_pad_bottom bg_lightgray">
    <div class="wrapper">
        <div tag id="categoryList" class="list-view">
            <div class="course_card_list">
                <div class="row">
                    <!-- START FILTERING DIV -->
                     @livewire('filter', ['talks' => false, 'events' => true, 'type' => $type, 'key' => $key])
                    <!-- END FILTERING DIV -->
                </div>
            </div>
        </div>
    </div>
</section>