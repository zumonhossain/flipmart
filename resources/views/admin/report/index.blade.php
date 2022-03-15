@extends('layouts.admin')
@section('title')
    Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Search By Date</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('search-by-date') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Date: <span style="color:red">*</span></label>
                            <input class="form-control" type="date" name="date">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Search By Month</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('search-by-month') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Month: <span style="color:red">*</span></label>
                            <select class="form-control select2" name="month_name" data-placeholder="Choose one" data-validation="required">
                                <option label="Choose one"></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('month_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Select Year: <span style="color:red">*</span></label>
                            <select class="form-control select2" name="year_name" data-placeholder="Choose one" data-validation="required">
                                <option label="Choose one"></option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                            @error('year_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Search By Year</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('search-by-year') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Year: <span style="color:red">*</span></label>
                            <select class="form-control select2" name="year_name" data-placeholder="Choose one" data-validation="required">
                                <option label="Choose one"></option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





