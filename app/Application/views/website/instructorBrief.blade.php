<section class="sec sec_pad_top  bg_gradient text_white instructor_brief_section">
    <div class="wrapper">
        <div class="profile_info">
            <header class="profile_info_header">
                <figure class="profile_info_avatar">
                    <a href="/instructors/view/<?php echo $instructor->slug; ?>" class="m-4">
                        <img src="{{large1($instructor->image)}}" class="rounded-circle" alt="{{$instructor->name_lang}}" style="width: 100px; height: 100px; object-fit: cover;">
                    </a>
                    <figcaption>
                        <h5 class="mb_0"><?php echo $instructor->Fullname_lang; ?></h5>
                        <small><?php echo $instructor->title_lang; ?></small>
                    </figcaption>
                </figure>
                <div class="profile_info_statics">
                    <div>
                        <div class="profile_info_statics_name_icon"><i class="fas fa-graduation-cap"></i></div>
                        <div class="profile_info_statics_number"><?php echo count($instructor->InstructorCoursesWithRelations) ?></div>
                        <div class="profile_info_statics_name">{{trans('courses.courses')}}</div>
                    </div>
                    <!-- <div>
                        <div class="profile_info_statics_name_icon"><i class="fas fa-play"></i></div>
                        <div class="profile_info_statics_number"><?php echo $instructor->talksCount;?></div>
                        <div class="profile_info_statics_name">كلمات مصورة</div>
                    </div> -->
                    <div>
                        <div class="profile_info_statics_name_icon"><i class="far fa-eye"></i></div>
                        <div class="profile_info_statics_number">{{$instructor->instructorCoursesViews}}</div>
                        <div class="profile_info_statics_name">{{trans('courses.Views')}}</div>
                    </div>
                </div>
            </header>

        </div>
    </div>
</section>