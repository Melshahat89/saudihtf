<a href="/consultants/view/{{$data->slug}}" class="course_card_link">
            <span class="course_card_img">
                <img src="{{large1($data->image)}}">
            </span>
    <div class="course_card_detail">
        <div class="course_card_detail_name text_primary">{{$data->title_lang}} - <span>{{$data->consultant->Fullname_lang}}</span>
        </div>
        <p>{{ strip_tags(charLimit($data->description_lang, 500)) }}</p>
        {{--<div class="course_card_price"> <i class="fas fa-eye"></i> <span>{{$data->visits}}</span> </div>--}}
    </div>
    
    <div class="course_card_price" style="    justify-content: space-between;">
    
        <h3 class="price text_primary">{!!$data->PriceText!!}</h3>

        {{-- @if($data->ConsultantRating) --}}
        <div class="course_card_rating">
            <div class="jq_rating jq-stars" data-options='{"initialRating":{{round( $data->ConsultantRating, 1 )}}, "readOnly":true, "starSize":19}'></div> 
            <div class="text_muted">{{round($data->ConsultantRating, 1 )}}</div>
        </div>
        <!-- <div class="text_muted"><small>(<span>{{$data->ConsultantCountRating}}</span> {{trans('website.Rating')}})</small></div> -->
        {{-- @endif --}}

    </div>
    
  
</a>  

<hr>