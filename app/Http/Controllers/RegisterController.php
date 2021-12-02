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
            'fullname' => 'required',
            'username' => 'unique:users|min:6',
            'password' => 'alpha_num|min:6',
            'role' => 'required'
        ];
        
        $validatedData=$request->validate($rules);

        //encrypt password
        $validatedData['password']=bcrypt($validatedData['password']);
        
        // dd($validated);
        User::create($validatedData);

        // add notification when success
        // $request->session()->flash('succes','Registration success! Please login!');
        return redirect('/login')->with('success','Registration success! Please login!');
    }
}
