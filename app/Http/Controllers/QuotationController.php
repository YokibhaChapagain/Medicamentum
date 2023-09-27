<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Quotation;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'drug_name'=>'required',
            'quanity' => 'required',
            'description' => 'required'
        ]);

        $data = new Quotation();

        $que = $request->input('quanity');
        $price = $request->input('drug_price');

        $data->description = $request->input('description');
        $data->drugs = $request->input('drug_name');
        $data->quanity = $request->input('quanity');

        $amount = $que * $price;
        $data->amount = $amount;

        $data->order_id = $request->input('prescription_id');

        $data->user_id = $request->input('user_id');

        Prescription::where('id', $request->id)->update(array('confirm' => $request->order));


        $data->save();

        return redirect()->back();
    }


}
