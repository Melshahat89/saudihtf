<div class="new-instructor col-md-4">
    <figure class="mbsm">
        <a href="{{url('/instructors/view/'.isset($instructor['slug']) ? $instructor['slug'] : '')}}">
            <img src="{{ large1($instructor['image']) }}" style="width: 100px;height: 100px;">
        </a>
    </figure>
    <div class="auther_name mbmd">
        <h5 class="mbxs"><a href="{{url('/instructors/view/'.$instructor['slug'] ? $instructor['slug'] : '')}}">{{ $instructor['Fullname_lang'] }}</a></h5>
        <span class="auther_title">{{ $instructor['title_lang'] }}</span>
    </div>
</div> 