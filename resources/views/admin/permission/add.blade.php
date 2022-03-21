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
                                                <td style="color:black;font-weight:600;">User</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][add]" value="1" id="flexCheckDefault1a">
                                                        <label class="form-check-label" for="flexCheckDefault1a"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][view]" value="1" id="flexCheckDefault2b">
                                                        <label class="form-check-label" for="flexCheckDefault2b"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][edit]" value="1" id="flexCheckDefault3c">
                                                        <label class="form-check-label" for="flexCheckDefault3c"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][delete]" value="1" id="flexCheckDefault4d">
                                                        <label class="form-check-label" for="flexCheckDefault4d"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[user][list]" value="1" id="flexCheckDefault5e">
                                                        <label class="form-check-label" for="flexCheckDefault5e"></label>
                                                    </div>
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td style="color:black;font-weight:600;">Shipping Area</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][add]" value="1" id="flexCheckDefault31">
                                                        <label class="form-check-label" for="flexCheckDefault31"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][view]" value="1" id="flexCheckDefault32">
                                                        <label class="form-check-label" for="flexCheckDefault32"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][edit]" value="1" id="flexCheckDefault33">
                                                        <label class="form-check-label" for="flexCheckDefault33"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][delete]" value="1" id="flexCheckDefault34">
                                                        <label class="form-check-label" for="flexCheckDefault34"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[shipping][list]" value="1" id="flexCheckDefault35">
                                                        <label class="form-check-label" for="flexCheckDefault35"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Coupon</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][add]" value="1" id="flexCheckDefault36">
                                                        <label class="form-check-label" for="flexCheckDefault36"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][view]" value="1" id="flexCheckDefault37">
                                                        <label class="form-check-label" for="flexCheckDefault37"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][edit]" value="1" id="flexCheckDefault38">
                                                        <label class="form-check-label" for="flexCheckDefault38"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][delete]" value="1" id="flexCheckDefault39">
                                                        <label class="form-check-label" for="flexCheckDefault39"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[coupon][list]" value="1" id="flexCheckDefault40">
                                                        <label class="form-check-label" for="flexCheckDefault40"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Order</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][add]" value="1" id="flexCheckDefault41">
                                                        <label class="form-check-label" for="flexCheckDefault41"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][view]" value="1" id="flexCheckDefault42">
                                                        <label class="form-check-label" for="flexCheckDefault42"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][edit]" value="1" id="flexCheckDefault43">
                                                        <label class="form-check-label" for="flexCheckDefault43"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][delete]" value="1" id="flexCheckDefault44">
                                                        <label class="form-check-label" for="flexCheckDefault44"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[order][list]" value="1" id="flexCheckDefault45">
                                                        <label class="form-check-label" for="flexCheckDefault45"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Reports</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][add]" value="1" id="flexCheckDefault46">
                                                        <label class="form-check-label" for="flexCheckDefault46"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][view]" value="1" id="flexCheckDefault47">
                                                        <label class="form-check-label" for="flexCheckDefault47"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][edit]" value="1" id="flexCheckDefault48">
                                                        <label class="form-check-label" for="flexCheckDefault48"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][delete]" value="1" id="flexCheckDefault49">
                                                        <label class="form-check-label" for="flexCheckDefault49"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][list]" value="1" id="flexCheckDefault50">
                                                        <label class="form-check-label" for="flexCheckDefault50"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Review</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][add]" value="1" id="flexCheckDefault51">
                                                        <label class="form-check-label" for="flexCheckDefault51"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][view]" value="1" id="flexCheckDefault52">
                                                        <label class="form-check-label" for="flexCheckDefault52"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][edit]" value="1" id="flexCheckDefault53">
                                                        <label class="form-check-label" for="flexCheckDefault53"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][delete]" value="1" id="flexCheckDefault54">
                                                        <label class="form-check-label" for="flexCheckDefault54"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[review][list]" value="1" id="flexCheckDefault55">
                                                        <label class="form-check-label" for="flexCheckDefault55"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Stock</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][add]" value="1" id="flexCheckDefault56">
                                                        <label class="form-check-label" for="flexCheckDefault56"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][view]" value="1" id="flexCheckDefault57">
                                                        <label class="form-check-label" for="flexCheckDefault57"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][edit]" value="1" id="flexCheckDefault58">
                                                        <label class="form-check-label" for="flexCheckDefault58"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][delete]" value="1" id="flexCheckDefault59">
                                                        <label class="form-check-label" for="flexCheckDefault59"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[stock][list]" value="1" id="flexCheckDefault60">
                                                        <label class="form-check-label" for="flexCheckDefault60"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Role</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][add]" value="1" id="flexCheckDefault61">
                                                        <label class="form-check-label" for="flexCheckDefault61"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][view]" value="1" id="flexCheckDefault62">
                                                        <label class="form-check-label" for="flexCheckDefault62"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][edit]" value="1" id="flexCheckDefault63">
                                                        <label class="form-check-label" for="flexCheckDefault63"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][delete]" value="1" id="flexCheckDefault64">
                                                        <label class="form-check-label" for="flexCheckDefault64"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[role][list]" value="1" id="flexCheckDefault65">
                                                        <label class="form-check-label" for="flexCheckDefault65"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Permission</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][add]" value="1" id="flexCheckDefault66">
                                                        <label class="form-check-label" for="flexCheckDefault66"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][view]" value="1" id="flexCheckDefault67">
                                                        <label class="form-check-label" for="flexCheckDefault67"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][edit]" value="1" id="flexCheckDefault68">
                                                        <label class="form-check-label" for="flexCheckDefault68"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][delete]" value="1" id="flexCheckDefault69">
                                                        <label class="form-check-label" for="flexCheckDefault69"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permission][list]" value="1" id="flexCheckDefault70">
                                                        <label class="form-check-label" for="flexCheckDefault70"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:black;font-weight:600;">Subadmin</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][add]" value="1" id="flexCheckDefault71">
                                                        <label class="form-check-label" for="flexCheckDefault71"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][view]" value="1" id="flexCheckDefault72">
                                                        <label class="form-check-label" for="flexCheckDefault72"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][edit]" value="1" id="flexCheckDefault73">
                                                        <label class="form-check-label" for="flexCheckDefault73"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][delete]" value="1" id="flexCheckDefault74">
                                                        <label class="form-check-label" for="flexCheckDefault74"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[subadmin][list]" value="1" id="flexCheckDefault75">
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