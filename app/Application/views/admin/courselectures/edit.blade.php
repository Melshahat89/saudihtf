@extends(layoutExtend2())
@include('admin.shared.select2styles')

@section('title')
    {{ trans('courselectures.courselectures') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('courselectures.courselectures') , 'model' => 'courselectures' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
        @include(layoutMessage())


        <form class="card-body" action="{{ concatenateLangToUrl('lazyadmin/courselectures/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.courselectures.relation.coursesections.edit")
            @include("admin.courselectures.relation.user.edit")
            @include("admin.courselectures.relation.courses.edit")
            @include("admin.courselectures.relation.events.edit")
            <div class="form-group  {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="title">{{ trans("courselectures.title")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "title", isset($item->title) ? $item->title : old("title") , "text" , "courselectures") !!}
            </div>
            @if ($errors->has("title.en"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("title.en") }}</strong>
     </span>
                </div>
            @endif
            @if ($errors->has("title.ar"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("title.ar") }}</strong>
     </span>
                </div>
            @endif
            <div class="form-group {{ $errors->has("slug") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="slug">{{ trans("courselectures.slug")}}</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ isset($item->slug) ? $item->slug : old("slug") }}"  placeholder="{{ trans("courselectures.slug")}}">
            </div>
            @if ($errors->has("slug"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("slug") }}</strong>
     </span>
                </div>
            @endif
            <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="description">{{ trans("courselectures.description")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "courselectures" ) !!}
            </div>
            @if ($errors->has("description.en"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("description.en") }}</strong>
     </span>
                </div>
            @endif
            @if ($errors->has("description.ar"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("description.ar") }}</strong>
     </span>
                </div>
            @endif



            <div class="form-group {{ $errors->has("video_type") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="video_type">{{ trans("courselectures.video_type")}}</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="video_type" {{ isset($item->video_type) && $item->video_type == 0 ? "checked" : "" }} type="radio" value="0" >
                        Videocipher
                    </label >
                    <label class="form-check-label">
                        <input class="form-check-input" name="video_type" {{ isset($item->video_type) && $item->video_type == 1 ? "checked" : "" }} type="radio" value="1" >
                        Vimeo
                    </label>
                </div> 		</div>
            @if ($errors->has("video_type"))
                <div class="alert alert-danger">
                 <span class='help-block'>
                  <strong>{{ $errors->first("video_type") }}</strong>
                 </span>
                </div>
            @endif






            <div class="form-group {{ $errors->has("video_file") ? "has-error" : "" }}" >
                <label for="video_file">{{ trans("courselectures.video_file")}} - vimeo</label>

                <?php
                if(isset($item)){
                    $promos = App\Application\Model\Courses::getAllVimeoCourses($item->courses->prefix_vimeo);
                }

                ?>
                <select name="video_file" id="single-prepend-text" class="video_file form-control select2">


                    <option value=""> -- Select Vimeo Video -- </option>

                    {{--           @if(isset($item) && $item->video_file)--}}

                    @isset($promos)
                        @foreach ($promos as $promo)
                                <?php $Vimeoid = (explode("/",$promo['uri']))[2]; ;?>
                            {{--                   <option value="{{$item->video_file}}" selected>{{$promo[0]['name']}}</option>--}}
                            <option value="{{$Vimeoid}}" {{ isset($item)? ($item->video_file == $Vimeoid)?'selected':'' :'' }}>
                                {{ $promo['name'] }}
                            </option>
                        @endforeach
                    @endif


                    {{--           @endif--}}

                </select>

            </div>
            @if ($errors->has("video_file"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("video_file") }}</strong>
     </span>
                </div>
            @endif


            <div class="col-md-12">
                <div class="form-group select2-bootstrap-prepend" id="drop-down-parent">
                    <label class="col-md-2 col-form-label" for="vdocipher_id">{{ trans("courselectures.video_file")}}</label>
                    @php
                        if(isset($item)){
                          $fields = \App\Application\Model\Courselectures::findOrFail($item->id);
                          $videos = \App\Application\Model\Courses::getAllVdocipherCourses($fields->courses->vdocipher_tag);
                      }
                    @endphp
                            <!-- *********************** Start vdocipher ********************-->
                    <select name="vdocipher_id" id="vdocipher_id" class="form-control input-item select2 select-custom">
                        <option value="">Select Lecture</option>
                        @isset($videos)
                            @foreach ($videos as $video)
                                <option value="{{$video->id}}" {{ isset($item)? ($item->vdocipher_id == $video->id)?'selected':'' :'' }}>
                                    {{ $video->title }}
                                </option>
                            @endforeach
                        @endisset
                    </select>

                    <!-- *********************** End vdocipher ********************-->
                    @if ($errors->has("vdocipher_id"))
                        <div class="alert alert-danger">
        <span class='help-block'>
          <strong>{{ $errors->first("vdocipher_id") }}</strong>
        </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has("start_date") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="start_date">{{ trans("promotions.start_date")}}</label>
                <input type="text" name="start_date" class="form-control datepicker" id="start_date" value="{{ isset($item->start_date) ? $item->start_date : old("start_date") }}"  placeholder="{{ trans("promotions.start_date")}}">
            </div>
            @if ($errors->has("start_date"))
                <div class="alert alert-danger">
        <span class='help-block'>
          <strong>{{ $errors->first("start_date") }}</strong>
        </span>
                </div>
            @endif

            <div class="form-group {{ $errors->has("length") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="length">{{ trans("courselectures.length")}}</label>
                <input type="text" name="length" class="form-control" id="length" value="{{ isset($item->length) ? $item->length : old("length") }}"  placeholder="{{ trans("courselectures.length")}}">
            </div>
            @if ($errors->has("length"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("length") }}</strong>
     </span>
                </div>
            @endif

            <div class="form-group {{ $errors->has("webinar_link") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="webinar_link">{{ trans("courselectures.webinar_link")}}</label>
                <input type="text" name="webinar_link" class="form-control" id="webinar_link" value="{{ isset($item->webinar_link) ? $item->webinar_link : old("webinar_link") }}"  placeholder="{{ trans("courselectures.webinar_link")}}">
            </div>
            @if ($errors->has("webinar_link"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("webinar_link") }}</strong>
     </span>
                </div>
            @endif
            <div class="form-group {{ $errors->has("is_free") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="is_free">{{ trans("courselectures.is_free")}}</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="is_free" {{ isset($item->is_free) && $item->is_free == 0 ? "checked" : "" }} type="radio" value="0" >
                        {{ trans("courselectures.No")}}
                    </label >
                    <label class="form-check-label">
                        <input class="form-check-input" name="is_free" {{ isset($item->is_free) && $item->is_free == 1 ? "checked" : "" }} type="radio" value="1" >
                        {{ trans("courselectures.Yes")}}
                    </label>
                </div> 		</div>
            @if ($errors->has("is_free"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("is_free") }}</strong>
     </span>
                </div>
            @endif
            <div class="form-group {{ $errors->has("position") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="position">{{ trans("courselectures.position")}}</label>
                <input type="text" name="position" class="form-control" id="position" value="{{ isset($item->position) ? $item->position : old("position") }}"  placeholder="{{ trans("courselectures.position")}}">
            </div>
            @if ($errors->has("position"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("position") }}</strong>
     </span>
                </div>
            @endif

            <div class="form-group {{ $errors->has("vid_playbackInfo") ? "has-error" : "" }}" >
                <label class="col-md-2 col-form-label" for="vid_playbackInfo">{{ trans("courselectures.vid_playbackinfo")}}</label>
                <input type="text" name="vid_playbackInfo" class="form-control" id="vid_playbackInfo" value="{{ isset($item->vid_playbackInfo) ? $item->vid_playbackInfo : old("vid_playbackInfo") }}"  placeholder="{{ trans("courselectures.vid_playbackinfo")}}">
            </div>
            @if ($errors->has("vid_playbackInfo"))
                <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("vid_playbackInfo") }}</strong>
     </span>
                </div>
            @endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-info w-md" >
                    <i class="material-icons">pageview</i>
                    {{ trans('home.save') }}  {{ trans('courselectures.courselectures') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@include('admin.shared.select2scripts')
