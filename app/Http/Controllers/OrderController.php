<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addMedicine($id){
        $user = Auth::user();
        $medicine = Medicine::find($id);
        $cart=session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else
        {
            $cart[$id]=[
                "name"=>$medicine->name,
                "image"=>$medicine->image,
                "price"=>$medicine->price,
                "quantity"=>1
            ];
        }
        session()->put('cart',$cart);
        return view('user.orderCart',compact('user','medicine'));
    }
}
