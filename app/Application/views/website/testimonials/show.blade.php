@extends(layoutExtend('website'))

@section('title')
    {{ trans('testimonials.testimonials') }}
@endsection

@section('content')
@include('website.theme.bootstrap.layout.igts.shared.innerPagesHead', ['title' => trans('testimonials.testimonials')]) 

<section class="sec sec_pad_top sec_pad_bottom text-center wrapper">
	<h2 class="text_primary text_capitalize">{{ trans('testimonials.What Our Students Are Saying') }}</h2>
	<p>{{ trans('testimonials.Check out these reviews from IGTS\'s students') }}</p>

	<div class="row">
		@foreach($data as $item)
			<div class="col-md-4 mb-4 p-0" style="cursor: pointer;">
			<a class="review-card" href="javascript:void(0)" data-toggle="modal" data-target="#reviewModal" data-url="{{$item->title}}">
			<div class="m-2" style="background: black; border-radius: 50px;">
				<img src="{{ ($item->image) ? large1($item->image) : asset('website/images/review-placeholder.jpg') }}" style="width: 100%; height: 200px; object-fit: cover; opacity: 0.5; border-radius: 50px;">
				<img src="{{ asset('website') }}/play-button.png" alt="play" class="playBtn">
			</div>
			</a>
			</div>	
		@endforeach
	</div>
</section>

<!-- Modal -->
<div class="modal fade" style="overflow: hidden;width: 100%;" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="Promo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered2" role="document" style="top: 20%;">
    <div class="modal-content" style="background: transparent;border: 0;">
      <div class="modal-header">
        <button type="button" onclick="stopVideo()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <iframe id="review-iframe" style="position: relative;width: 100%;" webkitAllowFullScreen mozallowfullscreen allowfullscreen src="" title="0" byline="0" portrait="0" width="640" height="360" frameborder="0" allow="autoplay"></iframe>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
	$(document).on("click", ".review-card", function () {
     var reviewUrl = $(this).data('url');
     $("#review-iframe").attr('src', reviewUrl);
	});
</script>

<script>
    function stopVideo() {
        $('.modal').on('hidden.bs.modal', function(e) {
            $iframe = $(this).find("iframe");
            $iframe.attr("src", $iframe.attr("src"));
        });
    }
</script>
@endsection
