@extends('layouts.admin')
@section('title')
    Customer Review
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Customer Review </h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th class="wd-30p">Product Image</th>
                                <th class="wd-25p">Customer Name</th>
                                <th class="wd-25p">Comment</th>
                                <th class="wd-25p">Rating</th>
                                <th class="wd-25p">status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>
                                        <img src="{{ asset($review->product->product_thambnail) }}" alt="" style="width: 80px;">
                                    </td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>
                                        <textarea name="" id="" cols="30" disabled rows="2">{{ $review->comment }}</textarea>
                                    </td>
                                    <td>{{ $review->rating }}</td>
                                    <td>
                                        <span class="badg badge-pill badge-success">{{ $review->status }}</span>
                                        @if ($review->status == 'pending')
                                            <a id="approve" href="{{ url('admin/review-approve/'.$review->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/review-delete/'.$review->id) }}" class="btn btn-sm btn-danger delete-icon" id="delete" title="delete data"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection





