<!-- <div class="coursecard">
     
    <figure class="img item">
        <a href="/allcourses/category/{{$data->slug}}">
            <img style="height: 130px !important;border-radius: 50px;" src="http://igtsservice.com/courses-mentalhealth-sample1.jpeg
" loading="lazy" class="course-card-image discount-applied">
            <a style="    position: absolute;
    top: 51px;
    right: 0;
    left: 0;
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 18px;" href="/allcourses/category/{{$data->slug}}">
                {{$data->name_lang}}
            </a>
        </a>
    </figure>    
    
    <div class="item_content bunch_item bunch_item_dark_bg course-details-container" style="height: 63px;">
        <h5 class="item_content_title mbsm course-title-container">
            <a class="course_card_detail_name course-title" href="/allcourses/category/{{$data->slug}}">
            {{$data->name_lang}}
            </a>
        </h5>   
    </div>
</div> -->

<div class="coursecard text-center">
    <a href="/allcourses/category/{{$data->slug}}" class="hvr-float specialities-slider-item" style="font-size: 12px;">
    <i class="hero-icons {{$data->color_code}}"></i>
        <span>
            {{$data->name_lang}}
        </span>
    </a>
</div>