@extends(layoutExtend('website'))
@section('title')
{{ ($homesettings->seo_title_lang) ? $homesettings->seo_title_lang : trans('home.HomeTitle') }}
@endsection
@section('description')
{{ ($homesettings->seo_desc_lang) ? $homesettings->seo_desc_lang : trans('website.Footer IGTS') }}
@endsection
@section('keywords')
{{ ($homesettings->seo_keys) ? extractSeoKeys($homesettings->seo_keys) : '' }}
@endsection

@push('js')
<script src="{{ asset('old') }}/js/front/social.js"></script>
@endpush
@section('content')

<section class="sec sec_pad_top sec_pad_bottom bg_gradient">
    <div class="wrapper">
        <section class="title mblg">
            <h2 class="text_white text_capitalize">{{trans('blog.blog')}}</h2>
        </section>
    </div>
</section>

<main class="main_content">
    @include('website.blog.postsPerCategory', ['headTitle' => trans('home.courses')])
</main>


@endsection