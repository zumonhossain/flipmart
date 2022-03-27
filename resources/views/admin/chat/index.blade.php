@extends('layouts.admin')
@section('title')
    Chating
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Chating Information</h4>
                </div>
                <div class="card-body">
                    <div id="app">
                        <chat-component></chat-component>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection