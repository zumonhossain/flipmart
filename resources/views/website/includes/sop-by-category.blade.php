<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">Shop By Category</h3>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach ($categories as $category)
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">{{ $category->category_name }}</a>
                    </div><!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
                        <div class="accordion-inner">
                            @php
                                $subcategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                            @endphp
                            <ul>
                                @foreach ($subcategories as $subcategory)
                                    <li>
                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                                            {{ $subcategory->subcategory_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /.accordion-inner -->
                    </div><!-- /.accordion-body -->
                </div><!-- /.accordion-group -->
            @endforeach
        </div><!-- /.accordion -->
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->