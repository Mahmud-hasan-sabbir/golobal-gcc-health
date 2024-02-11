<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagmentController extends Controller
{
    public function index(){
        $user = User::get()->toArray();
        return view('admin.user.index',compact('user'));
    }
    public function createUser(){
        return view('admin.user.create');
    }
    public function storeUser(Request $request){
        // $request->validate([
        //     'name' => ['required|unique:users,name'],
        //     'email' => ['required|unique:users,email'],
        //     'company_name' => ['required|unique:users,company_name'],
        //     'phone' => ['required|unique:users,phone'],
        //  ]);
        // $request->validate([
        //     'name' => 'required|unique:users,name',
        //     'email' => 'required|unique:users,email',
        //     'company_name' => 'required|unique:users,company_name',
        //     'phone' => 'required|unique:users,phone',
        // ]);
        User::create([
            'name' => $request['name'],
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'company_name' => $request['company_name'],
            'phone' => $request['phone'],
            'adress' => $request['address'],
            'password' => Hash::make($request['password']),
        ]);
        // return response()->json(['success'=>'Successfully']);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function userEdit(Request $request){
        $user = User::where('id',$request->data_id)->first()->toArray();
        return view('admin.user.edit',compact('user'));
    }
    public function userUpdate(Request $request){
    $update =  [
        'name' => $request['name'],
        'full_name' => $request['full_name'],
        'email' => $request['email'],
        'company_name' => $request['company_name'],
        'phone' => $request['phone'],
        'adress' => $request['address'],
        ];
        User::where('id',$request['id'])->update($update);
        return['status' =>'suuccess', 'data' => 'Successfully Added'];
    }
    public function userDelete(Request $request){
        User::where('id',$request->id)->delete();
    }
}
