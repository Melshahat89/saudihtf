@php
use App\Application\Model\Blogposts;
@endphp

<a href="/blog/{{$data->categories->first()->category->slug}}/{{$data->slug}}" class="course_card_link sticky-stopper">
    <span class="course_card_img">
        <img src="{{large1($data->image)}}">
    </span>
    <div class="course_card_detail">
        <div class="course_card_detail_name text_primary">{{$data->title_lang}}</div>
        <p>{{ strip_tags(charLimit($data->description_lang, 500)) }}</p>
        @if(isset($data->created_at))
        {{trans('courses.created at')}} {{ $data->created_at->format('Y-m-d') }}
        @endif
        <br>
        @if(isset($data->updated_at))
        {{trans('courses.updated at')}} {{ $data->updated_at->format('Y-m-d') }}
        @endif
    </div>
</a>
<hr>