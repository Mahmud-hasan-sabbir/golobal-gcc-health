<?php

namespace App\Http\Controllers;

use App\Models\CancelSlip;
use App\Models\NightSlip;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function home(){
        $id = auth()->user()->id;
        if(!auth()->user()->is_admin){
            $cancel_slip_count = CancelSlip::where('user_id',$id)->where('status','Complete')->count();
            $night_slip = NightSlip::where('user_id',$id)->count();
            $payment = 0;
        }else{
            $cancel_slip_count = CancelSlip::where('has_send', 1)->where('status','Progress')->count();
            $night_slip = NightSlip::where('has_send',1)->count();
            $payment = Transaction::where('has_send', 1)->where('status','pending')->count();
        }
        $view = auth()->user()->is_admin ? 'adminhome' : 'home';
        return view('admin.dashbord.'.$view,compact('cancel_slip_count','night_slip','payment'));
    }
}
