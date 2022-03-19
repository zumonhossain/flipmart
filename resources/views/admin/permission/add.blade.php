@extends('layouts.admin')
@section('title')
    Add Permissions
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add New Permissions </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission.insert') }}" class="form-horizontal">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="role">Select Role</label>
                                    <select class="form-control" name="role_id" id="role">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Create</button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table color-bordered-table red-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>Permission</th>
                                                <th>Add</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>List</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Banner</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][add]" value="1" id="flexCheckDefault1">
                                                        <label class="form-check-label" for="flexCheckDefault1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][view]" value="1" id="flexCheckDefault2">
                                                        <label class="form-check-label" for="flexCheckDefault2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][edit]" value="1" id="flexCheckDefault3">
                                                        <label class="form-check-label" for="flexCheckDefault3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][delete]" value="1" id="flexCheckDefault4">
                                                        <label class="form-check-label" for="flexCheckDefault4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][list]" value="1" id="flexCheckDefault5">
                                                        <label class="form-check-label" for="flexCheckDefault5"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Brand</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][add]" value="1" id="flexCheckDefault6">
                                                        <label class="form-check-label" for="flexCheckDefault6"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][view]" value="1" id="flexCheckDefault7">
                                                        <label class="form-check-label" for="flexCheckDefault7"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][edit]" value="1" id="flexCheckDefault8">
                                                        <label class="form-check-label" for="flexCheckDefault8"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][delete]" value="1" id="flexCheckDefault9">
                                                        <label class="form-check-label" for="flexCheckDefault9"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][list]" value="1" id="flexCheckDefault10">
                                                        <label class="form-check-label" for="flexCheckDefault10"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Category</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][add]" value="1" id="flexCheckDefault11">
                                                        <label class="form-check-label" for="flexCheckDefault11"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][view]" value="1" id="flexCheckDefault12">
                                                        <label class="form-check-label" for="flexCheckDefault12"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][edit]" value="1" id="flexCheckDefault13">
                                                        <label class="form-check-label" for="flexCheckDefault13"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][delete]" value="1" id="flexCheckDefault14">
                                                        <label class="form-check-label" for="flexCheckDefault14"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][list]" value="1" id="flexCheckDefault15">
                                                        <label class="form-check-label" for="flexCheckDefault15"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">SubCategory</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][add]" value="1" id="flexCheckDefault16">
                                                        <label class="form-check-label" for="flexCheckDefault16"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][view]" value="1" id="flexCheckDefault17">
                                                        <label class="form-check-label" for="flexCheckDefault17"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][edit]" value="1" id="flexCheckDefault18">
                                                        <label class="form-check-label" for="flexCheckDefault18"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][delete]" value="1" id="flexCheckDefault19">
                                                        <label class="form-check-label" for="flexCheckDefault19"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][list]" value="1" id="flexCheckDefault20">
                                                        <label class="form-check-label" for="flexCheckDefault20"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Sub SubCategory</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][add]" value="1" id="flexCheckDefault21">
                                                        <label class="form-check-label" for="flexCheckDefault21"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][view]" value="1" id="flexCheckDefault22">
                                                        <label class="form-check-label" for="flexCheckDefault22"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][edit]" value="1" id="flexCheckDefault23">
                                                        <label class="form-check-label" for="flexCheckDefault23"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][delete]" value="1" id="flexCheckDefault24">
                                                        <label class="form-check-label" for="flexCheckDefault24"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][list]" value="1" id="flexCheckDefault25">
                                                        <label class="form-check-label" for="flexCheckDefault25"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Products</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][add]" value="1" id="flexCheckDefault26">
                                                        <label class="form-check-label" for="flexCheckDefault26"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][view]" value="1" id="flexCheckDefault27">
                                                        <label class="form-check-label" for="flexCheckDefault27"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][edit]" value="1" id="flexCheckDefault28">
                                                        <label class="form-check-label" for="flexCheckDefault28"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][delete]" value="1" id="flexCheckDefault29">
                                                        <label class="form-check-label" for="flexCheckDefault29"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][list]" value="1" id="flexCheckDefault30">
                                                        <label class="form-check-label" for="flexCheckDefault30"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection