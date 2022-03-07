<div class="side-menu animate-dropdown outer-bottom-xs">
	<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @php
                $categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(5)->get();
            @endphp
            
            @foreach ($categories as $category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                	$subcategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                @endphp

                                @foreach ($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                                            <h2 class="title">{{ $subcategory->subcategory_name }}</h2>
                                        </a>
                                        <ul class="links list-unstyled">
                                            @php
                                                $subsucategories = App\Models\Subsubcategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                            @endphp

                                            @foreach ($subsucategories as $subsucategory)
                                            <li>
                                                <a href="{{ url('sub/subcategory/product/'.$subsucategory->id.'/'.$subsucategory->subsubcategory_slug) }}">{{ $subsucategory->subsubcategory_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.col -->
                                @endforeach
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.menu-item -->
            @endforeach
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->