<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		@php
			$banners = App\Models\Banner::where('ban_status',1)->orderBy('id','DESC')->limit(3)->get();
		@endphp
		@foreach ($banners as $banner)
			<div class="item" style="background-image: url({{ asset($banner->ban_image) }});">
				<div class="container-fluid">
					<div class="caption bg-color vertical-center text-left">
						<div class="slider-header fadeInDown-1">{{ $banner->ban_title }}</div>
						<div class="big-text fadeInDown-1">{{ $banner->ban_subtitle }}</div>
						<div class="excerpt fadeInDown-2 hidden-xs">
							<span>{{ $banner->ban_description }}</span>
						</div>
						<div class="button-holder fadeInDown-3">
							<a href="{{ $banner->ban_url }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ $banner->ban_button }}</a>
						</div>
					</div><!-- /.caption -->
				</div><!-- /.container-fluid -->
			</div><!-- /.item -->
		@endforeach
	</div><!-- /.owl-carousel -->
</div>