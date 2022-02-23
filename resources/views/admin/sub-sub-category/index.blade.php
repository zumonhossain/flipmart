@extends('layouts.admin')
@section('title')
    Sub SubCategory
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Sub SubCategory </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sub-sub-category.insert') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Category Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select Category Name --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Sub Category Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="subcategory_id">
                                    <option value="">-- Select Sub Category Name --</option>

                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Sub SubCategory Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="subsubcategory_name" class="form-control" value="">
                                @error('subsubcategory_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark registration-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Sub SubCategory</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Sub SubCategory Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subSubCategory as $item)
                                <tr>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ $item->subcategory->subcategory_name }}</td>
                                    <td>{{ $item->subsubcategory_name }}</td>
                                    <td>
                                        <a class="btn-success view-icon" href="{{ url('admin/sub-sub-category/view/'.$item->subsubcategory_slug) }}"><i class="mdi mdi-library-plus"></i></a>
                                        <a class="btn-warning edit-icon" href="{{ url('admin/sub-sub-category/edit/'.$item->subsubcategory_slug) }}"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('sub-sub-category.softdelete') }}">
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

    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
    <script src="{{ asset('contents/admin') }}/js/jquery-2.2.4.min.js"></script>
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
@endsection





