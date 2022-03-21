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
                                                <td style="color:black;font-weight:600;">User</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][add]" value="1" id="flexCheckDefault1a" @isset($permission['permission']['user']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1a"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][view]" value="1" id="flexCheckDefault2b" @isset($permission['permission']['user']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault2b"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][edit]" value="1" id="flexCheckDefault3c" @isset($permission['permission']['user']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3c"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][delete]" value="1" id="flexCheckDefault4d" @isset($permission['permission']['user']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4d"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][list]" value="1" id="flexCheckDefault5e" @isset($permission['permission']['user']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5e"></label>
                                                    </div>
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td style="color:black;font-weight:600;">Shipping Area</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][add]" value="1" id="flexCheckDefault31" @isset($permission['permission']['shipping']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault31"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][view]" value="1" id="flexCheckDefault32" @isset($permission['permission']['shipping']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault32"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][edit]" value="1" id="flexCheckDefault33" @isset($permission['permission']['shipping']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault33"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][delete]" value="1" id="flexCheckDefault34" @isset($permission['permission']['shipping']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][list]" value="1" id="flexCheckDefault35" @isset($permission['permission']['shipping']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault35"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Coupon</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][add]" value="1" id="flexCheckDefault36" @isset($permission['permission']['coupon']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault36"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][view]" value="1" id="flexCheckDefault37" @isset($permission['permission']['coupon']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault37"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][edit]" value="1" id="flexCheckDefault38" @isset($permission['permission']['coupon']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault38"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][delete]" value="1" id="flexCheckDefault39" @isset($permission['permission']['coupon']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault39"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][list]" value="1" id="flexCheckDefault40" @isset($permission['permission']['coupon']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault40"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Order</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][add]" value="1" id="flexCheckDefault41" @isset($permission['permission']['order']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault41"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][view]" value="1" id="flexCheckDefault42" @isset($permission['permission']['order']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault42"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][edit]" value="1" id="flexCheckDefault43" @isset($permission['permission']['order']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault43"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][delete]" value="1" id="flexCheckDefault44" @isset($permission['permission']['order']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault44"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][list]" value="1" id="flexCheckDefault45" @isset($permission['permission']['order']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Reports</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][add]" value="1" id="flexCheckDefault46" @isset($permission['permission']['reports']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault46"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][view]" value="1" id="flexCheckDefault47" @isset($permission['permission']['reports']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault47"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][edit]" value="1" id="flexCheckDefault48" @isset($permission['permission']['reports']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault48"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][delete]" value="1" id="flexCheckDefault49" @isset($permission['permission']['reports']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault49"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][list]" value="1" id="flexCheckDefault50" @isset($permission['permission']['reports']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault50"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Review</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][add]" value="1" id="flexCheckDefault51" @isset($permission['permission']['review']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault51"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][view]" value="1" id="flexCheckDefault52" @isset($permission['permission']['review']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault52"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][edit]" value="1" id="flexCheckDefault53" @isset($permission['permission']['review']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault53"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][delete]" value="1" id="flexCheckDefault54" @isset($permission['permission']['review']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault54"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][list]" value="1" id="flexCheckDefault55" @isset($permission['permission']['review']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault55"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Stock</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][add]" value="1" id="flexCheckDefault56" @isset($permission['permission']['stock']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][view]" value="1" id="flexCheckDefault57" @isset($permission['permission']['stock']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault57"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][edit]" value="1" id="flexCheckDefault58" @isset($permission['permission']['stock']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault58"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][delete]" value="1" id="flexCheckDefault59" @isset($permission['permission']['stock']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault59"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][list]" value="1" id="flexCheckDefault60" @isset($permission['permission']['stock']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault60"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Role</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][add]" value="1" id="flexCheckDefault61" @isset($permission['permission']['role']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault61"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][view]" value="1" id="flexCheckDefault62" @isset($permission['permission']['role']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault62"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][edit]" value="1" id="flexCheckDefault63" @isset($permission['permission']['role']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault63"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][delete]" value="1" id="flexCheckDefault64" @isset($permission['permission']['role']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault64"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][list]" value="1" id="flexCheckDefault65" @isset($permission['permission']['role']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault65"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Permission</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][add]" value="1" id="flexCheckDefault66" @isset($permission['permission']['permission']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault66"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][view]" value="1" id="flexCheckDefault67" @isset($permission['permission']['permission']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault67"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][edit]" value="1" id="flexCheckDefault68" @isset($permission['permission']['permission']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault68"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][delete]" value="1" id="flexCheckDefault69" @isset($permission['permission']['permission']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault69"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][list]" value="1" id="flexCheckDefault70" @isset($permission['permission']['permission']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault70"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Subadmin</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][add]" value="1" id="flexCheckDefault71" @isset($permission['permission']['subadmin']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault71"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][view]" value="1" id="flexCheckDefault72" @isset($permission['permission']['subadmin']['view']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault72"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][edit]" value="1" id="flexCheckDefault73" @isset($permission['permission']['subadmin']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault73"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][delete]" value="1" id="flexCheckDefault74" @isset($permission['permission']['subadmin']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault74"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][list]" value="1" id="flexCheckDefault75" @isset($permission['permission']['subadmin']['list']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault75"></label>
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