<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class TransInfoController extends Controller
{   
    public function index($price){
        // dd(Country::all());
        return view('trans-info',[
            'title' => 'Transaction Information',
            'price' => $price,
            'country' => Country::all()
        ]);
    }
    public function insert(Request $request){
        $rules=[
            'cardname' => 'required|min:6',
            'cardnumber' => 'required|regex:/0000 0000 0000 0000/',
            'month' => 'required|numeric|min:1|max:12',
            'year' =>'required|numeric|min:2021|max:2025',
            'cvc' => 'required|numeric|digits_between:3,4',
            'country'=>'',
            'zip' =>'required|numeric'
        ];
        $validated=$request->validate($rules);
        dd($validated);
    }
}
