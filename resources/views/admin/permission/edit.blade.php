@extends('layouts.admin')
@section('title')
    Edit Permissions
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Permissions </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission.update') }}" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="id" value="{{ $permission->id }}">

                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="role">Select Role</label>
                                    <select class="form-control" name="role_id" id="role">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($permission->role_id == $role->id) ? 'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][add]" value="1" id="flexCheckDefault1" @isset($permission['permission']['banner']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][view]" value="1" id="flexCheckDefault2" @isset($permission['permission']['banner']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][edit]" value="1" id="flexCheckDefault3" @isset($permission['permission']['banner']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][delete]" value="1" id="flexCheckDefault4" @isset($permission['permission']['banner']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][list]" value="1" id="flexCheckDefault5" @isset($permission['permission']['banner']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Brand</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][add]" value="1" id="flexCheckDefault6" @isset($permission['permission']['brand']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault6"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][view]" value="1" id="flexCheckDefault7" @isset($permission['permission']['brand']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault7"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][edit]" value="1" id="flexCheckDefault8" @isset($permission['permission']['brand']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault8"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][delete]" value="1" id="flexCheckDefault9" @isset($permission['permission']['brand']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault9"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[brand][list]" value="1" id="flexCheckDefault10" @isset($permission['permission']['brand']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault10"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Category</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][add]" value="1" id="flexCheckDefault11" @isset($permission['permission']['cat']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault11"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][view]" value="1" id="flexCheckDefault12" @isset($permission['permission']['cat']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault12"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][edit]" value="1" id="flexCheckDefault13" @isset($permission['permission']['cat']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][delete]" value="1" id="flexCheckDefault14" @isset($permission['permission']['cat']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault14"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[cat][list]" value="1" id="flexCheckDefault15" @isset($permission['permission']['cat']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault15"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">SubCategory</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][add]" value="1" id="flexCheckDefault16" @isset($permission['permission']['subcat']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault16"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][view]" value="1" id="flexCheckDefault17" @isset($permission['permission']['subcat']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault17"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][edit]" value="1" id="flexCheckDefault18" @isset($permission['permission']['subcat']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault18"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][delete]" value="1" id="flexCheckDefault19" @isset($permission['permission']['subcat']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault19"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subcat][list]" value="1" id="flexCheckDefault20" @isset($permission['permission']['subcat']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault20"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Sub SubCategory</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][add]" value="1" id="flexCheckDefault21" @isset($permission['permission']['subsubcat']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault21"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][view]" value="1" id="flexCheckDefault22" @isset($permission['permission']['subsubcat']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault22"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][edit]" value="1" id="flexCheckDefault23" @isset($permission['permission']['subsubcat']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault23"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][delete]" value="1" id="flexCheckDefault24" @isset($permission['permission']['subsubcat']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault24"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subsubcat][list]" value="1" id="flexCheckDefault25" @isset($permission['permission']['subsubcat']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault25"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Products</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][add]" value="1" id="flexCheckDefault26" @isset($permission['permission']['product']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault26"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][view]" value="1" id="flexCheckDefault27" @isset($permission['permission']['product']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault27"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][edit]" value="1" id="flexCheckDefault28" @isset($permission['permission']['product']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault28"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][delete]" value="1" id="flexCheckDefault29" @isset($permission['permission']['product']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault29"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[product][list]" value="1" id="flexCheckDefault30" @isset($permission['permission']['product']['list']) checked @endisset>
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