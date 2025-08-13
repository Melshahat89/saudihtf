<div class="trainers_item">
    
    <figure class="img rounded-circle">
        <a href="/instructors/view/{{$data->slug}}">
            <img class="instructor_card_image" src="{{large1($data->image)}}" loading="lazy">
        </a>
    </figure>
    
    <footer class="trainers_item_content text_center">
        <h5 class="trainers_item_content_title mbxs">
            <a href="/instructors/view/{{$data->slug}}">{{$data->Fullname_lang}}</a>
        </h5>
        <p><small>{{$data->title_lang}}</small></p>
    </footer>
</div>