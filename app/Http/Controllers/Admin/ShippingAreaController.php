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
}
