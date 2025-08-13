
<section class="global-cards mb-4" style="padding-top: 40px; background-color: #f3f3f3">
    <div class="container">
    <div class="section_title_1 flexBetween">
    <h4><span>{{trans('website.Meet Our')}}</span>{{trans('website.meetourpartners')}}</h4>
    </div>
    <div class="owl-carousel partners-owl mb-4">
        @foreach($Data as $item)
            <div class="">
            <div class="card-item">
                <div class="card-img talks">
                    <a href="/partners/view/{{$item->slug}}">
                    <!--            <i class="flaticon-fav" ></i>-->
                    <img class="w-100"  style="width:100%;height:180px; object-fit: cover !important;"
                         title="{{ nl2br($item->first_name) }}"
                         src="{{large($item->image)}}">

                    <h4>{{ ($item->fullname_lang)? nl2br($item->fullname_lang) :nl2br('')  }}</h4>
                    </a>
                </div>
               
            </div>
        </div>
        @endforeach
    </div>
    </div>

    <div class="container text-center">
    <a class="view-more-section mb-4" href="{{url('partners/all')}}">{{trans('website.View More')}}</a>
    </div>

</section>

