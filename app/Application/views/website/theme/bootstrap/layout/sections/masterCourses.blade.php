<?php $fullRating = ($data->reviewsCount) ? $data->reviewsSum / $data->reviewsCount : 0; ?>
@include('website.theme.bootstrap.layout.igts.shared.discount-strip')
<h5 class="item_content_title mbsm ellipse two-lines pm0 p-2" style="height: 56px;">
    <a class="course_card_detail_name course-title" href="/courses/view/<?php echo $data->slug ?>">{{ $data->title_lang }}</a>
</h5>
    <div class="item_content bunch_item course-details-container ">
        <div class="course_card_detail card-content-height" style="bottom: -56px;">
            <div class="course_card_rating_price">
                <?php  if($fullRating){?>
                    <div class="course_card_rating">
                   <div class="jq_rating jq-stars" data-options='{"initialRating":<?php echo round( $fullRating, 1 ); ?>, "readOnly":true, "starSize":15}'></div>
                    <small class="text_muted">(<?php  echo round( $fullRating, 1 ); ?>)</small>
                    </div>
                <?php  }?>

                <div class="course_card_price d-flex justify-content-between w-100">
                    <div>
                        <i class="fas fa-eye visits">
                            <span>
                                +{{ ($data->visits >= 1000 && $data->visits < 1000000) ? (number_format($data->visits / 1000, 0) . 'K') : (($data->visits >= 1000000) ? (number_format($data->visits / 1000000, 0) . 'M'  ) : $data->visits) }}
                            </span>
                        </i>
                    </div>
                    <div class="jq_rating jq-stars d-none" data-options='{"initialRating":<?php  echo round($data->CourseRating, 1); ?>, "readOnly":true, "starSize":15}'><small class="text_muted pt-2">(<?php  echo '5'; ?>)</small></div>
                </div>
            </div>
        </div>
    </div>
</div>