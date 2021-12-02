<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register',[
            'title' => 'Register'
        ]);
    }
    public function store(Request $request){
        $rules=[
            'username' => 'required|unique:users|min:6',
            'password' => 'required|alpha_num|min:6',
            'fullname' => 'required '
        ];
        
        $validated=$request->validate($rules);

        //encrypt password
        $validated['password']=bcrypt($validated['password']);
        User::create($validated);

        // add notification when success
        $request->session()->flash('succes','Registration success! Please login!');
        return redirect('/login');
    }
}
