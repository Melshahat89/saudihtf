<div class="trainers_item">

    <figure class="img">
        <a href="/instructors/view/{{$data->slug}}">
            <img class="instructor_card_image w-50 rounded-circle" src="{{large1($data->image)}}" loading="lazy" alt="{{ $data->fullname_lang }}">
        </a>
    </figure>   

    <footer class="trainers_item_content text_center">
        <h5 class="trainers_item_content_title mbxs">
            <a href="/instructors/view/{{$data->slug}}">{{ $data->fullname_lang }}</a>
        </h5>
        <p><small>{{ $data->title_lang }}</small></p>
    </footer>
</div>