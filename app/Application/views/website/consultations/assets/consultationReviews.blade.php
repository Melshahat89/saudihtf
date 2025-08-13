@php
use App\Application\Model\Consultationsreviews;
@endphp

<div class="course_comments">

    @if ($consultationReviews)
    @foreach ($consultationReviews as $consultationReview)

    <!-- Review Item -->
    <div class="individual_comment">
        <div class="comments_right">
            <div>
                <img src="{{ large1($consultationReview->user->image) }}" style="width: 50px;">
            </div>
            <div>
                <small class="text_muted"><?php echo date('d-m-Y', strtotime($consultationReview->created_at)); ?></small>
                <div>    
                    <?php
                        echo ($consultationReview->user) ? $consultationReview->user->name : trans('courses.visitor');
                    ?>
                </div>
            </div>
        </div>

        <div class="comments_left">
            <div class="comments_raring">
                <div class="jq_rating jq-stars" data-options='{"initialRating":<?php echo round($consultationReview->rating); ?>, "readOnly":true, "starSize":16}'></div>
            </div>
            <div class="comment_body"><?php echo $consultationReview->review; ?></div>
        </div>
    </div>

    @endforeach
    @endif
</div>


@if($enrolled)
@include('website.consultations.assets.reviewForm', ["id" => $consultationId])
@endif