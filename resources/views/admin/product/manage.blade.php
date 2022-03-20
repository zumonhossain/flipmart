@extends('layouts.admin')
@section('title')
    Product Manage
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_top_title user-registration">
                            <i class="fa fa-gg-circle"></i> All Product Information
                        </div>
                        <div class="col-md-4 text-right">

                            @isset(auth()->user()->role->permission['permission']['product']['add'])
                                <a href="{{route('product.add')}}" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-plus-circle"></i> Add Product</a>
                            @endisset
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                            <thead>
                                <tr>
                                    <th>Thambnail</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Discount Price</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->product_thambnail) }}" alt="" style="height: 60px; width:60px;">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_qty }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>
                                            @if ($product->discount_price == NULL)
                                                <span class="badge badge-pill badge-danger">No</span>
                                            @else
                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount =  ( $amount/$product->selling_price) * 100;
                                            @endphp
                                                <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->product_status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @isset(auth()->user()->role->permission['permission']['product']['view'])
                                                <a class="btn-success view-icon" href="{{ url('admin/product/view/'.$product->product_slug) }}"><i class="mdi mdi-library-plus"></i></a>
                                            @endisset
                                            @isset(auth()->user()->role->permission['permission']['product']['edit'])
                                                <a class="btn-warning edit-icon" href="{{ url('admin/product/edit/'.$product->product_slug) }}"><i class="mdi mdi-table-edit"></i></a>
                                            @endisset

                                            @if ($product->product_status == 1)
                                                <a href="{{ url('admin/product-inactive/'.$product->product_slug) }}" class="btn btn-sm btn-danger edit-icon" title="inactive"> <i class="fa fa-arrow-down"></i></a>
                                            @else
                                                <a href="{{ url('admin/product-active/'.$product->product_slug) }}" class="btn btn-sm btn-success edit-icon" title="active now data"> <i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            
                                            @isset(auth()->user()->role->permission['permission']['product']['delete'])
                                                <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$product->id}}" href="#"><i class="mdi mdi-delete"></i></a>
                                            @endisset
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('product.softdelete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal_header_title">
                    <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" name="modal_id" id="modal_id" />
                    Are you want to sure delete this data?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect">Confirm</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection