<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;
use Auth;

class ShippingAreaController extends Controller{
    // Division
    public function division(){
        $divisions = ShipDivision::where('division_status',1)->orderBy('id','DESC')->get();
        return view('admin.ship-division.index',compact('divisions'));
    }

    public function divisionView($slug){
        $data = ShipDivision::where('division_status',1)->where('division_slug',$slug)->firstOrFail();
        return view('admin.ship-division.view',compact('data'));
    }

    public function divisionEdit($slug){
        $data = ShipDivision::where('division_status',1)->where('division_slug',$slug)->firstOrFail();
        return view('admin.ship-division.edit',compact('data'));
    }

    public function divisionInsert(Request $request){
        $request->validate([
            'division_name'=>'required',
        ],[
            'division_name.required'=>'Please Enter Division Name!'
        ]);

        $slug = uniqid('division-15');
        $creator = Auth::user()->id;

        ShipDivision::insertGetId([
            'division_name'=>$request['division_name'],
            'division_slug'=>$slug,
            'division_creator'=>$creator,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'messege' =>'Division Upload Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('division')->with($notification);

    }

    public function divisionUpdate(Request $request){
        $id = $request['id'];

        $request->validate([
            'division_name'=>'required',
        ],[
            'division_name.required'=>'Please Enter Division Name!'
        ]);

        $slug = uniqid('division-15');
        $creator = Auth::user()->id;

        ShipDivision::where('division_status',1)->where('id',$id)->update([
            'division_name'=>$request['division_name'],
            'division_slug'=>$slug,
            'division_creator'=>$creator,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = array(
            'messege' =>'Division Update Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('division')->with($notification);
    }

    public function divisionSoftdelete(Request $request){
        $id = $request['modal_id'];

        ShipDivision::where('division_status',1)->where('id',$id)->update([
            'division_status'=>0,
        ]);

        $notification = array(
            'messege' =>'Division Softdelete Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('division')->with($notification);
    }


    // District
    public function district(){
        $divisions = ShipDivision::where('division_status',1)->orderBy('id','DESC')->get();
        $districts = ShipDistrict::where('district_status',1)->orderBy('id','DESC')->get();
        return view('admin.ship-district.index',compact('districts','divisions'));
    }

    public function districtView($slug){
        $data = ShipDistrict::where('district_status',1)->where('district_slug',$slug)->firstOrFail();
        return view('admin.ship-district.view',compact('data'));
    }

    public function districtEdit($slug){
        $divisions = ShipDivision::where('division_status',1)->orderBy('id','DESC')->get();
        $district = ShipDistrict::where('district_status',1)->where('district_slug',$slug)->firstOrFail();
        return view('admin.ship-district.edit',compact('district','divisions'));
    }

    public function districtInsert(Request $request){
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ],[
            'division_id.required'=>'Please Enter Division Name!',
            'district_name.required'=>'Please Enter District Name!',
        ]);

        $slug = uniqid('district-15');
        $creator = Auth::user()->id;

        ShipDistrict::insertGetId([
            'division_id'=>$request['division_id'],
            'district_name'=>$request['district_name'],
            'district_slug'=>$slug,
            'district_creator'=>$creator,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'messege' =>'District Upload Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('district')->with($notification);

    }

    public function districtUpdate(Request $request){
        $id = $request['id'];

        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ],[
            'division_id.required'=>'Please Enter Division Name!',
            'district_name.required'=>'Please Enter District Name!',
        ]);

        $slug = uniqid('district-15');
        $creator = Auth::user()->id;

        ShipDistrict::where('district_status',1)->where('id',$id)->update([
            'division_id'=>$request['division_id'],
            'district_name'=>$request['district_name'],
            'district_slug'=>$slug,
            'district_creator'=>$creator,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = array(
            'messege' =>'district Update Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('district')->with($notification);
    }

    public function districtSoftdelete(Request $request){
        $id = $request['modal_id'];

        ShipDistrict::where('district_status',1)->where('id',$id)->update([
            'district_status'=>0,
        ]);

        $notification = array(
            'messege' =>'district Softdelete Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('district')->with($notification);
    }
}
