<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use App\Models\UserPaymentInformations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Transaction;

class TransInfoController extends Controller
{   
    public function index($price){
        
        $userpayment=collect(UserPaymentInformations::where('user_id','=',Auth::id())->get());
        // dd(empty($userpayment[]));
        return view('trans-info',[
            'title' => 'Transaction Information',
            'price' => $price,
            'country' => Country::all(),
            'userPayInfo' => $userpayment,
        ]);
    }
    public function insert(Request $request){
        // dd("asdasd");
        $rules=[
            'card_name' => ['required','min:6'],
            'card_number' => ['required','regex:/[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$/'],
            'expired_month' => ['required','numeric','min:1','max:12'],
            'expired_year' =>['required','numeric','min:2021','max:2025'],
            'cvc_cvv' => ['required','numeric','digits_between:3,4'],
            'country_id'=>['numeric'],
            'zip' =>['required','numeric']
        ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated=$validator->validated();
            $validated['user_id']=Auth::id();
            UserPaymentInformations::updateOrCreate(['id'=>$request->get('paymentId')],$validated);
            
            $userId=Auth::id();
            $data=Transaction::where('user_id','=',$userId)
            ->where('status','=',0)
            ->get();;
            $transID=strtoupper(md5((string) Str::uuid().time()));
            
            $gamePurchased=0;

            foreach ($data as $item) {
                $gamePurchased++;
                $id=$item->id;
                $trans=Transaction::find($id);
                $trans->status=1;
                $trans->transaction_id=$transID;
                $trans->save();
            }
            $user=Auth::user();
            $user->level=$user->level+$gamePurchased;
            $user->save();
            //set new cookie for cart
            $dataTrans=Transaction::where('user_id','=',$userId)
            ->get();
            //reset cookie
            Cookie::forget('user_trans');
            Cookie::queue('user_trans',$dataTrans,120);
            Cookie::queue('totalcart',0,120);
        return redirect('/trans-receipt/'.$transID.'/'.$request->price);
    }
}
