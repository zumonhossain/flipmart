@extends('layouts.website')
@section('title')
    My Review
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>My Review</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-3 ">
                        @include('user.includes.profile-sidebar')
                    </div>
                    <div class="col-md-9 mt-2">
                        <div class="product-add-review">
                            <h4 class="title">Write your own review</h4>
                            <form role="form" class="cnt-form" action="{{ route('store.review') }}" method="POST">
                                @csrf
                                
                                <input type="hidden" name="product_id" value="{{ $id }}">

                                <div class="review-table">
                                    <div class="table-responsive">
                                        <table class="table">	
                                            <thead>
                                                <tr>
                                                    <th class="cell-label">&nbsp;</th>
                                                    <th>1 star</th>
                                                    <th>2 stars</th>
                                                    <th>3 stars</th>
                                                    <th>4 stars</th>
                                                    <th>5 stars</th>
                                                </tr>
                                            </thead>	
                                            <tbody>
                                                <tr>
                                                    <td class="cell-label">Rating</td>
                                                    <td><input type="radio" name="rating" class="radio" value="1"></td>
                                                    <td><input type="radio" name="rating" class="radio" value="2"></td>
                                                    <td><input type="radio" name="rating" class="radio" value="3"></td>
                                                    <td><input type="radio" name="rating" class="radio" value="4"></td>
                                                    <td><input type="radio" name="rating" class="radio" value="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @error('rating')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="review-form">
                                    <div class="form-container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="comment"></textarea>
                                                    @error('comment')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action text-right">
                                            <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection