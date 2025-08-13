<div class="d-flex justify-content-center">
    <div class="course_card">
        <a href="/blog/{{$data->categories->first()->category->slug}}/{{$data->slug}}">
            <span class="course_card_img">
                <img src="{{ medium($data->image) }}" loading="lazy" style="height: 200px; object-fit: cover;">
                <div class="play_icon"><i class="fas fa-play"></i></div>
            </span>
            <div class="course_card_detail_name p-2 pm0 ellipse two-lines" title="{{$data->title_lang}}">{{$data->title_lang}}</div>
            <div class="course_card_detail">
                <div class="course_card_rating_price p-2">
                    <div class="course_card_price align-items-center">{!! $data->PriceText !!}</div>
                    <div class="course_card_price d-flex justify-content-between w-100">
                        <div>
                            <i class="fas fa-eye visits">
                                <span>
                                    +{{ ($data->visits >= 1000 && $data->visits < 1000000) ? (number_format($data->visits / 1000, 0) . 'K') : (($data->visits >= 1000000) ? (number_format($data->visits / 1000000, 0) . 'M'  ) : $data->visits) }}
                                </span>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>