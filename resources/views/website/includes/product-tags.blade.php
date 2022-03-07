<!-- ========================== PRODUCT TAGS ============================== -->
@php
    $tags = App\Models\Product::groupBy('product_tags')->select('product_tags')->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">
			@foreach ($tags as $tag)
				<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags) }}">{{ $tag->product_tags }}</a>
			@endforeach
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ================= PRODUCT TAGS : END ============================================== -->