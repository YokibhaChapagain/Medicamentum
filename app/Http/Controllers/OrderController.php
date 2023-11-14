<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Ordercart;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class OrderController extends Controller
{

public function index(){
    $order= Ordercart::with('medicine')
    ->where('user_id',Auth::id())->get();
    return view('user.orderCart',compact('order'));
}


        public function addToCart($id){
            $medicine = Medicine::with('pharmacy.pharmacyUser')->findorFail($id);
            $cart = session()->get('cart',[]);
            $pharmacyData = $medicine->pharmacy ? [
                "pharmacyUser" => $medicine->pharmacy->pharmacyUser->name,
            ] : null;
            if(isset($cart[$id])){
                        $cart[$id]['quantity']++;
                    }
                    else
                    {
                        $cart[$id]=[
                            "name"=>$medicine->name,
                            "image"=>$medicine->image,
                            "price"=>$medicine->price,
                            "quantity"=>1,
                            "pharmacy" => $pharmacyData,

                        ];
                    }
                    session()->put('cart',$cart);
            return redirect()->back()->with('success','Product added to cart succesfully!');
        }

        public function cart(){
            return view('user.orderCart');
        }

        public function remove(Request $request){
            if($request->id){
                $cart = session()->get('cart');
                if(isset($cart[$request->id])){
                    unset($cart[$request->id]);
                    session()->put('cart',$cart);
                }
                session()->flash('success','Product succesfully removed!');
            }
            return response()->json(['success' => true]);
        }

}
