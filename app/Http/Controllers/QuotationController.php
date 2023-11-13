<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()); // or var_dump($request->all());

        // $request->validate([
        //     'drug_name'=>'required',
        //     'quanity' => 'required',
        //     'description' => 'required'
        // ]);

        $quotations = json_decode($request->input('quotations'), true); // Decode the JSON string into an array
        // dd($quotations);

        foreach ($quotations as $quotationData) {
            // dd($quotationData);
            $data = new Quotation();

            $data->description = $quotationData['description'];
            $data->drugs = $quotationData['drugName'];
            $data->quanity = $quotationData['quantity'];
            // $data->

            // $amount = $quotationData['totalAmount'];
            $data->amount = $quotationData['drugPrice'];

            $data->order_id = $quotationData['order_id'];
            $data->user_id = $request->input('user_id');

            $data->total = $quotationData['drugPrice'] * $quotationData['quantity'];

            Prescription::where('id', $request->input('prescription_id'))->update(['confirm' => $request->input('order')]);

            $data->save();

        }
        // $data = new Quotation();

        // $que = $request->input('quanity');
        // $price = $request->input('drug_price');

        // $data->description = $request->input('description');
        // $data->drugs = $request->input('drug_name');
        // $data->quanity = $request->input('quanity');

        // $amount = $que * $price;
        // $data->amount = $amount;

        // $data->order_id = $request->input('prescription_id');

        // $data->user_id = $request->input('user_id');

        // Prescription::where('id', $request->id)->update(array('confirm' => $request->order));


        // $data->save();

        return redirect()->back();
    }

    public function Payment(){
        $total_price=0;
        $user_id=Quotation::where('user_id',Auth::id())->where('status', 1)->get();
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
        $quotation = Quotation::where('user_id',$id)->get();
        foreach ($quotation as $quot ) {
            if($quot->status==1)
            {$quot->payment_status = 'paid';
            $quot->save();}
    }
    return view('user.success')->with('status','Payment Successful');
    // return view('user.failure')->with('error', 'Quotation not found');
}
}
