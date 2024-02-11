<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\NightSlip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NightSlipController extends Controller
{
    public function index(){
        $nightSlip = NightSlip::get()->toArray();
        return view('admin.Slip.NightSlip.index',compact('nightSlip'));
    }
    public function creatSlip(){
        $job = Job::get()->toArray();
        return view('admin.Slip.NightSlip.create',compact('job'));
    }
    public function storeslip(Request $request){
        NightSlip::create([
            'first_name' => $request['firstname'],
            'last_name' => $request['Lastname'],
            'passport_no' => $request['passport_number'],
            'gender' => $request['gender'],
            'marital_status' => $request['marital_status'],
            'birth_date' => date('Y-m-d', strtotime($request['birthdate'])),
            'passport_issue_date' => date('Y-m-d', strtotime($request['passport_issue_date'])),
            'passport_expiry_date' => date('Y-m-d', strtotime($request['passport_expiry'])),
            'passport_issue_place' => $request['passport_issue_place'],
            'traveling_to' => $request['country_traveling'],
            'visa_type' => $request['visa_type'],
            'traveling_from' => $request['country_from'],
            'nationality' => $request['nationality'],
            'position_applied' => $request['job_post'],
            'city_from' => $request['city_from'],
            'nid' => $request['national_id'],
            'comments' => $request['comment'],
            'user_id' => Auth()->user()->id,
        ]);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function edit(Request $request){
        $edit = NightSlip::where('id',$request->id)->first()->toArray();
        // dd($edit);
        $job = Job::get()->toArray();
        return view('admin.Slip.NightSlip.edit',compact('job','edit'));
    }
    public function update(Request $request){
        $data =[
            'first_name' => $request['firstname'],
            'last_name' => $request['Lastname'],
            'passport_no' => $request['passport_number'],
            'gender' => $request['gender'],
            'marital_status' => $request['marital_status'],
            'birth_date' => date('Y-m-d', strtotime($request['birthdate'])),
            'passport_issue_date' => date('Y-m-d', strtotime($request['passport_issue_date'])),
            'passport_expiry_date' => date('Y-m-d', strtotime($request['passport_expiry'])),
            'passport_issue_place' => $request['passport_issue_place'],
            'traveling_to' => $request['country_traveling'],
            'visa_type' => $request['visa_type'],
            'traveling_from' => $request['country_from'],
            'nationality' => $request['nationality'],
            'position_applied' => $request['job_post'],
            'city_from' => $request['city_from'],
            'nid' => $request['national_id'],
            'comments' => $request['comment'],
        ];
        NightSlip::where('id',$request['id'])->update($data);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function send(Request $request){
        NightSlip::where('id',$request['id'])->update(['has_send' => 1]);
        return['status' =>'suuccess', 'data' => 'Successfully Delete'];
    }

    public function updateNightSlipStatus(Request $request){
        $cancel =  NightSlip::where('id',$request->id)->first();
        if($request->status == 'Progress'){
            $balance = User::where('id',$cancel->user_id)->first();
            $balance->balance = $balance->balance - 800;
            $balance->save();
        }
        $cancel->status =  $request->status;
        $cancel->payment =  800;
        $cancel->save();
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function penddingNightSlip(){
        $penddingList = NightSlip::with('user:id,name')->where('has_send',1)->where('status','pending')->get()->toArray();
        return view('admin.Slip.NightSlip.pendingList',compact('penddingList'));
    }
    public function progressNightSlip(){
        $penddingList = NightSlip::with('user:id,name')->where('has_send',1)->where('status','Progress')->get()->toArray();
        return view('admin.Slip.NightSlip.progress',compact('penddingList'));
    }
    public function completeNightSlip(){
        $penddingList = NightSlip::with('user:id,name')->where('has_send',1)->where('status','complete')->get()->toArray();
        return view('admin.Slip.NightSlip.complete',compact('penddingList'));
    }
    public function viewNightSlip(Request $request){
        $nightSlip = NightSlip::with('jobPost')->where('id',$request['id'])->first();

        return view('admin.Slip.NightSlip.view',compact('nightSlip'));
    }
}
