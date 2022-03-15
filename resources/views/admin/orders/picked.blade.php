@extends('layouts.admin')
@section('title')
    Picked Orders
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>picked Orders List</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th class="wd-30p">Date</th>
                                <th class="wd-30p">Invoice</th>
                                <th class="wd-25p">Amount</th>
                                <th class="wd-25p">TNX Id</th>
                                <th class="wd-25p">Status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>{{ $order->amount }}Tk</td>
                                    <td>{{ $order->transaction_id }}</td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">{{ $order->status }}</span>
                                    </td>
                                    <td>
                                    <a class="btn-success view-icon" href="{{ url('admin/orders-view/'.$order->id) }}" title="view data"><i class="mdi mdi-library-plus"></i></a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection





