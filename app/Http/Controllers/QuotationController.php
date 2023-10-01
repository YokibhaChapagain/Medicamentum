<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Quotation;

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


}
