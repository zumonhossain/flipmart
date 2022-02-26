@extends('layouts.admin')
@section('title')
    State Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Division Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('state.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                         <input type="hidden" name="id" class="form-control" value="{{ $state->id }}">
                         <input type="hidden" name="slug" class="form-control" value="{{ $state->division_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Division Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control select2-show-search" name="division_id">
                                    <option value="">-- Select Division Name --</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $state->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> District Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control select2-show-search" name="district_id">
                                    <option value="">-- Select Division Name --</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}" {{ $district->id == $state->district_id ? 'selected': '' }}>{{ $district->district_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> State Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="state_name" class="form-control" placeholder="Enter State Name" value="{{ $state->state_name }}">
                                @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark registration-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('contents/admin') }}/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{  url('/admin/district/ajax') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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





