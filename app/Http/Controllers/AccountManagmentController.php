<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\select;

class AccountManagmentController extends Controller
{
    public function index(){
        $id = auth()->id();
        $transection = Transaction::where('user_id',$id)->get()->toArray();
        return view('admin.accountManagment.index',compact('transection'));
    }
    public function create(){
        return view('admin.accountManagment.create');
    }
    public function edit(Request $request){
        $edit = Transaction::where('id',$request['id'])->first();
        return view('admin.accountManagment.edit',compact('edit'));
    }
    public function store(Request $request){
        $username = auth()->user()->name;
        $file = $request->file('image') ;
        $fileName = $username.'/'.time() . '_' . $file->getClientOriginalName() ;
        $destinationPath = public_path().'/images/transaction/'.$username.'/' ;
        $file->move($destinationPath,$fileName);
        // return redirect('/uploadfile');
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images/transaction/'.$username.'/', $fileName);

        Transaction::create([
            'transaction_number' => $request['transaction_number'],
            'amount' => $request['amount'],
            'bank_name' => $request['bank_name'],
            'comments' => $request['comment'],
            'image' => $fileName,
            'type' => 'in',
            'user_id' => auth()->id(),
        ]);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function update(Request $request){
        if($request->hasFile(['image'])){
            $transaction = Transaction::select('id','image')->where('id',$request['id'])->first();
            $path = public_path('images/transaction/'.$transaction->image);
            File::delete($path);
            
            $username = auth()->user()->name;
            $file = $request->file('image') ;
            $fileName = $username.'/'.time() . '_' . $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/transaction/'.$username.'/' ;
            $file->move($destinationPath,$fileName);

            $transaction->image = $fileName;
            $transaction->save();
        }
        // return redirect('/uploadfile');
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images/transaction/'.$username.'/', $fileName);

        $data = [
            'transaction_number' => $request['transaction_number'],
            'amount' => $request['amount'],
            'bank_name' => $request['bank_name'],
            'comments' => $request['comment'],
        ];
        Transaction::where('id',$request['id'])->update($data);

        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function send(Request $request){
        Transaction::where('id',$request['id'])
        ->update(['has_send' => 1]);
        return['status' =>'suuccess', 'data' => 'Successfully Send'];
    }
    public function penddingAmmountList(){
        $payment = Transaction::with('user:id,name')->where('has_send', 1)->where('status','pending')->get()->toArray();
        return view('admin.accountManagment.pendinglist',compact('payment'));
    }
    public function allAmmountList(){
        $payment = Transaction::with('user:id,name')->where('has_send', 1)->where('status','approved')->get()->toArray();
        return view('admin.accountManagment.alllist',compact('payment'));
    }
    public function approvedTransaction(Request $request){
        $transaction = Transaction::where('id',$request['id'])->first();

        $balance = User::where('id',$transaction->user_id)->first();
        $balance->balance = $balance->balance + $transaction->amount;
        $balance->save();

        $transaction->status = 'approved';
        $transaction->save();
        return['status' =>'suuccess', 'data' => 'Successfully Add'];
    }
    
}
