@extends('layouts.admin')
@section('title')
    Subadmin
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Subadmin</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <span class="badge badge-pill badge-success">{{ $item->role->name }}</span>
                                </td>
                                <td>
                                    <a class="btn-warning edit-icon" href="{{ route('subadmin.edit',$item->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" href="{{ route('subadmin.delete',$item->id) }}" id="delete"><i class="mdi mdi-delete"></i></a>
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





