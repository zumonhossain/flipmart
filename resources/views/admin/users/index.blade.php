@extends('layouts.admin')
@section('title')
    All Users
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_top_title user-registration">
                            <i class="fa fa-gg-circle"></i> All Users
                        </div>

                        @php
                            $online_user = 0;
                        @endphp

                        @foreach ($users as $row)
                            @php
                                if($row->userIsOnline()){
                                    $online_user = $online_user + 1;
                                }
                            @endphp
                        @endforeach

                        <div class="col-md-4 text-center">
                            Total Users <span class="badge bg-white text-danger">{{ count($users) }}</span>
                            and Active Users <span class="badge bg-white text-danger">{{ $online_user }} </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Online/Offline</th>
                                <th>Account</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                    <img src="{{ asset($user->image) }}" alt="" style="height: 60px; width:60px;">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->userIsOnline())
                                            <span class="badge badge-pill badge-success">Active Now</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->user_banned == 0)
                                            <span class="badge badge-pill badge-primary">Unbanned</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Banned</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->user_banned == 0)
                                            <a href="{{ url('admin/user-banned/'.$user->id) }}" class="btn btn-sm btn-danger" title="view data"> <i class="fa fa-arrow-down"></i> Banned</a>
                                        @else
                                            <a href="{{ url('admin/user-unbanned/'.$user->id) }}" class="btn btn-sm btn-primary" title="view data"> <i class="fa fa-arrow-up"></i> Unbanned</a>
                                        @endif
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
            <form method="post" action="{{ route('category.softdelete') }}">
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
@endsection





