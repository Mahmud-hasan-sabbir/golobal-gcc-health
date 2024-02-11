<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $job = Job::get()->toArray();
        return view('admin.job.index',compact('job'));
    }
    public function create(){
        return view('admin.job.create');
    }
    public function store(Request $request){
        Job::create([
            'title' => $request['title'],
        ]);
        // return response()->json(['success'=>'Successfully']);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function delete(Request $request){
        Job::where('id',$request->id)->delete();
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function hospitalList(){
        $hospital = Hospital::get();
        return view('admin.Hospital.index',compact('hospital'));
    }
    public function hospitalcreate(){
        return view('admin.Hospital.create');
    }
    public function hospitalstore(Request $request){
        Hospital::create([
            'name' => $request['name'],
            'payment' => $request['payment'],
        ]);
        // return response()->json(['success'=>'Successfully']);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function hospitaledit(Request $request){
       $hospital = Hospital::where('id',$request['id'])->first();
       return view('admin.Hospital.edit',compact('hospital'));
    }
    public function hospitalupdate(Request $request){
        Hospital::where('id',$request['id'])->update(['name' => $request['name'], 'payment' => $request['payment'] ]);
       return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function hospitaldelete(Request $request){
        Hospital::where('id',$request['id'])->delete();
       return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function hospitalstatus(Request $request){
        // dd($request->all());
        Hospital::where('id',$request['id'])->update(['status' => $request['status']]);
       return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
}
