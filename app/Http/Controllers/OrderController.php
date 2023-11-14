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

        public function checkout(Request $request)
        {
            $cartItems = session('cart');
            $user = Auth::user();
            $subtotals = $request->input('subtotals');
            $total = 0;

            // Check if $cartItems is not null and is an array
            if (is_array($cartItems)) {
                foreach ($cartItems as $id => $details) {

                    $productName = $details['name'];
                    $medicine = Medicine::where('name', $productName)->first();

                    if ($medicine) {
                        Ordercart::create([
                            'quantity' => $details['quantity'],
                            'total' => $subtotals[$id],
                            'product_id' => $medicine->id,
                            'user_id' => $user->id,
                        ]);
                        $total += $subtotals[$id];
                    }
                }

                session()->forget('cart');

                return view('user.checkout-success')->with('status','Order Confirmed!');
        }

    }


    public function Payment(){
        $total_price=0;
        $user_id=Ordercart::where('user_id',Auth::id())
        ->where('payment_status', '!=', 'paid')
        ->get();
        foreach($user_id as $id){
            $total_price=$total_price+$id->total;
        }
        $productItems = [];

            \Stripe\Stripe::setApiKey('sk_test_51O9MyrCImfPEyZKFaLs7dsdp97CGhT8Zy5VqGwyunlaKU9i8OWmhMtUIC2ZxvLIKeuJJ6bqZNwzwk8rJIl9OSdw400mTu7Dzgh');
            // $stripe = new \Stripe\StripeClient('sk_test_51Nx7ipHhFrhpubP1EePozGVEdvf6Gw2nmCLCF2RrXaJqtgp4g8GBCyDa6XRWbVNKhYv3zWy3dv6KUUjQJgv296UJ007XLZgDsX');
            $quantity = 1;
            $price = intval($total_price);
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => 'Medicine',
                    ],
                    'currency' => 'NPR',
                    'unit_amount' => $price . '00',
                ],
                'quantity' => $quantity
            ];

            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => [$productItems],
                'mode' => 'payment',
                // 'customer_email' => $userEmail,
                'success_url' => url('/user/success/'.Auth::id()),
                'cancel_url' => url('/fail/'),
            ]);
            return redirect()->away($checkoutSession->url);
    }
    public function success($id){
        $order = Ordercart::where('user_id',$id)->get();
        foreach ($order as $orders ) {
            $orders->payment_status = 'paid';
            $orders->save();
    }

    return view('user.success')->with('status','Payment Successful');
}
}
