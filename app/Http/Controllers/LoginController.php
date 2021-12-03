<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login',[
            'title' => 'Login'
        ]);
    }
    public function login(Request $request){
        $rules=[
            'username' => 'required',
            'password' => 'required'
        ];
        $credentials=$request->validate($rules);
        if(Auth::attempt($credentials)){
            //prevent session fix session
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return back()->with('loginError','Login failed! Username or Password wrong!');
    }
    public function logout(Request $request){
        Auth::logout();

        //session not validated
        $request->session()->invalidate();

        //new session token
        $request->session()->regenerateToken();
        
        return redirect('/')->with("loggedout","Successfully logged out!");
    }
}
