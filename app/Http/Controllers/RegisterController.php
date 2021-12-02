<?php

namespace App\Http\Controllers;

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
        $request->validate($rules);
        
    }
}
