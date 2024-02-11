<?php

namespace App\Http\Controllers;

use App\Models\CancelSlip;
use App\Models\User;
use Illuminate\Http\Request;

class CancelSlipController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $cancel_slips = CancelSlip::where('user_id',$id)->get()->toArray();
        return view('admin.Slip.CancelSlip.index',compact('cancel_slips'));
    }
    public function creatSlip(){
        return view('admin.Slip.CancelSlip.create');
    }
    public function store(Request $request){
        CancelSlip::create([
            'first_name' => $request['firstname'],
            'last_name' => $request['Lastname'],
            'passport_no' => $request['passport_number'],
            'gcc_slip_no' => $request['gcc_number'],
            'comments' => $request['comment'],
            'user_id' => Auth()->user()->id,
        ]);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function editSlip(Request $request){
        $edit = CancelSlip::where('id',$request->data_id)->first()->toArray();
       
        return view('admin.Slip.CancelSlip.edit',compact('edit'));
    }
    public function update(Request $request){
       $update =  [
        'first_name' => $request['firstname'],
        'last_name' => $request['Lastname'],
        'passport_no' => $request['passport_number'],
        'gcc_slip_no' => $request['gcc_number'],
        'comments' => $request['comment'],
        'user_id' => Auth()->user()->id,
        ];
        CancelSlip::where('id',$request['id'])->update($update);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function delete(Request $request){
        CancelSlip::where('id',$request['id'])->update(['has_send' => 1]);
        return['status' =>'suuccess', 'data' => 'Successfully Delete'];
    }
    public function penddingCancelSlipList(){
        $penddingList = CancelSlip::with('user:id,name')->where('has_send',1)->where('status','pending')->get()->toArray();

        return view('admin.Slip.CancelSlip.penddingList',compact('penddingList'));
    }
    public function progressCancelSlipList(){
        $progressList = CancelSlip::with('user:id,name')->where('has_send',1)->where('status','Progress')->get()->toArray();
        return view('admin.Slip.CancelSlip.progressList',compact('progressList'));
    }
    public function completeCancelSlipList(){
        $CompleteList = CancelSlip::with('user:id,name')->where('has_send',1)->where('status','Complete')->get()->toArray();
        return view('admin.Slip.CancelSlip.completeList',compact('CompleteList'));
    }
    public function updateCancelSlipStatus(Request $request){
        $cancel =  CancelSlip::where('id',$request->id)->first();
        if($request->status == 'Progress'){
            $balance = User::where('id',$cancel->user_id)->first();
            $balance->balance = $balance->balance - 500;
            $balance->save();
        }
        $cancel->status =  $request->status;
        $cancel->payment =  500;
        $cancel->save();
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }

}
